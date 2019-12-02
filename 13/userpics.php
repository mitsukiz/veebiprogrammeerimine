<?php
  require("../../../config.php");
  require("functions_main.php");
  require("functions_user.php");
  require("functions_pic.php");
  $database = "if19_daniel_gu_1";
  
     //SESSIOON
  require("classes/Session.class.php");
  //sessioon, mis katkeb, kui brauser suletakse ja on kättesaadav ainult meie domeenis, meie lehele
  SessionManager::sessionStart("vp", 0, "/~daniegur/", "greeny.cs.tlu.ee");
    
  //kui pole sisseloginud
  if(!isset($_SESSION["userID"])){
	  header("Location: page.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  
  $notice = null;
  
  //piirid galerii lehel näidatava piltide arvu jaoks
  $page = 1;
  $limit = 5;
  $totalPics = countMyImages();
  if(!isset($_GET["page"]) or $_GET["page"] < 1){
	  $page = 1;
  } elseif (round($_GET["page"] - 1) * $limit >= $totalPics){
	  $page = round($totalPics / $limit) - 1;
  } else {
	  $page = $_GET["page"];
  }
  $userPicThumbsHTML = readuserPicsPage($page, $limit);
  
  //$publicThumbsHTML = readAllPublicPics(2);
  //<link rel="stylesheet" type="text/css" href="style/modal.css">
  $toScript = "\t" .'<link rel="stylesheet" type="text/css" href="style/modal.css">' ."\n";
  $toScript .= "\t" .'<script type="text/javascript" src="javascript/usermodal.js" defer></script>' ."\n";
  require("header.php");
?>


<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p><a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a></p>
  <hr>
  <h2>Minu oma üleslaetud pildid</h2>
  <!--Teeme modaalakna, W3schools eeskuju-->
  <div id="myModal" class="modal">
	<!--Sulgemisnupp-->
	<span id="close" class="close">&times;</span>
	<!--pildikoht-->
	<img id="modalImg" class="modal-content">
	<div id="caption" class="caption"></div>
	
		<span id="avgRating" class="caption"></span>
	</div>
	
  </div>
  <p>
  
  <!--<a href="?page=1">Leht 1</a> | <a href="?page=2">Leht 2</a>-->
  
  <?php
	if($page > 1){
		echo '<a href="?page=' .($page - 1) .'">Eelmine leht</a> | ' ."\n";
	} else {
		echo "<span>Eelmine leht</span> | \n";
	}
	if($page * $limit < $totalPics){
		echo '<a href="?page=' .($page + 1) .'">Järgmine leht</a>' ."\n";
	} else {
		echo "<span>Järgmine leht</span> | \n";
	}
  ?>
  
  </p>
  <div id="gallery">
	  <?php
		echo $userPicThumbsHTML;
	  ?>
  </div>
  <hr>
</body>
</html>





