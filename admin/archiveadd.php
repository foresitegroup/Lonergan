<?php
include("../inc/dbconfig.php");

$sku = $_POST['sku'];
$title = $_POST['title'];
$author = $_POST['author'];
$language1 = $_POST['language1'];
$language2 = $_POST['language2'];
$decade = $_POST['decade'];
$pdf = $_POST['pdf'];
$audio = $_POST['audio'];
$video = $_POST['video'];
$description = $_POST['description'];
$archivalnum = $_POST['archivalnum'];
$transcription = $_POST['transcription'];

$newrec = "INSERT INTO archive (sku,title,author,language1,language2,decade,pdf,audio,video,description,archivalnum,transcription,display) VALUES('$sku','$title','$author','$language1','$language2','$decade','$pdf','$audio','$video','$description','$archivalnum','$transcription','" . $_POST['display'] . "')";

mysql_query($newrec);

mysql_close();

header( "Location: archiveindex.php" );
?>