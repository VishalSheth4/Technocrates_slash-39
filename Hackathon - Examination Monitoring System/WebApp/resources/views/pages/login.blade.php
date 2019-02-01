@extends('master')

@section('title')

    Admin Login | Exam Monitoring

@endsection

@section('login-scripts')

@endsection

@section('login-form')
    <div id="container" class="cls-container">

        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay"></div>


        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <div class="mar-ver pad-btm">
                        <h3 class="h4 mar-no">Account Login</h3>
                        <p class="text-muted">Sign In to your account</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" autofocus name="email" >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                    </form>
                </div>

              </div>
        </div>
    </div>
@endsection