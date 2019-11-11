<?php
  require("../../../config.php");
  require("functions_main.php");
  require("functions_user.php");
  $database = "if19_daniel_gu_1";
  
  if(!isset($_SESSION["userID"])){
	  //siis jõuga sisselogimise lehele
	  header("Location: page.php");
	  exit();
  }
  
  if(isset($_GET["Logout"])) {
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  
  
	
	require("header.php");
?>


<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>

  
  <hr>
	<p><a href="?Logout=1">Logi välja</a>/<a href="userprofile.php">Kasutajaprofiil</a></p>
  
</body>
</html>





