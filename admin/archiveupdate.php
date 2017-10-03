<?php
include("../inc/dbconfig.php");

$sku = $_POST['sku'];
$title = mysql_real_escape_string($_POST['title']);
$author = mysql_real_escape_string($_POST['author']);
$language1 = $_POST['language1'];
$language2 = $_POST['language2'];
$decade = $_POST['decade'];
$pdf = $_POST['pdf'];
$audio = $_POST['audio'];
$video = $_POST['video'];
$description = mysql_real_escape_string($_POST['description']);
$archivalnum = $_POST['archivalnum'];
$transcription = mysql_real_escape_string($_POST['transcription']);
$id = $_POST['id'];

$query = "UPDATE archive SET sku = '$sku', title = '$title', author = '$author', language1 = '$language1', language2 = '$language2', decade = '$decade', pdf = '$pdf', audio = '$audio', video = '$video', description = '$description', archivalnum = '$archivalnum', transcription = '$transcription', display = '" . $_POST['display'] . "' WHERE id = '$id'";

mysql_query($query);

mysql_close();

header( "Location: archiveindex.php" );
?>