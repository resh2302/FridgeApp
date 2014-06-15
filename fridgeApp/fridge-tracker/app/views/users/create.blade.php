@extends('layouts.default')
@section('content')
    <body id="reg-body">

        <header>
          <div id="reg-header">
            <div class="back">
                <a href="{{ URL::to('/'); }}">
                    <img src="{{ URL::asset('images/white_back.png') }}" alt="back">
                </a>              
            </div>
          <h2>SIGN UP</h2>
          </div>
        </header>

    <div>
        {{Form::open(['route' => 'users.store'])}}
        <h3>Enter your information here</h3>
        <div>
            {{Form::text('email', null ,array('placeholder'=>'Enter your email', 'id' => 'reg_email'))}}
            {{ $errors->first('email', '<div class="error">:message</div>')}}
        
            {{Form::password('password' ,array('placeholder'=>'Enter your password', 'id' => 'reg_password'))}}
            {{ $errors->first('password', '<div class="error">:message</div>')}}
            
            {{Form::password('password_confirmation' ,array('placeholder'=>'Confirm your password', 'id' => 'reg_Cpassword'))}}
            
            {{ $errors->first('password_confirmation','<div class="error">:message</div>')}}

            {{Form::submit('SIGN UP')}}
        
        {{Form::close()}}
        </div>
       </div> 
        <?php
            // include_once(app_path().'/includes/scripts.blade.php');
        ?>
        <script src="{{ URL::asset('/assets/javascripts/jquery.js') }}"></script>
        <script src="{{ URL::asset('/assets/javascripts/demo.js') }}"></script>
    </body>

@stop