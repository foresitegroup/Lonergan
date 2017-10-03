<?php
include("../inc/dbconfig.php");

$title = mysql_real_escape_string($_POST['title']);
$text = mysql_real_escape_string($_POST['text']);

$newrec = "INSERT INTO news (title,text) VALUES('$title','$text')";

mysql_query($newrec);

mysql_close();

header( "Location: newsindex.php" );
?>