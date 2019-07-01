<?php
include("../inc/dbconfig.php");

$mysqli->query("DELETE FROM news WHERE id = '".$_GET['id']."'");

mysqli_close();

header("Location: newsindex.php");
?>