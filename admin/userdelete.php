<?php
include("../inc/dbconfig.php");

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = '$id'";

mysql_query($query);

mysql_close();

header( "Location: userindex.php" );
?>