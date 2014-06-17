<?php
require_once 'checkSession.php';
require_once './classes/FridgeDB.php';   
require_once './classes/Refrigerator.php';
require_once './classes/FridgeFood.php';
require_once './classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';
require_once './classes/groceryClass.php';

 $refID = $_SESSION['refID'];

    $gc = new groceryClass();
    $items = $gc->getGrocerybyFridgeID($refID);
    

?>
<html>
<head>
	<title>Grocery list</title>
	<link rel="stylesheet" href="./assets/stylesheets/demo.css" />
	  <link rel="stylesheet" href="./assets/stylesheets/unsemantic-grid-responsive.css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
      <div id="gl_frd_header">
        <div class="back">
          <img src="images/white_back.png" alt="back">
        </div>
      <h2>GROCERY LIST FREEZER</h2>
      </div>
    </header>
    <div id="gl_frd_main">
    	<h3>Refridgerator</h3>
    <div class="radio">
 <form method="POST" action="groceryList.php" >
           <ul>
               
                <?php
                    $i =0; $j=0;
                    foreach ($items as $gfItems)
                    {
                ?>
                      <li>
                          
                <?php
                        if($gfItems['status']=="complete"){
                ?>
                          <input type="radio" checked class="itemrad" id="item<?php echo $i; ?>" name="item<?php echo $i; ?>" value="<?php echo $gfItems['ID'] ?>" />
                          <label class="lblRad" for="item<?php echo $i; ?>"></label>
                          <input type="text" class="itemtext complete" name="txtItem<?php echo $j++; ?>" value="<?php echo $gfItems['ItemName'] ?>" />
                <?php
                        }
                        else
                        {
                ?>
                          <input type="radio" class="itemrad" id="item<?php echo $i; ?>" name="item<?php echo $i; ?>" value="<?php echo $gfItems['ID'] ?>" />
                          <label class="lblRad" for="item<?php echo $i; ?>"></label>
                          <input type="text" class="itemtext" name="txtItem<?php echo $j++; ?>" value="<?php echo $gfItems['ItemName'] ?>" />
                 <?php
                        }                        
                ?>         
                          <!-- <input type="button" class="btnDel" value="Delete" style="background: blue" /> -->
                          <button type="button" class="btnDel">
                            <i class="fa fa-minus-circle"></i> 
                          </button>
                       </li>
                <?php
                        $i++;
                    }
                ?>
         </ul>
        </form>
        
        <form method="POST" action="insertgroceryfridge.php">
            <h3> Add food items </h3>
         
          <input type="text" name="itemname" />

          <button type="submit" class="btnDel">
            <i class="fa fa-plus"></i> 
          </button>
          
                        
                        
                        
                       
        </form>
		
			
		
			<!-- <input id="female" type="radio" name="gender" value="female">
			<label for="female"></label>
			<input id="female" type="radio" name="gender" value="female">
			<input id="male" type="radio" name="gender" value="male">
			<label for="female"></label> -->
			
		</div>

	</div>

	  <script src="./assets/javascripts/jquery.js"></script>
          <script src="./js/groceryitem.js"></script>
    <script type="text/javascript">
      $('.lblRad').click(function(){
          id = $(this).prev('.itemrad').val();
          $.ajax({
            type: "POST",
            url: "updategroceryFridgeStatus.php",
            data: {ID: id} 
          })
          .done(function(response) {
              console.log(response);
              if(response == "success")
              {
                  console.log(" here : "+response);
                  window.location.href = 'groceryList.php';
              }
              else{
                  console.log("Sorry could not update status. Please try again later");
                  window.location.href = 'groceryList.php';

              }
          });
      })
    </script>
	


</body>
</html>

   
