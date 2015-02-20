<?php
setcookie("verify", "", time() - 3600, "/"); // delete cookie;

header( "Location: index.php" );
?>