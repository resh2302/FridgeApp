<?php

require_once 'checkSession.php';

require_once './classes/Refrigerator.php';
require_once './classes/FridgeFood.php';
require_once './classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$string = file_get_contents("food.json");
$list_a= json_decode($string, true);

$id = $_GET['id'];
$mac = $_GET['mac'];

if($mac == "fridge")
{
  $objFridgeFood = new FridgeFood();
  $food = $objFridgeFood->getFoodbyFridge($id);
  $fid = $food[0]['FridgeID'];
}
else{
  $objFreezerFood = new FreezerFood();
  $food = $objFreezerFood->getFoodbyFreezer($id);
  $fid = $food[0]['FreezerID'];

}

FB::log($food);

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
      <div id="fridge-header">
        <!-- <div class="back">
          <img src="images/black_back.png" alt="back">
        </div> -->
      <!-- <ul class="fridge_sort fridge_hide portfolioFilter">
        <li><a href="#" data-filter="*">ALL</a></li>
        <li><a href="#" data-filter=".meat">MEAT</a></li>
        <li><a href="#" data-filter=".dairy">DAIRY</a></li>
        <li><a href="#" data-filter=".vf">VEGGIE/ FRUIT</a></li>
      </ul> -->

      <ul id="fridge_sa" class="fridge_hide">
        <li><i id="fridge_add_icon" class="fa fa-plus fa-lg"></i></li>
        <li><i id="fridge_search_icon" class="fa fa-search fa-lg"></i></li>
      </ul>

      <form id="fridge_search_form">
        <input type="text" name="fridge_search" id="fridge_search" placeholder="search">
         <button type="reset" id="fridge_cancel">
                <i class="fa fa-times-circle fa-2x"></i>
         </button>
      </form>

      </div>
    </header>

    <div  id="fridge_body">
    	<ul class="isotope">
    		<?php
    			foreach ($food as $ff) {
            //vf - veggiefruit
            //meat
            //dairy            
    		?>
    			<li class="element-item frd_items <?php echo $ff['Category']; ?>"> <!-- vf from db -->
    				<p class="hide">
              <?php
              echo $ff['Name'];
            ?>
          </p>
            <p class="hide">
              <?php
                echo $ff['Category'];
              ?>
            </p>
          <input type="hidden" name="mac" id="mac" value="<?php echo $mac; ?>">
          <input type="hidden" name="FID" id="FID" value="<?php echo $fid; ?>">

            <span id="expirary_indicat">
              <?php
                $now =time(); // or your date as well
               $your_date = strtotime( $ff['ExpiryDate']);
               $datediff = $your_date - $now;
               echo ceil($datediff/(60*60*24));

              ?>
            </span>
            <img src='<?php
              echo $ff['ImgURL'];
            ?>' class="foodIn" />
            <div class="editSection">
              <input type="hidden" 
                     value="<?php
                              echo $ff['Name'];
                            ?>"
                     class="ffName"
              />
              <a href="#" class="frd_item_delete">DELETE</a>
              <a href="editFridgeUI.php?ID=<?php
                              echo $ff['ID'];
                            ?>&mac=<?php
                              echo $mac;
                            ?>" class="frd_item_edit">EDIT</a>
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

      <form id="form_add">
         <h3>Enter your information here</h3>
         <div class="clear"></div>
         <br/>
         <input type="text" name="fridge_food_name" id="fridge_food_name" required="required" placeholder="Enter Food Name">
         <div class="clear"></div>
         <input type="text" name="fridge_food_expiary" id="fridge_food_expiary" required="required" placeholder="Choose Expiry Date">

         

      <div class="clear"></div>

      <div id="fridge_add_step1">  
        <button type="reset" id="fridge_add_can1" class="fridge_btn_cancel">
          CANCEL
        </button>
        <button type="button" name="fridge_add_nxt" id="fridge_add_nxt" class="fridge_btn_nxt">
          NEXT
        </button>
         

      </div> <!-- end fridge_add_step1 -->
      </form>
      
    </div> <!-- end fridge add -->

     <div id="fridge_add_step2">
      <form id="stp2_wrapper" action="insertFood.php" action="POST">
      <h3>ITEM SUMMARY</h3>
      <div class="clear"></div>
      <br/>  
      <input type="hidden" name="mac" value="<?php echo $mac; ?>">
      <label for="itemName" class="itm_left itm_title">Item Name: </label>
      <input type="text" name="itm_name_ans" id="itm_name_ans" class="itm_left itm_ans" >
      <br/>
      <br/>
      <label for="itemQuantity" class="itm_left itm_title">Quantity: </label>
      <input type="text" name="itm_name_qut" class="itm_left itm_ans" placeholder="1">
      <br/>
      <br/>
      <label for="itemCat" class="itm_left itm_title">Category: </label>
      <div id="tag_container">
      <select class="itm_left itm_ans" name="itm_name_cat" id="itm_name_cat">
      <option value="meat">Meat</option>
      <option value="dairy">Dairy</option>
      <option value="veg">Veggies</option>
      <option value="fruit">Fruits</option>
     </select>
      </div>
      <br/>
      <br/>
      <label for="itemEx" class="itm_left itm_title">Expiry: </label>
      <input type="text" name="itm_name_exp" id="itm_name_exp" class="itm_left itm_ans">
      <br/>
      <br/>

      <label for="itemSug" class="itm_left itm_title">Suggested Icon: </label>
      <img src="images/food/cover.png" width="122" class="itm_left icon-insert">
      <input type="hidden" id="imgurl-insert" name="imgurl-insert" value="images/food/cover.png">
      <br/>
      <br/>
      <div class="clear"></div>
      <p id="choose"><a href="#" onclick="lightbox_open();">Don't like this icon? Choose Your Icon</a></p>
       <div class="clear"></div>
      <div id="fridge_wrp_step2">
      <button type="reset" id="fridge_add_can2" class="fridge_btn_cancel">
          CANCEL
      </button>
      <button type="submit" id="fridge_add_done" class="fridge_btn_nxt">
          DONE
      </button>
    </div> <!-- END fridge_wrp_step2 -->
      
      </form> <!-- end stp2_wrapper -->

    </div> <!-- END fridge_add_step2 -->
<div id="fridge_add_icons">

    <!--   <form id="fridge_select_icon">
        <label id="chosse_icon_lbl" for="selectIcon">CHOOSE YOUR ICON <i id="fridge_search_icon" class="fa fa-search fa-lg"></i></label>
        <input type="text" name="fridge_select_txt" id="fridge_select_txt" placeholder="search">
        
      </form> -->
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
          <!-- <li class="vf"><img src="images/items/beetroot.png"></li>
          <li class="meat"><img src="images/items/chicken.png"></li>
          <li class="meat"><img src="images/items/fish.png"></li>
          <li class="dairy"><img src="images/items/milk.png"></li>
          <li class="meat"><img src="images/items/sausage.png"></li>
          <li class="meat"><img src="images/items/shrimp.png"></li>-->
          <?php

              foreach ($list_a['items'] as $li) {
          ?>
                <li class="test123 <?php echo $li['category']; ?>"><img src="<?php echo $li['image']; ?>">

          <?php
                foreach ($li['names']['name'] as $name) {
          ?>
            <p class="hide">
              <?php echo $name; ?>"
            </p>
          <?php
                }
          ?>
              </li>

          <?php
              }
          ?>
        </ul>
      </div>

      
    </div> <!-- END fridge_add_icons -->
    <div id="fade" onClick="lightbox_close();"></div> 

    <footer class="fridge_footer">
      <ul>
        <li id="footer_sign_out">
          <a href="logout.php">
            <i class="fa fa-power-off fa-2x"></i>
            <p>Logout</p>
          </a>
        </li>
        <li>
          <a href="choice.php">
            <img src="images/footer_fridge.png" alt="fridge">
            <p>Fridge</p>
          </a>
        </li>
        <li>
          <a href="groceryChoice.php">
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
  <script src="./assets/javascripts/demo.js"></script>
  <script type="text/javascript" src="assets/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
  <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validator.js"></script>
  <script type="text/javascript" src="js/fridgeFood.js"></script>

  <script>
  $(function() {
    $( "#fridge_food_expiary" ).datepicker({
      showOn: "button",
      // buttonImage: "images/calendar.gif",
      buttonText: "<i class='fa fa-calendar fa-3x'></i>",
      // buttonImageOnly: true
      minDate: 0,
      dateFormat: 'yy/mm/dd'

    });

    $('#itm_name_exp').datepicker({
      minDate: 0,
      dateFormat: 'yy/mm/dd'
    });

  });
   
  </script>


   <script>


$( function() {
  // quick search regex
  var qsRegex;
  
  // init Isotope
  var $container = $('.isotope').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows',
    filter: function() {
      return qsRegex ? $(this).text().match( qsRegex ) : true;
    }
  });

  // use value of search field to filter
  var $quicksearch = $('#fridge_search').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $container.isotope();
  }, 200 ) );

});

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}
//////////////////////isotope////////////////////////////////////  

   $(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
   //////////////////////////////////// //END isotope//////////////////////////////////// 


   //onclick of search show search panel

    $(document).ready(function(){
      $("#fridge_search_icon").click(function(){
        $(".fridge_hide").hide(200);
        $("#fridge_search_form").slideDown(500);
 //element-item left 0px 
        $(".element-item .frd_items").css('left', '0px');
    
      });

      $(".foodIn").click(function() {
        $('.editSection').hide();
        $(this).next('.editSection').slideToggle(200).css('display', 'inline-block');
      });

      $("#fridge_cancel").click(function(){
        $("#fridge_search_form").hide(200);
        $("#fridge-header").slideDown(500);
        $("#fridge_sa").show();
      });
});
      //Onclick of food icon, edit delete button slide down

    //  $(document).ready(function(){
    //   $(".frd_items").click(function(){
    //     // $('.editSection').hide();
    //     $(this).children(".editSection").slideToggle(200).css('display', 'inline-block');;
    //   });

    // });

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

//disable lightbox
     $(document).ready(function(){
      $(".test123").click(function(){
        $("#fade, #fridge_add_icons").fadeOut(200);
        $("#fridge_add_step2").show(500);

      });

       $('#fridge_add_nxt').click(function(){
         if($('#form_add').valid())
         {
           $("#fridge_add").fadeOut(200);
          $("#fridge_add_step2").show(500);
          $('#itm_name_ans').val($('#fridge_food_name').val());
          $('#itm_name_exp').val($('#fridge_food_expiary').val());
         }

      });



        $('#frd_itm_search img').click(function(){
          newsrc = $(this).attr('src');
          $('.icon-insert').attr('src',newsrc);
          $('#imgurl-insert').attr('value',newsrc);
       });




       /* $('#fridge_add_done').click(function(e){
          e.preventDefault();

          name = $("#itm_name_ans").val();
          qty = $("itm_name_qut").val();
          cat = $("itm_name_cat").val();
          date = $("itm_name_exp").val();
          img = $("imgurl-insert").val();
          mac = $("imgurl-insert").val();

          $.ajax({
            type: "POST",
            url: "insertFood.php",
            data: {
                  name: name,
                  qty: qty,
                  cat: cat,
                  date: date,
                  img: img,
                  mac: mac
                    } 
        })
        .done(function(response) {
            console.log("response  "+response);
            // if(response)
            // {
            //     console.log(" here : "+response);
            //     $("#fridge_body").load('myRefrigerator.php');
            // }
            // else{
            //     console.log("insert failed");
            // }
        });
        });*/


    });

     //Onclick of food icon, edit delete button slide down

     $(document).ready(function(){
      $(".frd_items").click(function(){
        $(this).children(".editSection").slideDown(200).css('display', 'inline-block');;
      });
    });

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

    //add relative to li

    $(document).ready(function(){
      $(".element-item").css({"position":"relative","left":"0px"});
      });

     //add important when search

    $( ".element-item" ).addClass( "important" );

    //showall

    $( ".portfolioContainer" ).addClass( "showall" );

    </script>
</body>
</html>