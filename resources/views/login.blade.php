    
@extends('layouts.login')

@section('content')
<h1 class="text-center" style="color:grey">
           Cheque Consolator
        </h1>
<div class="login">

    <div class="login-body">
        <!--        <a class="login-brand" href="#">
                    <img class="img-responsive" src="img/logo2.png"  alt="USAD">
                            <img class="img-responsive" src="img/logo.png" height="30" width="70" alt="USAD">
                    
                </a>-->
<!--        <h4 style="color:grey;text-align: center">Cheque Consolator</h4>-->
        <h3 class="login-heading" style="color:grey">Sign in</h3>
        <p class="holder text-center"></p>
        <div class="login-form">
            <form id="loginForm" data-toggle="md-validator"  method="POST">
                <input class="md-form-control" type="hidden" name="type" value="login">

                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter username." required>
                    <label class="md-control-label">Username</label>
                </div>
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    <label class="md-control-label">Password</label>
                </div>
                <div class="md-form-group md-custom-controls">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Keep me signed in</span>
                    </label>
                    <span aria-hidden="true"> </span>
                    <a href="forgot-password">Forgot password?</a>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('js/vendor.min.js')}}"></script>
<script src="{{ asset('js/elephant.min.js')}}"></script>
<script src="{{ asset('js/login.js')}}"></script>
@endsection
