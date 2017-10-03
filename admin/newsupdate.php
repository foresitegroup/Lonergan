<?php
include("../inc/dbconfig.php");

$title = mysql_real_escape_string($_POST['title']);
$text = mysql_real_escape_string($_POST['text']);
$id = $_POST['id'];

$query = "UPDATE news SET title = '$title', text = '$text' WHERE id = '$id'";

mysql_query($query);

mysql_close();

header( "Location: newsindex.php" );
?>