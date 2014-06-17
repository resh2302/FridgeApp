<html>
<head>
	<title>Grocery list</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body id="gl_body">
	<div id="gl_splash_wrapper">
	<div class="rd_btn" id="gl_frd">Fridge</div>
	<div class="rd_btn"  id="gl_frz">Freezer</div>
	</div>

	<script type="text/javascript" src="assets/javascripts/jquery.js"></script>
	<script type="text/javascript">
		$('#gl_frd').click(function(){
			window.location.href = "groceryList.php";
		});
		
		$('#gl_frz').click(function(){
			window.location.href = "groceryFreezer.php";
		});
	</script>
</body>
</html>