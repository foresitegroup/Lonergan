<?php
include("../inc/dbconfig.php");

// Set varibles to be inserted in DB
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$institute = mysql_real_escape_string($_POST['institute']);
$addr1 = mysql_real_escape_string($_POST['addr1']);
$addr2 = mysql_real_escape_string($_POST['addr2']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$country = mysql_real_escape_string($_POST['country']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);
if (!empty($_POST['getemail'])) {
  $getemail = "Yes";
} else {
  $getemail = "No";
}
$password = mysql_real_escape_string($_POST['password']);
$id = $_POST['id'];

$query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail', password = '$password' WHERE id = '$id'";

mysql_query($query);
mysql_close();

header( "Location: userindex.php" );
?>