<?php
  require("../../../config.php");
  require("functions_main.php");
  require("functions_user.php");
  $database = "if19_daniel_gu_1";
  
  //SESSIOON
  require("classes/Session.class.php");
  //sessioon, mis katkeb, kui brauser suletakse ja on kättesaadav ainult meie domeenis, meie lehele
  SessionManager::sessionStart("vp", 0, "/~daniegur/", "greeny.cs.tlu.ee");
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userID"])){
	  //siis jõuga sisselogimise lehele
	  header("Location: page.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  
  //tegeleme küpsistega (cookies)
  //setcookie peab olema enne <html> elementi!
  //nimi [väärtus, aegumine, path ehk kataloog, domeen (domain), secure ehk kas HTTPS, http-only]
  setcookie("vpname", $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"], time() + (86400 * 31), "/~daniegur/", "greeny.cs.tlu.ee", isset($_SERVER["HTTPS"]), true);
  
  if(isset($_COOKIE["vpname"])){
	  echo "Küpsisest selgus nimi: " .$_COOKIE["vpname"];
  } else {
	  echo "Küpsiseid ei leitud!";
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
  <p><a href="?logout=1">Logi välja!</a></p>
  <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
	<li><a href="messages.php">Sõnumid</a></li>
	<li><a href="showfilminfo.php">Filmid</a></li>
	<li><a href="picupload.php">Piltide üleslaadimine</a></li>
	<li><a href="publicgallery.php">Avalike piltide galerii</a></li>
	<li><a href="userpics.php">Minu oma pildid</a></li>
	<li><a href="addnews.php">Lisa uudis</a></li>
  </ul>
  
</body>
</html>





