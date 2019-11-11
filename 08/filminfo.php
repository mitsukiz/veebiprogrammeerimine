<?php
  require("../../../config.php");
  require("functions_film.php");
  $userName = "Daniel Gurevits";
  $database = "if19_daniel_gu_1";
  
  $filmInfoHTML = readAllFilms();
  $filmAge = 50;
  $oldFilmInfoHTML = readOldFilms($filmAge);
	
  //lisame lehe päise
  require("header.php");
?>


<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <h2>Eesti filmid</h2>
  <p>Praegu on andmebaasis järgmised filmid:</p>
  <?php
	//echo "Server: " .$serverHost .", kasutaja: " .$serverUsername;
	echo $filmInfoHTML;
	echo "<hr>";
	echo "<h2>Filmid, mis on vanemad, kui " .$filmAge ." aastat.</h2>";
	echo $oldFilmInfoHTML;
  ?>
</body>
</html>





