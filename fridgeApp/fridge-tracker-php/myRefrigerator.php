<?php
session_start();

require_once './classes/Refrigerator.php';
require_once './classes/FridgeFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$ref = new Refrigerator();
$refID = $_SESSION['refID'];
FB::log($refID);
$refrigerator = $ref->getRefrigerator(12);
FB::log($refrigerator['FridgeID']);

$fridgeID = $refrigerator['FridgeID'];

$objFridgeFood = new FridgeFood();
$fridgeFood = $objFridgeFood->getFood($fridgeID);
FB::log($fridgeFood);
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
  <link rel="stylesheet" href="./assets/stylesheets/unsemantic-grid-responsive.css" />
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
   <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/main.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="./assets/stylesheets/ie.css" />
<![endif]-->
</head>
<body>

    <header>
      <div id="fridge-header">
        <!-- <div class="back">
          <img src="images/black_back.png" alt="back">
        </div> -->
      <ul id="fridge_sort" class="fridge_hide">
        <li>ALL</li>
        <li>MEAT</li>
        <li>DAIRY</li>
        <li>VEGGIE/ FRUIT</li>
      </ul>

      <ul id="fridge_sa" class="fridge_hide">
        <li><i id="fridge_add_icon" class="fa fa-plus fa-lg"></i></li>
        <li><i id="fridge_search_icon" class="fa fa-search fa-lg"></i></li>
      </ul>

      <form id="fridge_search_form">
        <input type="text" name="fridge_search" id="fridge_search" placeholder="search">
         <button type="submit" id="fridge_cancel">
                <i class="fa fa-times-circle fa-2x"></i>
         </button>
      </form>

      </div>
    </header>

    <div  id="fridge_body">
    	<ul>
    		<?php
    			foreach ($fridgeFood as $ff) {
    		?>
    			<li>
    				<?php
              echo $ff['Name'];
    				?>
            <img src='<?php
              echo $ff['ImgURL'];
            ?>' class="foodIn">
            <div class="editSection">
              <a href="#" class="delete">DELETE</a>
              <a href="#" class="edit">EDIT</a>
              <input type="hidden" 
                     value="<?php
                              echo $ff['ID'];
                            ?>"
                     class="ffid"
              />
            </div>
            
    			</li>
    		<?php
    			}
    		?>
    	</ul>
    </div> <!-- end fridge_body -->

     <div  id="fridge_add">

      <form>
         <h3>Enter your information here</h3>
         <div class="clear"></div>
         <br/>
         <input type="text" name="fridge_food_name" id="fridge_food_name" placeholder="Enter Food Name">
         <div class="clear"></div>
         <input type="text" name="fridge_food_expiary" id="fridge_food_expiary" placeholder="Choose Expiary Date">

         <button type="submit" id="fridge_btn_ex">
          <i class="fa fa-calendar fa-3x"></i>
         </button>

      </form>
      <div class="clear"></div>
      <div  id="fridge_or">

      <img src="images/em-dash.png" alt="em dash">

      <h4>OR</h4>

      <img src="images/em-dash.png" alt="em dash">

      </div> <!-- end fridge_or -->

      <div id="fridge_scan">
        <button type="submit" id="fridge_btn_scan">
          <p>SCAN AN ITEM</p><i class="fa fa-barcode fa-4x"></i>
        </button>

      </div> <!-- end frige_scan -->
      <div id="fridge_add_step1">  
        <button type="submit" id="fridge_add_can1" class="fridge_btn_cancel">
          CANCEL
        </button>
        <button type="submit" id="fridge_add_nxt" class="fridge_btn_nxt">
          NEXT
        </button>
      </div> <!-- end fridge_add_step1 -->
      
    </div> <!-- end fridge add -->

     <div id="fridge_add_step2">
      <h3>ITEM SUMMARY</h3>

    </div> <!-- END fridge_add_step2 -->

    <footer class="fridge_footer">
      <ul>
        <li><img src="images/footer_barcode.png" alt="scan"><p>Barcode</p></li>
        <li><img src="images/footer_fridge.png" alt="fridge"><p>Fridge</p></li>
        <li><img src="images/footer_list.png" alt="grocery list"><p>Grocery</p></li>
        <li><img src="images/footer_rec.png" alt="recipe generator"><p>Grocery List</p></li>
        <li><img src="images/footer_add.png" alt="invite friend"><p>Invite</p></li>
      </ul>
    </footer>
 
  <script src="./assets/javascripts/jquery.js"></script>
  <script src="./assets/javascripts/demo.js"></script>
  <script type="text/javascript" src="js/fridgeFood.js"></script>
   <script>

   //onclick of search show search panel

    $(document).ready(function(){
      $("#fridge_search_icon").click(function(){
        $(".fridge_hide").hide(200);
        $("#fridge_search_form").slideDown(500);

      });

      $(".foodIn").click(function() {
        $(this).next('.editSection').toggle();
      });

    });

    //onclick of search show add panel


    $(document).ready(function(){
      $("#fridge_add_icon").click(function(){
        $("#fridge_body").fadeOut(200);
        $("#fridge_add").slideDown(500);
      });
    });

     $(document).ready(function(){
      $("#fridge_add_can1").click(function(){
        $("#fridge_add, #fridge_add_step2").fadeOut(200);
        $("#fridge_body").slideDown(500);

      });
    });

     $(document).ready(function(){
      $("#fridge_add_nxt").click(function(){
        $("#fridge_add").fadeOut(200);
        $("#fridge_add_step2").show(500);

      });
    });
    </script>
</body>
</html>