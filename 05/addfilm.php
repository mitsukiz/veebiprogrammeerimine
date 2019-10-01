<?php
	require("../../../config.php");
	require ("functions_film.php");
	$userName = "Daniel Gurevits";
	$database = "if19_daniel_gu_1";
	
	
	//var_dump($_POST);
	
	if(isset($_POST["submitFilm"])) {
		if(!empty($_POST["filmTitle"]));
			saveFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmCompany"],
			$_POST["filmDirector"]);
	}
	
	require("header.php");
?>







<body>
	<?php
		echo "<h1>" .$userName ."'i koolitöö leht</h1>";
	?>
	<h2>Eesti filmid, lisame uue</h2>

<hr>
	<p>Täida kõik failid ja lisa film andmebaasi.</p>
	
	<form method="post">
		<label>Sisesta pealkiri: </label><input type="text" name="filmTitle">
		</br>
		<label>Filmi tootmisaasta: </label><input type="number" min="1912" max="2019"
		value="2019" name="filmYear">
		</br>
		<label>Filmi kestus (min): </label><input type="number" min="0" max="300"
		value="80" name="filmDuration">
		</br>
		<label>Filmi žanr: </label><input type="text" name="filmGenre">
		</br>
		<label>Filmi tootja: </label><input type="text" name="filmCompany">
		</br>
		<label>Filmi lavastaja: </label><input type="text" name="filmDirector">
		</br>
		<input type="submit" value="Salvesta filmi info" name="submitFilm">
		
	</form>
	<?php
	//echo "Server: " .$serverHost .", kasutaja: " .$serverUsername;
	//echo $filmInfoHTML;
	?>

	
</body>
</html>