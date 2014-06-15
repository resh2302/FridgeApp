<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Fridge App Login</title>
<!--[if lt IE 9]>
  <script src="./assets/javascripts/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="./assets/stylesheets/demo.css" />
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <link rel="stylesheet" href="./assets/stylesheets/unsemantic-grid-responsive.css" />
  <link rel="stylesheet" href="css/main.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="./assets/stylesheets/ie.css" />
<![endif]-->
</head>
<body id="login-body">

    <header>
      <div id="login-header">
      <h1>FRIDGE TRACKER</h1>
      </div>
    </header>
    <div id="login-tri"></div>

    <div>
      <form id="login_form" method="POST" action="refrigerator.php">
        <input type="text" name="email" id="email" placeholder="Enter Your Email 'ID'">

        <input type="password" name="password" id="password" placeholder="Enter Your Password">

        <input type="submit" id="loginBtn" value="SIGN IN">
<!-- 
        <div id="login-or">---- OR ----</div>
        <input type="submit" value="REGISTER"> -->

      </form>
    </div>

    
 
  <script src="./assets/javascripts/jquery.js"></script>
  <script src="./assets/javascripts/demo.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/validator.js"></script>
  <script src="js/login.js"></script>
</body>
</html>