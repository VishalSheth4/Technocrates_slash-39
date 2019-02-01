@extends('master')

@section('title')

    Home | Exam Monitoring System

@endsection


@section('allocateContent')

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">

            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Allocation</h1>
             </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->


            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Allocation</li>
            </ol>



            <div id="page-content">

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student Allocation</h3>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('studentMessage'))
                        <div class="alert alert-success">
                           {{ \Illuminate\Support\Facades\Session::get('studentMessage') }}
                        </div>
                    @endif
                    <div class="panel-body">

                        <form  method="post" action="{{ route('startAllocation') }}" enctype="multipart/form-data" id="student">

                            <div class="form-group">
                                <select id="make" class="demo_select2 form-control" name="examName">
                                    <option value="">Select Exam</option>
                                    @foreach($exams as $exam)
                                        <option value="{{ $exam->ExamCode }}">{{ $exam->ExamName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                            <button class="btn btn-primary form-control" type="submit" id="allocate">Allocate</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faculty Allocation</h3>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('facultyMessage'))
                        <div class="alert alert-success">
                            {{ \Illuminate\Support\Facades\Session::get('facultyMessage') }}
                        </div>
                    @endif
                    <div class="panel-body">

                        <form  method="post" action="{{ route('facultyAllocation') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <select id="demo-select2" class="demo_select2 form-control" name="examName">
                                    <option value="">Select Exam</option>
                                    @foreach($exams as $exam)
                                        <option value="{{ $exam->ExamCode }}">{{ $exam->ExamName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit" id="allocate">Allocate</button>
                            </div>
                        </form>

                    </div>
                </div>
    </div>
    </div>
</div>

    <div class="loader" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:100;background:rgba(0,0,255,0.3);">
        <div align="center" style="vertical-align: middle;margin-top:18%;" >
           <img src="{{ URL::to('css/loader.gif') }}" height="50" width="50"/>
            <h1 style="color: white;">Allocating Data.....</h1>
        </div>
    </div>

    <script>
        $(".loader").hide();
        $("#allocate").click(function(e){

            $(".loader").show();
        });
    </script>
@endsection


