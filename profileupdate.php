<?php
include("inc/dbconfig.php");

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
$password = $_POST['newpassword1'];
$id = $_POST['id'];

$find_username = mysql_query("SELECT * FROM users WHERE id != '$id' AND email = '$email'");
$duplicate_username = mysql_num_rows($find_username);

if ($duplicate_username == 0 ) {
  if ((!empty($_POST['newpassword1'])) && (!empty($_POST['newpassword2']))) {
  //if (isset($password)) {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail', password = '$password' WHERE id = '$id'";
  } else {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail' WHERE id = '$id'";
  }
  $PageTitle = "Profile Updated";
  $FinalText = "Your profile has been successfully updated.";
  header( "Location: profileedit.php?id=$id" );
} else {
  $PageTitle = "Duplicate Entry";
  $FinalText = "The e-mail address submitted already exists in our database.  Please go back and submit a different address.";
} 

mysql_query($query);
mysql_close();

// Print results
//echo "<pre>$SendTo\n$from$subject\n\n$message</pre>";
?>

<?
include("header.php");
?>

  <div style="clear: both;"></div>
    
    <div id="twocol-wrap">
    
      <div id="main-left">
        <div id="main-left-content">
          <h2><?php echo $PageTitle ?></h2>
          
          <div style="margin-left: 12px;">
            <?php echo $FinalText ?>
            <br>
            <br>
          </div>
        </div> <!-- END main-left-content -->
      </div> <!-- END main-left -->
      
      <? include("sidebar.php"); ?>
      
    </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>