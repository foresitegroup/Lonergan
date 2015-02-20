<?php
setcookie("BLarchive", "", time() - 3600, "/"); // delete cookie;

header( "Location: index.php" );
?>