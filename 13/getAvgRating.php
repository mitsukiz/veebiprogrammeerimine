<?php
require("../../../config.php");
require("functions_pic.php");

$database = "if19_daniel_gu_1";

//Votame vastu AJAXI saadetud info
$picId = $_REQUEST['picid'];

$displayAvgRating = getAvgPicRating($picId);

//echo $displayAvgRating;

$response =  $displayAvgRating;

echo $response;