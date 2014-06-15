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
<body id="reg-body">

    <header>
      <div id="reg-header">
        <div class="back">
          <img src="images/white_back.png" alt="back">
        </div>
      <h2>SIGN UP</h2>
      </div>
    </header>
   

    <div>
        <form id="register_form" action="refrigerator.php">

          <h3>Enter your information here</h3>
          <div id="registration_status"></div>
          
          <input type="text" name="reg_email" id="reg_email" placeholder="Enter Your Email">
          <div id="error"></div>

          <input type="password" name="reg_password" id="reg_password" placeholder="Enter Password">

          <input type="password" name="reg_Cpassword" id="reg_Cpassword" placeholder="Enter Confirm Password">

          <input type="submit" id="signUpBtn" value="SIGN UP">

      </form>
      
    </div>
    
 
  <script src="./assets/javascripts/jquery.js"></script>
  <script src="./assets/javascripts/demo.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/validator.js"></script>

  <script src="js/register.js"></script>
  
</body>
</html>