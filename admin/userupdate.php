<?php
include("../inc/dbconfig.php");

// Set varibles to be inserted in DB
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$institute = $_POST['institute'];
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$email = $_POST['email'];
if (!empty($_POST['getemail'])) {
  $getemail = "Yes";
} else {
  $getemail = "No";
}
$password = $_POST['password'];
$id = $_POST['id'];

$query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail', password = '$password' WHERE id = '$id'";

mysql_query($query);
mysql_close();

header( "Location: userindex.php" );
?>