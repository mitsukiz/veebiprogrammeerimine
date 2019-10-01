<?php
	$userName = "Daniel Gurevits";
	$picDir = "../images/";
	$picFileTypes = ["image/jpeg", "image/png"];
	$fullTimeNow = date("D.M.Y. H:i:s");
	$hourNow = date("H");
	$partOfDay = "hägune aeg";
	if($hourNow < 8){
		$partOfDay = "varane hommik";
	}

	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart->diff($semesterEnd);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart->diff($today);
	
	//var_dump($fromSemesterStart);
	
	$semesterInfoHTML = "<p>Info semestri kohta!</p>";
	//$testValue = $fromSemesterStart->format("%r%a");
	//echo $testValue;
	//<meter min="0" max="155" value="33">Väärtus</meter>
	$eLapsedValue = $fromSemesterStart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	if ($eLapsedValue > 9){
		$semesterInfoHTML = "<p>Semester on täies hoos: ";
		$semesterInfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterInfoHTML .= 'value="' .$eLapsedValue .'">';
		$semesterInfoHTML .= round($eLapsedValue / $durationValue * 100, 2);
		$semesterInfoHTML .= "</p>";
		
	}
	//Pildi lisamine lehele
	$allImages = [];
	$dirContent = array_slice(scandir($picDir), 2);
	//var_dump($dirContent);
	//echo $file;
	foreach ($dirContent as $file) {
		$fileInfo = getImagesize($picDir .$file);
		//var_dump($fileInfo);
		if(in_array($fileInfo["mime"], $picFileTypes) == true) {
			array_push($allImages, $file);
		}
	}
	
	
	//$allImages = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"];
	//var_dump($allImages);
	$picCount = count($allImages);
	$picNum = mt_rand(0,($picCount - 1));
	//echo $allImages[$picNum];
	$picFile = $picDir .$allImages[$picNum];
	$randomImgHTML = '<img src="' .$picFile.'" alt="TLÜ Terra
	õppehoone">';
	
	
	require "header.php";
?>







<body>
	<?php
		echo "<h1>" .$userName ." koolitöö leht</h1>";
	?>
	<p>Paragrahv</p>
	<?php
		echo $semesterInfoHTML;
	?>
	<hr>
	
	<p>Lehe avamise hetkel oli aeg:
	<?php
		echo $fullTimeNow;
	?>
	</p>
	
	<?php
		echo "<p>Lehe avamise hetkel oli " .$partOfDay .
		".</php>";
	?>
	<hr>
	<?php
	echo $randomImgHTML;
	?>
	
</body>
</html>