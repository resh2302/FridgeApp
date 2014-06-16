<?php

require_once 'checkSession.php';

require_once './classes/FridgeFood.php';
require_once './classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$ID = $_GET['ID'];
$mac = $_GET['mac'];

if($mac == "fridge")
{
  $objff = new FridgeFood();
  $ff = $objff->getFoodbyID($ID);
}
else{
  $objff = new FreezerFood();
  $ff = $objff->getFoodbyID($ID);
}

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

    <header>
      <div id="fridge-edit-header">
        <div class="back">
          <a href="#" onclick="history.back();">
            <img src="images/black_back.png" alt="back">
          </a>
        </div>
      
        <h3>Update Info</h3>

      </div>
    </header>

    <div id="editor">
    
     <div id="fridge_add_step2">
      <form id="stp2_wrapper" action="editFridge.php">
      <h3>ITEM SUMMARY</h3>
      <div class="clear"></div>
      <br/>  
      <label for="itemName" class="itm_left itm_title">Item Name: </label>
      <input type="hidden" value="<?php echo $ID ?>" name="ID" />
      <input type="hidden" value="<?php echo $mac ?>" name="mac" />

      <input type="text" name="itm_name_ans" class="itm_left itm_ans" value="<?php echo $ff['Name']?>">
      <br/>
      <br/>
      <label for="itemQuantity" class="itm_left itm_title">Quantity: </label>
      <input type="text" name="itm_name_qut" class="itm_left itm_ans" value="<?php echo $ff['Qty']?>">
      <br/>
      <br/>
      <label for="itemCat" class="itm_left itm_title">Category: </label>
      <div id="tag_container">
      <select class="itm_left itm_ans" name="itm_name_cat" id="itm_name_cat">
        <?php 
          if($ff['Category'] == "meat"){
        ?>
      <option value="meat" <?php 
          echo "selected";
        ?>>Meat</option>
      <option value="dairy">Dairy</option>
      <option value="veg">Veggies</option>
      <option value="fruit">Fruits</option>
      <?php 
        }
        else if ($ff['Category'] == "dairy")
        {
      ?>
    <option value="meat" >Meat</option>
      <option value="dairy" <?php 
          echo "selected";
        ?>>Dairy</option>
      <option value="veg">Veggies</option>
      <option value="fruit">Fruits</option>
      <?php 
        }
        else if ($ff['Category'] == "veg")
        {
      ?>
    <option value="meat" >Meat</option>
      <option value="dairy" >Dairy</option>
      <option value="veg" <?php 
          echo "selected";
        ?>>Veggies</option>
      <option value="fruit">Fruits</option>
      <?php 
        }
        else if ($ff['Category'] == "fruit")
        {
      ?>
    <option value="meat" >Meat</option>
      <option value="dairy" >Dairy</option>
      <option value="veg">Veggies</option>
      <option value="fruit"  <?php 
          echo "selected";
        ?>>Fruits</option>
        <?php 
          }
        ?>
     </select>
      </div>
      <br/>
      <br/>
      <label for="itemEx" class="itm_left itm_title">Expiry: </label>
      <input type="hidden" name="action" value="update">
      <input type="text" name="itm_name_exp" id="itm_name_exp" class="itm_left itm_ans" value="<?php echo $ff['ExpiryDate'] ?>">
      <br/>
      <br/>

      <label for="itemSug" class="itm_left itm_title">Suggested Icon: </label>
      <img src='<?php
              echo $ff['ImgURL'];
            ?>' class="icon-edit" />
      <input type="hidden" id="imgurl-edit" name="imgurl-edit" value='<?php
              echo $ff['ImgURL'];
            ?>' />
      <br/>
      <br/>
      <div class="clear"></div>
      <p id="choose"><a href="#" onclick="lightbox_open();">Change Icon</a></p>
       <div class="clear"></div>
      <div id="fridge_wrp_step2">
        <button type="reset" id="fridge_add_can2" class="fridge_btn_cancel">
            CANCEL
        </button>
        <button type="submit" id="fridge_add_done" class="fridge_btn_nxt">
            UPDATE
        </button>
      </div> <!-- END fridge_wrp_step2 -->
      
      </form> <!-- end stp2_wrapper -->

    </div> <!-- END fridge_add_step2 -->
<div id="fridge_add_icons">

      <form id="fridge_select_icon">
        <label id="chosse_icon_lbl" for="selectIcon">CHOOSE YOUR ICON <i id="fridge_search_icon" class="fa fa-search fa-lg"></i></label>
        <input type="text" name="fridge_select_txt" id="fridge_select_txt" placeholder="search">
        
      </form>
      <div>
      <ul class="fridge_sort portfolioFilter" id="fridge_select_sort" >
        <li><a href="#" data-filter="*">ALL</a></li>
        <li><a href="#" data-filter=".meat">MEAT</a></li>
        <li><a href="#" data-filter=".dairy">DAIRY</a></li>
        <li><a href="#" data-filter=".vf">VEGGIE/ FRUIT</a></li>
      </ul>
      </div>
      <div id="frd_itm_search">
        <ul class="portfolioContainer">
          <li class="vf"><img src="images/items/beetroot.png"></li>
          <li class="meat"><img src="images/items/chicken.png"></li>
          <li class="meat"><img src="images/items/fish.png"></li>
          <li class="dairy"><img src="images/items/milk.png"></li>
          <li class="meat"><img src="images/items/sausage.png"></li>
           <li class="meat"><img src="images/items/shrimp.png"></li>
        </ul>
      </div>

      
    </div> <!-- END fridge_add_icons -->
    <div id="fade" onClick="lightbox_close();"></div> 
</div>
    <footer class="fridge_footer">
      <ul>
        <li>
          <a href="#">
            <i class="fa fa-power-off fa-2x"></i>
            <p>Logout</p>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/footer_fridge.png" alt="fridge">
            <p>Fridge</p>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/footer_list.png" alt="grocery list">
            <p>Grocery</p>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/footer_rec.png" alt="recipe generator">
            <p>Recipe</p>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/footer_add.png" alt="invite friend">
            <p>Invite</p>
          </a>
        </li>
      </ul>
    </footer>

    
  <script src="./assets/javascripts/jquery.js"></script>
  <script src="js/jquery.isotope.js" type="text/javascript"></script> 
  <script src="./assets/javascripts/demo.js"></script>
  <script type="text/javascript" src="assets/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
  <script src="js/jquery.isotope.js" type="text/javascript"></script> 
  <script type="text/javascript" src="js/fridgeFood.js"></script>
 
 <script type="text/javascript">
  $(function() {
    $( "#itm_name_exp" ).datepicker({
      minDate: 0,
      dateFormat: 'yy/mm/dd'
    });

   $('#frd_itm_search img').click(function(){
      newsrc = $(this).attr('src');
      $('.icon-edit').attr('src',newsrc);
      $('#imgurl-edit').attr('value',newsrc);
   });

  });
 </script>


   <script>


     //function for lightbox in icon selection 

    function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('fridge_add_icons').style.display='block';
    document.getElementById('fade').style.display='block';  
    }

    function lightbox_close(){
    document.getElementById('fridge_add_icons').style.display='none';
    document.getElementById('fade').style.display='none';
    }
    </script>
</body>
</html>