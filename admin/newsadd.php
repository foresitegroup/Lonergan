<?php
include("../inc/dbconfig.php");

$title = $_POST['title'];
$text = $_POST['text'];

$newrec = "INSERT INTO news (title,text) VALUES('$title','$text')";

mysql_query($newrec);

mysql_close();

header( "Location: newsindex.php" );
?>