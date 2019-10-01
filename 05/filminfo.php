<?php
	require ("functions_film.php");
	require("../../../config.php");
	$userName = "Daniel Gurevits";
	$database = "if19_daniel_gu_1";
	
	$filmInfoHTML = readAllFilms();

	require("header.php");
?>







<body>
	<?php
		echo "<h1>" .$userName ."'i koolitöö leht</h1>";
	?>
	<h2>Eesti filmid</h2>

<hr>
	<p> Praegu on andmebaasis järgmised filmid:</p>
	<?php
	//echo "Server: " .$serverHost .", kasutaja: " .$serverUsername;
	echo $filmInfoHTML;
	?>

	
</body>
</html>