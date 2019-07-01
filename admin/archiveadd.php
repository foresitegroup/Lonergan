<?php
include("../inc/dbconfig.php");

$sku = $_POST['sku'];
$title = $mysqli->real_escape_string($_POST['title']);
$author = $mysqli->real_escape_string($_POST['author']);
$language1 = $_POST['language1'];
$language2 = $_POST['language2'];
$decade = $_POST['decade'];
$pdf = $_POST['pdf'];
$audio = $_POST['audio'];
$video = $_POST['video'];
$description = $mysqli->real_escape_string($_POST['description']);
$archivalnum = $_POST['archivalnum'];
$transcription = $mysqli->real_escape_string($_POST['transcription']);

$mysqli->query("INSERT INTO archive (
  sku,
  title,
  author,
  language1,
  language2,
  decade,
  pdf,
  audio,
  video,
  description,
  archivalnum,
  transcription,
  display
) VALUES(
  '".$_POST['sku']."',
  '".$mysqli->real_escape_string($_POST['title'])."',
  '".$mysqli->real_escape_string($_POST['author'])."',
  '".$_POST['language1']."',
  '".$_POST['language2']."',
  '".$_POST['decade']."',
  '".$_POST['pdf']."',
  '".$_POST['audio']."',
  '".$_POST['video']."',
  '".$mysqli->real_escape_string($_POST['description'])."',
  '".$_POST['archivalnum']."',
  '".$mysqli->real_escape_string($_POST['transcription'])."',
  '".$_POST['display']."'
)");

mysqli_close();

header("Location: archiveindex.php");
?>