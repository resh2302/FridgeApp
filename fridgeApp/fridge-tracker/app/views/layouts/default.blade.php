<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <title>Fridge Tracker</title>
        <!--[if lt IE 9]>
          <script src="./assets/javascripts/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ URL::asset('assets/stylesheets/demo.css') }}" />
        <!--[if (gt IE 8) | (IEMobile)]><!-->
          <link rel="stylesheet" href="{{ URL::asset('assets/stylesheets/unsemantic-grid-responsive.css') }}" />
          <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
        <!--<![endif]-->
        <!--[if (lt IE 9) & (!IEMobile)]>
          <link rel="stylesheet" href="./assets/stylesheets/ie.css" />
        <![endif]-->
    </head>
    
    @yield('content')
   
</html>
