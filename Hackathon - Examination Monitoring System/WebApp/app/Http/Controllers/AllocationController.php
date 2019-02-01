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
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class AllocationController extends Controller
{
    private $students;
    private $institutes;
    private $allocateStudent;
    private $seatNo = 0;

    public function startAllocation(Request $request)
    {
        $examCode = $request->get('examName');
        $this->students = Student::where('ExamCode','=',$examCode)->get();
        $this->institutes = Institute::leftjoin('university_datas','institutes.InstCode','=','university_datas.InstCode')
        ->where('ExamCode','=',$examCode)
        ->get();

       $collections = collect($this->institutes);
       $collections->sortBy('Name');

        $this->allocateStudent = new StudentAllocation();


        foreach($this->students as $student){
             $this->allocateStudent = new StudentAllocation();
            $this->allocateStudent->ExamCode = $student->ExamCode;
            $this->allocateStudent->RollNo = $student->RollNo;
            $this->allocateStudent->SeatNo = NULL;
            $this->allocateStudent->InstCode = NULL;
            $this->allocateStudent->save();

        }

        $this->seatNo = -5;

        foreach($collections as $institute){

            $studentArr = [];
            foreach($this->students as $student){
                if($institute->InstCity == $student->institute->InstCity)
                array_push($studentArr,$student);
            }

            foreach($studentArr as $student){

                if(($institute->InstCity == $student->institute->InstCity)){
                if(($institute->InstCode != $student->institute->InstCode)){
                    if($student->SeatNo == NULL) {
                        $rollNo = $student->RollNo;
                        $filledCapacity = StudentAllocation::where('InstCode','=',$institute->InstCode)->count();
                        if($institute->TotalCapacity > $filledCapacity && $this->instInRange($institute->InstCode,$student->institute->InstCode))
                        {
                          $this->seatNo += 1;
                          StudentAllocation::where('RollNo','=',$rollNo)
                            ->update(['SeatNo' => "SN_".$this->seatNo , 'InstCode' => $institute->InstCode]);
                        }

                    }
                }
              }
            }

        }

        $this->getUnAllocatedStudent();

        Session::flash('studentMessage','Successfully Allocated');
        return redirect()->back();
    }


     private function instInRange($allocateInstCode,$studentInstCode){
         $data = InstituteDistance::where('Institute1','=',$studentInstCode)->where('Institute2','=',$allocateInstCode)->get()->toArray();
         if(count($data) != 0 && $data[0]['Distance'] <= 20){
             $flag = true;
         }else{
             $flag  = false;
         }
         return $flag;
     }

    public function startFacultyAllocation(Request $request){

        $examCode = $request->get('examName');
        $this->supervisors($examCode);
        $this->externals($examCode);
        $this->osds($examCode);
        Session::flash('facultyMessage','Successfully Allocated');
        return redirect()->back();
    }


    public function supervisors($examCode){
        $supervisors = Dean::leftjoin('institutes','deans.InstCode','=','institutes.InstCode')
            ->where('deans.Role','=','Supervisor')
            ->where('deans.ExamCode','=',$examCode)
            ->get();




        foreach($supervisors as $supervisor)
        {
             $allocate = new FacultyAllocation();
             $allocate->DeanEmail = $supervisor->DeanEmail;
             $allocate->ExamCode = $examCode;
             $allocate->Role = $supervisor->Role;
             $allocate->InstCode = NULL;
             $allocate->save();
        }

           $allocateSupervisor = FacultyAllocation::where('InstCode','=',NULL)
            ->where('ExamCode','=',$examCode)
            ->where('Role','=','Supervisor')
            ->get();

            $institutes = Institute::where('ExamCode','=',$examCode)->get();

               foreach($allocateSupervisor as $allocate){
                   foreach($institutes as $institute){
                    if($institute->InstCode != $allocate->InstCode){
                        $check = FacultyAllocation::where('ExamCode','=',$examCode)
                            ->where('InstCode','=',$institute->InstCode)
                            ->where('Role','=','Supervisor')
                            ->count();
                        if($check == 0){
                        FacultyAllocation::where('DeanEmail','=',$allocate->DeanEmail)
                            ->update(['InstCode' => $institute->InstCode]);
                        }
                    }
                }
            }

    }




    public function externals($examCode){
        $externals = Dean::leftjoin('institutes','deans.InstCode','=','institutes.InstCode')
            ->where('deans.Role','=','External')
            ->where('deans.ExamCode','=',$examCode)
            ->get();

        foreach($externals as $external)
        {
            $allocate = new FacultyAllocation();
            $allocate->DeanEmail = $external->DeanEmail;
            $allocate->ExamCode = $examCode;
            $allocate->Role = $external->Role;
            $allocate->InstCode = NULL;
            $allocate->save();
        }

        $allocateExternal = FacultyAllocation::where('InstCode','=',NULL)
            ->where('ExamCode','=',$examCode)
            ->where('Role','=','External')
            ->get();

        $institutes = Institute::where('ExamCode','=',$examCode)->get();
        foreach($allocateExternal as $allocate){
            foreach($institutes as $institute){
                if($institute->InstCode != $allocate->InstCode){
                    $check = FacultyAllocation::where('ExamCode','=',$examCode)
                        ->where('InstCode','=',$institute->InstCode)
                        ->where('Role','=','External')
                        ->count();

                    if($check == 0){
                        FacultyAllocation::where('DeanEmail','=',$allocate->DeanEmail)
                            ->update(['InstCode' => $institute->InstCode]);
                    }
                }
            }
        }
    }

    public function osds($examCode){
        $osds = Dean::leftjoin('institutes','deans.InstCode','=','institutes.InstCode')
            ->where('deans.Role','=','OSDS')
            ->where('deans.ExamCode','=',$examCode)
            ->get();

        foreach($osds as $osd)
        {
            $allocate = new FacultyAllocation();
            $allocate->DeanEmail = $osd->DeanEmail;
            $allocate->ExamCode = $examCode;
            $allocate->Role = $osd->Role;
            $allocate->InstCode = NULL;
            $allocate->save();
        }

        $allocateSupervisor = FacultyAllocation::where('InstCode','=',NULL)
            ->where('ExamCode','=',$examCode)
            ->where('Role','=','OSDS')
            ->get();

        $institutes = Institute::where('ExamCode','=',$examCode)->get();
        foreach($allocateSupervisor as $allocate){
            foreach($institutes as $institute){
                if($institute->InstCode != $allocate->InstCode){
                    $check = FacultyAllocation::where('ExamCode','=',$examCode)
                        ->where('InstCode','=',$institute->InstCode)
                        ->where('Role','=','OSDS')
                        ->count();
                    if($check == 0){
                        FacultyAllocation::where('DeanEmail','=',$allocate->DeanEmail)
                            ->update(['InstCode' => $institute->InstCode]);
                    }
                }
            }
        }
    }


    /************************************
     * Unallocated Students Logic
     ************************************/

    private function getUnAllocatedStudent()
    {
        $unallocated = StudentAllocation::leftjoin('students', 'student_allocations.RollNo', '=', 'students.RollNo')
            ->where('student_allocations.InstCode', '=', NULL)->orWhere('student_allocations.SeatNo', '=', NULL)
            ->get();


        foreach ($unallocated as $student) {
            $institutes = Institute::leftjoin('university_datas','university_datas.InstCode','=','institutes.InstCode')
            ->where('institutes.InstCity', '=', $student->studentCity)
            ->get();

              foreach($institutes as $institute){
                  $filledCapacity = StudentAllocation::where('InstCode','=',$institute->InstCode)->count();
                 if($filledCapacity < $institute->TotalCapacity){
                  $this->seatNo += 1;
                  StudentAllocation::where('RollNo','=',$student->RollNo)
                  ->update(['SeatNo' => "SN_".$this->seatNo , 'InstCode' => $institute->InstCode]);
              }
            }
        }

    }

    private function arrayPrint($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function getExamName($examCode){
        $examName = Exam::where('ExamCode','=',$examCode)->get(['ExamName']);
        return $examName;
    }
}
