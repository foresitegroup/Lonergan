<?php
include("../inc/dbconfig.php");

$getemail = (!empty($_POST['getemail'])) ? "Yes" : "No";

mysql_query("UPDATE users SET
  firstname = '".$mysqli->real_escape_string($_POST['firstname'])."',
  lastname = '".$mysqli->real_escape_string($_POST['lastname'])."',
  institute = '".$mysqli->real_escape_string($_POST['institute'])."',
  addr1 = '".$mysqli->real_escape_string($_POST['addr1'])."',
  addr2 = '".$mysqli->real_escape_string($_POST['addr2'])."',
  city = '".$mysqli->real_escape_string($_POST['city'])."',
  state = '".$mysqli->real_escape_string($_POST['state'])."',
  zip = '".$mysqli->real_escape_string($_POST['zip'])."',
  country = '".$mysqli->real_escape_string($_POST['country'])."',
  phone = '".$mysqli->real_escape_string($_POST['phone'])."',
  email = '".$mysqli->real_escape_string($_POST['email'])."',
  getemail = '$getemail',
  password = '".$mysqli->real_escape_string($_POST['password'])."'
WHERE id = '".$_POST['id']."'");

mysqi_close();

header("Location: userindex.php");
?>