@extends('layouts.default')

@section ('content')
    <body id="login-body">
        <header>
          <div id="login-header">
          <h1>FRIDGE TRACKER</h1>
          </div>
        </header>
        <div id="login-tri"></div>
        <div>
            {{ Form::open(['route' => 'sessions.store', 'method' => 'post'])}}
                               
                    {{Form::text('login_email', null ,array('placeholder'=>'Enter your email', 'id' => 'email'))}}
                    {{ $errors->first('login_email', '<div class="error">:message</div>')}}
        
                    {{Form::password('login_password' ,array('placeholder'=>'Enter your password', 'id' => 'password'))}}
                    {{ $errors->first('login_password', '<div class="error">:message</div>')}}
            

                    {{Form::submit('Sign In')}}
                
             {{Form::close()}}
        </div>
        <script src="./assets/javascripts/jquery.js"></script>
        <script src="./assets/javascripts/demo.js"></script>
     </body>
@stop
