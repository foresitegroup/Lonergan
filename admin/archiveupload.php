<?php
session_start();

if ($_FILES['file']['type'] == "application/pdf") {
  move_uploaded_file($_FILES['file']['tmp_name'], "../pdf/" . $_FILES['file']['name']);
  $_SESSION['POST'] = $_FILES['file']['name'] . " has been uploaded.<br>";
} else {
  $_SESSION['POST'] = "Sorry, you may only upload PDF files.<br>";
}

header( "Location: archiveindex.php" );
?>