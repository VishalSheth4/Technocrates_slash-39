<?php

namespace App\Http\Controllers;

use App\Dean;
use App\DeanLocationStatus;
use App\Exam;
use App\FacultyAllocation;
use App\Institute;
use App\LocationDetect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\pointLocation;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;


class DataController extends Controller
{

    /*******************************************
     *           Dean Register
     *******************************************/

    public function deanRegister(Request $request)
    {
        $deanData = new Dean();
        $deanData->deanName = $request->input('name');
        $deanData->InstCode = $request->input('code');
        $deanData->deanAadharNo = $request->input('aadhaar');
        $deanData->deanEmail = $request->input('email');
        $deanData->Role = $request->input('role');
        $deanData->password = bcrypt($request->input('password'));

        $flag = ($deanData->save()) ? "success" : "failure";
        return response()->json([
            'status' => $flag
        ]);
    }

    /*******************************************
     *          Dean Login
     *******************************************/

    public function deanLogin(Request $request)
    {
        $userEmail = $request->get('email');
        $userPassword = $request->get('password');
        $flag = (Auth::attempt(['deanEmail' => $userEmail, 'password' => $userPassword])) ? "success" : "failure";



        if ($request->isJson()) {
            header("Content-Type:application/json");
            print json_encode(array('status' => $flag));
        } else {
            if ($flag == "success") {
                return redirect()->route('examCenter');
            } else {
                return redirect()->back();
            }
        }
    }

    public function universityLogin(Request $request)
    {

        $userEmail = $request->get('username');
        $userPassword = $request->get('password');
        $data = Institute::where('username','=',$userEmail)->where('password','=',$userPassword)->get();

        $deanAllocation = FacultyAllocation::leftjoin('deans','dean_allocations.DeanEmail','=','deans.DeanEmail')
            ->where('dean_allocations.ExamCode','=',$data[0]->ExamCode)
            ->where('dean_allocations.InstCode','=',$data[0]->InstCode)
            ->get();

        $info = array('status' => 'success','data' => $deanAllocation);
        header("Content-Type:application/json");
        if ($request->isJson() && count($data) == 1) {
            print json_encode($info);
        }else{
            print json_encode(array('status' => "failure"));
        }
    }


    /*******************************************
     *      Selection of Exam Center
     *******************************************/


    public function examCenterSelection()
    {
        // Exam Center selected wwith grouping based on PinCode

        $groups = Institute::where('ExamCode', '<>', NULL)->get()->groupBy('ExamCode');
        foreach ($groups as $group) {
            $collectionOFThisGroup = collect($group);
            $groupedCollection = $collectionOFThisGroup->groupBy('InstPincode')->toArray();
            echo "<pre>";
            print_r($groupedCollection);
            echo "</pre>";
        }


    }


    /*******************************************
     *      Latitude Longitude
     *******************************************/
    public function getCoordinates(Request $request)
    {

        $image = base64_decode($request->get('image'));
        $fileName = $request->get('fileName');
        $path = public_path("images/");
        Image::make($image)->save(public_path("images/".$fileName));
        $latLong = LocationDetect::all();
        $coordinate = [];
        global $center, $lat, $lng, $pointLying, $deanAllocatedId;
        $vertexPos = array("inside", "vertex", "boundary");
        #Separating Data
        $deanEmail = $request->get('deanEmail');

        $deanAllocationInfo = FacultyAllocation::where('DeanEmail', '=', $deanEmail)->get();
        foreach ($deanAllocationInfo as $info) {
            $deanAllocatedId = $info->DeanAllocateId;
        }
        foreach ($latLong as $point) {
            $lat = explode(",", $point->Latitude);
            $lng = explode(",", $point->Longitude);
            $center = explode(",", $point->centerPoint);
        }

        for ($i = 0; $i < count($lat); $i++) {
//    $str = "{ lat : ".$lat[$i]." , lng : ".$lng[$i]."}\n";
            $str = $lat[$i] . " " . $lng[$i];
            array_push($coordinate, $str);
        }
        //$centerPoint = " lat : ".$center[0]." , lng : ".$center[1]."\n";
        $androidPoint = $request->get('androidLat') . " " . $request->get('androidLng');

        $pointLocation = new pointLocation();
        $points = array($androidPoint);
        foreach ($points as $key => $point) {
            $pointLying = $pointLocation->pointInPolygon($point, $coordinate);
        }

        $flag = (in_array($pointLying, $vertexPos)) ? 1 : 0;


        $deanLocationStatus = new DeanLocationStatus();
        $deanLocationStatus->DeanAllocateId = $deanAllocatedId;
        $deanLocationStatus->imageName = $fileName;
        $deanLocationStatus->Status = $flag;
        $deanLocationStatus->save();
        return response()->json([
            'status' => "success"
        ]);
    }

