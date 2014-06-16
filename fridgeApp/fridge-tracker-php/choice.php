<?php

require_once 'checkSession.php';

require_once './classes/Refrigerator.php';
require_once './classes/FridgeFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$ref = new Refrigerator();
$refID = $_SESSION['refID'];
FB::log($refID);
$refrigerator = $ref->getRefrigerator($refID);
FB::log($refrigerator['FridgeID']);

$fridgeID = $refID;
$freezerID = $refID;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Fridge</title>
<!--[if lt IE 9]>
  <script src="./assets/javascripts/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="./assets/stylesheets/demo.css" />

<!--[if (gt IE 8) | (IEMobile)]><!-->
<!-- <link rel="stylesheet" href="css/isotope.css"> -->
  <link rel="stylesheet" href="./assets/stylesheets/unsemantic-grid-responsive.css" />
  <link rel="stylesheet" href="css/isotope.css">
  <link rel="stylesheet" type="text/css" href="./assets/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/reveal/reveal.css">
   <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/main.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="./assets/stylesheets/ie.css" />
<![endif]-->
</head>
<body>

    <!-- <header>
      <div id="choice-header">
        <h2>FRIDGE TRACKER</h2>

      </div>
    </header>
 -->


    <div id="frd_frz">
      <a href="myRefrigerator.php?id=<?php echo $fridgeID; ?>&mac=fridge">
        <div id="frd" class="frChoice"></div>
      </a>
      <div id="frd-or"><img src="images/frd_line.png"><img src="images/frd_line.png"> OR<img src="images/frd_line.png"><img src="images/frd_line.png"> </div>
      <a href="myRefrigerator.php?id=<?php echo $freezerID; ?>&mac=freezer">
        <div id="frz" class="frChoice"></div>
      </a>
    </div> <!-- END frd_frz -->


    <footer class="fridge_footer">
      <ul>
        <li>
          <a href="#">
            <i class="fa fa-power-off fa-2x"></i>
            <p>Logout</p>
          </a>
        </li>
        
      </ul>
    </footer>
 
  <script src="./assets/javascripts/jquery.js"></script> 
  <script src="./assets/javascripts/demo.js"></script>
   
</body>
</html>