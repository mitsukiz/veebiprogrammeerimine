<?php
require("../../../config.php");
function readAllFilms() {
	$filmInfoHTML ="";
	//loeme andmebaasist
	//loome andmebaasiühenduse
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//valmistame ette päringu
	$stmt = $conn->prepare("SELECT pealkiri, aasta FROM film");
	//soime saadava tulemuse muutujaga
	$stmt->bind_result($filmTitle, $filmYear);
	//kaivitame SQL päringu
	$stmt->execute();
	
	while($stmt->fetch()) {
		 $filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
		 $filmInfoHTML .= "<p>" . $filmYear ."</p>";
		
	}
	
	
	
	//sulgeme ühendused
	$stmt->close();
	$conn->close();
	
	return $filmInfoHTML;
	}
	
	function saveFilmInfo($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmCompany,
		$filmDirector){
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $conn->prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
		
		echo $conn->error;
		//s- string, i-integer, d-date
		$stmt->bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGenre, $filmCompany,
		$filmDirector);
		$stmt->execute();
		
		$stmt->close();
		$conn->close();
	}
?>