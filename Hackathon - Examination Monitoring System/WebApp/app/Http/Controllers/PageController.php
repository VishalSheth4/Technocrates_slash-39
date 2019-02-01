<?php

namespace App\Http\Controllers;

use App\Dean;
use App\Exam;
use App\FacultyAllocation;
use App\Institute;
use App\InstituteDistance;
use App\Student;
use App\StudentAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MartijnOud\DistanceMatrix\DistanceMatrix;

class PageController extends Controller
{

    public function getFacultyStatusPage($examId)
    {
        $datas = FacultyAllocation::leftjoin('exams','dean_allocations.ExamCode','=','exams.ExamCode')
            ->leftjoin('institutes','institutes.InstCode','=','dean_allocations.InstCode')
            ->leftjoin('deans','deans.DeanEmail','=','dean_allocations.DeanEmail')
            ->where('exams.ExamId','=',$examId)
            ->get();
        $examInfo = Exam::find($examId);


       // $datas  = FacultyAllocation::all();
        return view('pages.locationStatus',['datas' => $datas,'examName' => $examInfo->ExamName]);
    }


    public function getExamCenterPage()
    {
        $datas = DB::table('institutes')
        ->leftjoin('exams','institutes.ExamCode','=','exams.ExamCode')
        ->get();
        return view('pages.examCenter',['datas' => $datas]);
    }



    public function getIndexPage()
    {
        $exams = Exam::all();
        return view('pages.index',['exams' => $exams]);
    }





    public function getAllocateStudentPage()
    {
        $exams = Exam::all();
        return view('pages.allocateStudent',['exams' => $exams]);
    }




    public function getAddInstitute(){

        $institutes = Institute::all();

        //$this->arrayPrint($institutes);
        $distanceMatrix = new DistanceMatrix('AIzaSyB0qeTTp1d55n8KEBrK_r2T69O5Kp-KZFs');

        foreach($institutes as $outerinstitute){

            foreach($institutes as $innerinstitute) {

               if(($innerinstitute->InstCode != $outerinstitute->InstCode) && ($innerinstitute->InstCity == $outerinstitute->InstCity)){
                   $distance = $distanceMatrix->distance([
                  'origins' =>$outerinstitute->InstName." , ".$outerinstitute->InstCity,
                  'destinations' => $innerinstitute->InstName." , ".$innerinstitute->InstCity
                ]);
                 $instituteDistance = new InstituteDistance();
                 $instituteDistance->Institute1 = $outerinstitute->InstCode;
                 $instituteDistance->Institute2 = $innerinstitute->InstCode;
                 $instituteDistance->Distance = round($distance / 1000,2) ;
                   if($instituteDistance->save()){
                       echo "Done\n";
                   }

               }
            }

        }


    }

    private function arrayPrint($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }



    /*************8
     * All Exam Info
     */

    public function getSingleExamInfo($examId)
    {
        $examInfo = Exam::leftjoin('institutes','institutes.ExamCode','=','exams.ExamCode')
            ->leftjoin('students','students.ExamCode','=','exams.ExamCode')
            ->leftjoin('dean_allocations','dean_allocations.ExamCode','=','exams.ExamCode')
            ->where('exams.ExamId','=',$examId)
            ->get();

        $examInfo = Exam::find($examId);


        $students = Student::where('ExamCode','=',$examInfo->ExamCode)->count();
        $faculties = Dean::where('ExamCode','=',$examInfo->ExamCode)->count();

        $examAllocation = FacultyAllocation::where('ExamCode','=',$examInfo->ExamCode)->count();
        $authorized = FacultyAllocation::where('DeanAuthorization','=',1)
            ->where('ExamCode','=',$examInfo->ExamCode)
            ->count();

        return view('pages.singleExamInfo',['examInfo' => $examInfo,'examName' => $examInfo->ExamName,
                    'studentsCount' => $students,
                    'facultyCount' => $faculties,
                    'examAllocation' => $examAllocation,
                    'authorized' => $authorized,
                    'examId' => $examId
        ]);

    }

    public function getAllocatedStudent($examId)
    {
        $allocateStudents = StudentAllocation::leftjoin('exams','student_allocations.ExamCode','=','exams.ExamCode')
            ->leftjoin('institutes','institutes.InstCode','=','student_allocations.InstCode')
            ->leftjoin('students','students.RollNo','=','student_allocations.RollNo')
            ->where('exams.ExamId','=',$examId)
            ->get();



         return view('pages.getAllocatedStudent',['allocateStudents' => $allocateStudents]);
    }

    public function getAllocatedFaculty($examId)
    {
        $allocateFaculties = FacultyAllocation::leftjoin('exams','dean_allocations.ExamCode','=','exams.ExamCode')
            ->leftjoin('institutes','institutes.InstCode','=','dean_allocations.InstCode')
            ->leftjoin('deans','deans.DeanEmail','=','dean_allocations.DeanEmail')
            ->where('exams.ExamId','=',$examId)
            ->get();
        return view('pages.getAllocatedFaculty',['allocateFaculties' => $allocateFaculties]);
    }

    public function getPaymentPage($examId)
    {
        $paymentFaculties = FacultyAllocation::leftjoin('exams','dean_allocations.ExamCode','=','exams.ExamCode')
            ->leftjoin('institutes','institutes.InstCode','=','dean_allocations.InstCode')
            ->leftjoin('deans','deans.DeanEmail','=','dean_allocations.DeanEmail')
            ->where('exams.ExamId','=',$examId)
            ->get();
        return view('pages.payment',['paymentFaculties' => $paymentFaculties,'examId' => $examId]);
    }
}
