<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/sarah.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/demo/sarah-demo-icons.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/demo/sarah-demo.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/magic-check/css/magic-check.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/chosen/chosen.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('plugins/morris-js/morris.min.css')}}" rel="stylesheet">
    <script src="{{URL::to('js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{URL::to('plugins/gauge-js/gauge.min.js')}}"></script>
    {{--<script src="{{URL::to('js/demo/charts.js')}}"></script>--}}

@if(Request::is('pages/facultyStatus/*'))
        <style>
            .status{
                height: 10px;
                width: 10px;
                border-radius: 50%;
            }
            .status-failure {
                background-color: red;
            }
            .status-success {
                background-color: green;
            }
        </style>
    @endif
</head>
<body>

@if(Request::is('/'))
@yield('login-form')
@endif


@if(Request::is('pages/facultyStatus/*'))
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    @include('pages.navigation')
    @yield('facultyStatus')
</div>
@endif


@if(Request::is('pages/examCenter'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('examCenter')
    </div>
@endif

@if(Request::is('pages/allocateStudent'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('allocateContent')
    </div>
@endif

@if(Request::is('pages/index'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('indexContent')
    </div>
@endif


@if(Request::is('pages/singleExamInfo/*'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('singleExamContent')
    </div>
@endif


@if(Request::is('allocate/getAllocatedStudent/*'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('allocatedStudent')
    </div>
@endif

@if(Request::is('allocate/getAllocatedFaculty/*'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('allocatedFaculty')
    </div>
@endif

@if(Request::is('pages/paymentStatus/*'))
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        @include('pages.navigation')
        @yield('paymentContent')
    </div>
@endif


<link href="{{URL::to('plugins/pace/pace.min.css')}}" rel="stylesheet">

<script src="{{URL::to('plugins/pace/pace.min.js')}}"></script>

<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('js/sarah.min.js')}}"></script>
<script src="{{URL::to('js/demo/tables-bs-table.js')}}"></script>
<script src="{{URL::to('plugins/x-editable/js/bootstrap-editable.min.js')}}"></script>
<script src="{{URL::to('plugins/bootstrap-table/bootstrap-table.min.js')}}"></script>
<script src="{{URL::to('plugins/bootstrap-table/extensions/editable/bootstrap-table-editable.js')}}"></script>
<script src="{{URL::to('plugins/chosen/chosen.jquery.min.js')}}"></script>

@if(Request::is('pages/singleExamInfo/*'))
<script>
    $(document).ready(function() {
        var opts = {
            lines: 10, // The number of lines to draw
            angle: 0, // The length of each line
            lineWidth: 0.3, // The line thickness
            pointer: {
                length: 0.45, // The radius of the inner circle
                strokeWidth: 0.035, // The rotation offset
                color: '#242d3c' // Fill color
            },
            limitMax: 'true', // If true, the pointer will not go past the end of the gauge
            colorStart: '#177bbb', // Colors
            colorStop: '#177bbb', // just experiment with them
            strokeColor: '#ddd', // to see which ones work best for you
            generateGradient: true
        };


        var target = document.getElementById('demo-gauge'); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue =  {{ $examAllocation }}  // set max gauge value
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set({{ $authorized }}); // set actual value
        gauge.setTextField(document.getElementById("demo-gauge-txt"));
    });
</script>
@endif
</body>
</html>



