<?php
include("../inc/dbconfig.php");

$mysqli->query("INSERT INTO news (title,text) VALUES('".$mysqli->real_escape_string($_POST['title'])."','".$mysqli->real_escape_string($_POST['text'])."')");

mysqli_close();

header("Location: newsindex.php");
?>