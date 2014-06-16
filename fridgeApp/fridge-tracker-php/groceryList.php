<?php
require_once 'checkSession.php';
 $refID = $_SESSION['refID'];
 
require_once './classes/groceryClass.php';
    $gc = new groceryClass();
    $GroceryFridge = $gc->getGrocerybyID();
    
require_once './classes/FridgeDB.php';   
require_once './classes/Refrigerator.php';
require_once './classes/FridgeFood.php';
require_once './classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';


?>
<html>
<head>
	<title>Grocery list</title>
	<link rel="stylesheet" href="./assets/stylesheets/demo.css" />
	  <link rel="stylesheet" href="./assets/stylesheets/unsemantic-grid-responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
      <div id="gl_frd_header">
        <div class="back">
          <img src="images/white_back.png" alt="back">
        </div>
      <h2>Fridge</h2>
      </div>
    </header>
    <div id="gl_frd_main">
    	<h3>Refridgerator</h3>
    <div class="radio">
 <form method="POST" action="groceryList.php" >
            <h3> Add food items </h3>
           <input id="frd_list" type="radio" name="frd_list" value="frd_list">
			<label for="frd_list"></label>
			<input type="text" placeholder="work" />
			<br/>
               
                <?php
                    foreach ($InsertFridge as $groceryfridge)
                    {
                       
                    }
                ?>
            <input type="submit" value="Done" />
        
        
        </form>
		
			
		
			<!-- <input id="female" type="radio" name="gender" value="female">
			<label for="female"></label>
			<input id="female" type="radio" name="gender" value="female">
			<input id="male" type="radio" name="gender" value="male">
			<label for="female"></label> -->
			
		</div>

	</div>

	
	


</body>
</html>

   
