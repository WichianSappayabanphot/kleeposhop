<?php
include("../../../spdb.php");

//connect to thai language
mysqli_set_charset($dbcon, "UTF8");
$adName = $_SESSION["A_username"];
$queryAM = mysqli_query($dbcon,"select use From dean_user WHERE dean_username = '$adName'");
$queryADS = mysqli_fetch_assoc($queryAM);
$TitlePrefix = $queryADS["title_prefix"];