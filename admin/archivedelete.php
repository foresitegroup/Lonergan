<?php
include("../inc/dbconfig.php");

$mysqli->query("DELETE FROM archive WHERE id = '".$_GET['id']."'");

mysqli_close();

header("Location: archiveindex.php");
?>