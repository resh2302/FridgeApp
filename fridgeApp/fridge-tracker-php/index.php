<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fridge Tracker</title>
  <link rel="stylesheet" href="css/superslides.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div id="slides">
    <div class="slides-container">

      <!-- <img src="images/people.jpeg" alt="Cinelli"> -->
      <li>
        
      <img src="images/slider2.png" width="1024" height="682" alt="Surly">
      <div class="container">
        <div class="sl_tab" id="index_signup">
          <a href="register.php">Sign Up</a>
        </div>
        <div class="sl_tab">
          <a href="login.php">Login</a>  
        </div>
        <div class="clear"></div>
        
        <div id="list_wrapper">
          <h1 class="home_h1"><i class="fa fa-clock-o fa-lg"></i>  Fridge Tracker</h1>
          <ul>
            <li id="home_scan" class="index_list"></li><p>Easy Barcode Scanner</p>
             <div class="clear"></div>
            <li id="home_fridge" class="index_list"></li><p>Organize Your Fridge</p>
            <div class="clear"></div>
            <li id="home_list" class="index_list"></li><p>Plan Your Grocery List</p>
            <div class="clear"></div>
            <li id="home_recipe" class="index_list"></li><p>Generat Your Leftovers into Yummy Recipes!</p>
            <div class="clear"></div>
            <li id="home_invite" class="index_list"></li><p>Invite Your Family Memebers <span>or</span> Roomies</p>
            <div class="clear"></div>
          </ul>
        </div> <!-- end list_wrapper -->
      </div>
      
      </li>
      <li>
      <img src="images/slider1.png" width="1024" height="683" alt="Cinelli">
      <div class="container">
        <h1 class="home_h1">Hi</h1>
      </div>
    </li>
      <img src="images/slider3.png" width="1024" height="685" alt="Affinity">
    </div>

    <nav class="slides-navigation">
      <a href="#" class="next"><i class="fa fa-angle-right fa-3x"></i> </a>
      <a href="#" class="prev"><i class="fa fa-angle-left fa-3x"></i> </a>
    </nav>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="assets/javascripts/jquery.easing.1.3.js"></script>
  <script src="assets/javascripts/jquery.animate-enhanced.min.js"></script>
  <script src="assets/javascripts/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script>
    $(function() {
      $('#slides').superslides({
        hashchange: true,
        play: 1000000
      });

      $('#slides').on('mouseenter', function() {
        $(this).superslides('stop');
        console.log('Stopped')
      });
      $('#slides').on('mouseleave', function() {
        $(this).superslides('start');
        console.log('Started')
      });
    });
  </script>
</body>
</html>
