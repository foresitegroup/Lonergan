<?php
include("../inc/dbconfig.php");

$mysqli->query("UPDATE archive SET
  sku = '".$_POST['sku']."',
  title = '".$mysqli->real_escape_string($_POST['title'])."',
  author = '".$mysqli->real_escape_string($_POST['author'])."',
  language1 = '".$_POST['language1']."',
  language2 = '".$_POST['language2']."',
  decade = '".$_POST['decade']."',
  pdf = '".$_POST['pdf']."',
  audio = '".$_POST['audio']."',
  video = '".$_POST['video']."',
  description = '".$mysqli->real_escape_string($_POST['description'])."',
  archivalnum = '".$_POST['archivalnum']."',
  transcription = '".$mysqli->real_escape_string($_POST['transcription'])."',
  display = '" . $_POST['display'] . "'
WHERE id = '".$_POST['id']."'");

mysqli_close();

header("Location: archiveindex.php");
?>