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
    $items = $gc->getGrocerybyFreezerID($refID);
    

?>
<html>
<head>
	<title>Grocery list-Freezer</title>
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
        <form method="POST" action="groceryFreezer.php" >
           
           <ul>    
                <?php
                $i =0; $j=0;
                    foreach ($items as $gfreezeItems)
                    {
                    ?>
                      <li>
                    <?php
                        if($gfreezeItems['status']=="complete"){
                    ?>
                        <input type="radio" checked class="freezerrad" id="item<?php echo $i; ?>" name="item<?php echo $i; ?>" value="<?php echo $gfreezeItems['ID'] ?>" />
                        <label class="lblRad" for="item<?php echo $i; ?>"></label>
                        <input type="text" class="freezertext itemtext complete" name="txtItem<?php echo $j++; ?>" value="<?php echo $gfreezeItems['ItemName'] ?>" />
                     <?php
                        }
                        else
                        {
                      ?>
                           <input type="radio" class="freezerrad" id="item<?php echo $i; ?>" name="item<?php echo $i; ?>" value="<?php echo $gfreezeItems['ID'] ?>" />
                        <label class="lblRad" for="item<?php echo $i; ?>"></label>
                        <input type="text" class="freezertext itemtext" name="txtItem<?php echo $j++; ?>" value="<?php echo $gfreezeItems['ItemName'] ?>" />   
                    <?php
                    }
                ?>
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
        
        <form method="POST" action="insertgroceryFreezer.php">
            <h3> Add food items into Freezer </h3>
         
           <input id="frd_list" type="radio" name="frd_list" value="frd_list">
          <label for="frd_list"></label>
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
          <script src="./js/freezeritem.js"></script>

	


</body>
</html>



