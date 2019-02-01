@extends('master')

@section('title')

   {{ $examName }} | Exam Monitoring

@endsection


@section('singleExamContent')


    <div class="row" style="margin:40px 20px 0px 250px;">
        <div class="col-sm-6">
        <h1 style="padding-left:20px;">{{ $examName }}</h1>



                <div class="col-sm-6">

                    <div class="panel media middle pad-all">
                    <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
					                        <i class="demo-pli-male icon-2x"></i>
					                        </span>
                    </div>
                    <div class="media-body">
                        <p class="text-2x mar-no text-semibold">{{ $studentsCount }}</p>
                        <p class="text-muted mar-no">Registered Students</p>
                    </div>
                </div>
                </div>


        <div class="col-sm-6">

            <div class="panel media middle pad-all">
                <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
					                        <i class="demo-pli-male icon-2x"></i>
					                        </span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">{{ $facultyCount }}</p>
                    <p class="text-muted mar-no">Registered Faculties</p>
                </div>
            </div>
        </div>

            <div class="col-sm-6">
                <a href="{{ route('getAllocatedStudent',['examId' => $examId ])}}"
                   class="btn btn-primary form-control" style="padding: 20px;">
                    View Allocated Students
                </a>
            </div>

            <div class="col-sm-6">
           <a href="{{route('getAllocatedFaculty',['examId' => $examId ])}}" class="btn btn-primary form-control" style="padding: 20px;">
                           View Allocated Faculties
           </a>
            </div>


            <div class="col-sm-12" style="margin-top:20px;">
                <a href="{{route('facultyStatus',['examId' => $examId ])}}" class="btn btn-primary form-control" style="padding: 20px;">
                    View Faculty Location Status
                </a>
            </div>

            <div class="col-sm-12" style="margin-top:20px;">
                <a href="{{route('paymentPage',['examId' => $examId ])}}" class="btn btn-primary form-control" style="padding: 20px;">
                    Payment Details
                </a>
            </div>
        </div>

         <div class="col-sm-4" style="margin:80px 50px;">
             <div class="panel">
                 <!-- Gauge JS -->
                 <div class="panel-heading">
                     <h4 style="padding-left:10px;">Biometric Authorized Faculty</h4>
                 </div>
                 <!--===================================================-->
                 <div class="panel-body">
                     <div class="text-center">

                         <!--Gauge placeholder-->
                         <canvas id="demo-gauge" height="70" class="canvas-responsive"></canvas>

                         <p class="h4">
                             <span id="demo-gauge-txt"></span> / {{ $examAllocation }}
                         </p>
                     </div>
                 </div>
                 <!--===================================================-->
                 <!-- End Gauge JS -->
                 </div>
         </div>
    </div>


@endsection
