<?php
include("../inc/dbconfig.php");

$mysqli->query("DELETE FROM users WHERE id = '".$_GET['id']."'");

mysqli_close();

header("Location: userindex.php");
?>