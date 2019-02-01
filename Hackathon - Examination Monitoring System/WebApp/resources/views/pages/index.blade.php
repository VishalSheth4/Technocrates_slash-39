@extends('master')

@section('title')

   Home | Exam Monitoring

@endsection


@section('indexContent')


        <div class="row" style="margin:40px 20px 0px 250px;">
            <h1 style="padding-left:20px;">List Of Exams</h1>
            @if(isset($exams))
            @foreach($exams as $exam)
            <div class="col-sm-6">
                 <a href="{{ route('singleExamInfo',['examId' => $exam->ExamId]) }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $exam->ExamName }}</h3>
                         </div>
                        <div class="panel-body">
                        <div class="col-sm-5">
                            <p>Exam Date : {{ date('d-m-Y', strtotime($exam->ExamDate))}}</p>
                            <p>Start Time : {{ date('g:i a', strtotime($exam->starttime))}}</p>
                            <p>End Time : {{ date('g:i a', strtotime($exam->endtime))}}</p>
                        </div>
                        <div class="col-sm-7">
                          <p style="font-size:23px;text-align: right"><span style="font-size: 50px">05</span> Days To Go</p>
                        </div>
                        </div>
                    </div>
                 </a>
                </div>
            @endforeach

            @endif

            </div>


@endsection
