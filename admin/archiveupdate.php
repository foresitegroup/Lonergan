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
$id = $_POST['id'];

$query = "UPDATE archive SET sku = '$sku', title = '$title', author = '$author', language1 = '$language1', language2 = '$language2', decade = '$decade', pdf = '$pdf', audio = '$audio', video = '$video', description = '$description', archivalnum = '$archivalnum', transcription = '$transcription', display = '" . $_POST['display'] . "' WHERE id = '$id'";

mysql_query($query);

mysql_close();

header( "Location: archiveindex.php" );
?>