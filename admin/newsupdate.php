<?php
include("../inc/dbconfig.php");

$mysqli->query("UPDATE news SET title = '".$mysqli->real_escape_string($_POST['title'])."', text = '".$mysqli->real_escape_string($_POST['text'])."' WHERE id = '".$_POST['id']."'");

mysqli_close();

header("Location: newsindex.php");
?>