    public function returnFacultyInfoAndroid(Request $request)
    {
        $deanEmail = $request->get('deanEmail');



        $info = DB::table('dean_allocations')
            ->leftjoin('deans', 'dean_allocations.DeanEmail', '=', 'deans.DeanEmail')
            ->leftjoin('exams', 'dean_allocations.ExamCode', '=', 'exams.ExamCode')
            ->where('dean_allocations.DeanEmail', '=', $deanEmail)
            ->get(['DeanName','ExamName','ExamDate','deans.Role','DeanAuthorization','starttime','endtime']);

        if(count($info) > 0) {
            if ($request->isJson()) {
                return response()->json([
                    'status' => $info
                ]);
            }
        }else{
            if ($request->isJson()) {
                return response()->json([
                    'status' => 'NoAllocation'
                ]);
            }
        }
    }


    public function verifyDean(Request $request)
    {
        $aadhaar = $request->get('aadharNo');
        $deanEmail = $request->get('deanEmail');
        $flag = false;
        $auth = Dean::where('DeanEmail','=',$deanEmail)->where('DeanAadharNo','=',$aadhaar)->count();
        if($auth == 1){

          $flag  =  FacultyAllocation::where('DeanEmail','=',$deanEmail)
                ->update(['DeanAuthorization'=> 1]);
        }

        if($flag == true && $request->isJson()){
            return response()->json([
                'status' => 'verified'
            ]);
        }else{
            return response()->json([
                'status' => 'NotVerified'
            ]);
        }
    }

    public function makePayment($examId)
    {
        $exams = Exam::find($examId);
        $examCode = $exams->ExamCode;
        $deansAllocations = FacultyAllocation::where('ExamCode','=',$examCode)->get();
        foreach($deansAllocations as $deansAllocation){
            $dean_location_status = DeanLocationStatus::where('DeanAllocateId','=',$deansAllocation->DeanAllocateId)
                ->where('Status','=',0)
                ->count();

            if($dean_location_status > 0){
                FacultyAllocation::where('DeanAllocateId','=',$deansAllocation->DeanAllocateId)
                    ->update(['PaymentStatus' => 'Pending']);
            }else{
                $query = DeanLocationStatus::where('DeanAllocateId','=',$deansAllocation->DeanAllocateId)->count();

                  if($query != 0) {
                      FacultyAllocation::where('DeanAllocateId', '=', $deansAllocation->DeanAllocateId)
                          ->update(['PaymentStatus' => 'Payment Done']);
                  }else{
                      FacultyAllocation::where('DeanAllocateId', '=', $deansAllocation->DeanAllocateId)
                          ->update(['PaymentStatus' => 'Absent']);
                  }
            }
        }
       return redirect()->back();
    }

    public function pendingPayment($id,$exam)
    {
        FacultyAllocation::where('DeanEmail','=',$id)
            ->where('ExamCode','=',$exam)
            ->update(['PaymentStatus' => 'Payment Done']);
        return redirect()->back();
    }

    public function androidPayment(Request $request)
    {
        $deanEmail = $request->get('deanEmail');
        $paymentStatus = FacultyAllocation::where('DeanEmail','=',$deanEmail)->get(['PaymentStatus'])->toArray();
        if($request->isJson()){
            return response()->json([
                 'status' => $paymentStatus
            ]);
        }
    }
}

