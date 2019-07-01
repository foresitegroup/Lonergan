<?php
include("inc/dbconfig.php");

// Set varibles to be inserted in DB
$firstname = $mysqli->real_escape_string($_POST['firstname']);
$lastname = $mysqli->real_escape_string($_POST['lastname']);
$institute = $mysqli->real_escape_string($_POST['institute']);
$addr1 = $mysqli->real_escape_string($_POST['addr1']);
$addr2 = $mysqli->real_escape_string($_POST['addr2']);
$city = $mysqli->real_escape_string($_POST['city']);
$state = $mysqli->real_escape_string($_POST['state']);
$zip = $mysqli->real_escape_string($_POST['zip']);
$country = $mysqli->real_escape_string($_POST['country']);
$phone = $mysqli->real_escape_string($_POST['phone']);
$email = $mysqli->real_escape_string($_POST['email']);
if (!empty($_POST['getemail'])) {
  $getemail = "Yes";
} else {
  $getemail = "No";
}
$password = $mysqli->real_escape_string($_POST['newpassword1']);
$id = $_POST['id'];

$find_username = $mysqli->query("SELECT * FROM users WHERE id != '$id' AND email = '$email'");
$duplicate_username = $find_username->num_rows;

if ($duplicate_username == 0 ) {
  if ((!empty($_POST['newpassword1'])) && (!empty($_POST['newpassword2']))) {
  //if (isset($password)) {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail', password = '$password' WHERE id = '$id'";
  } else {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', institute = '$institute', addr1 = '$addr1', addr2 = '$addr2', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', email = '$email', getemail = '$getemail' WHERE id = '$id'";
  }
  $PageTitle = "Profile Updated";
  $FinalText = "Your profile has been successfully updated.";
  header("Location: profileedit.php?id=$id");
} else {
  $PageTitle = "Duplicate Entry";
  $FinalText = "The e-mail address submitted already exists in our database.  Please go back and submit a different address.";
} 

$mysqli->query($query);
mysqli_close();

// Print results
//echo "<pre>$SendTo\n$from$subject\n\n$message</pre>";
?>

<?php
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
      
      <?php include("sidebar.php"); ?>
      
    </div> <!-- END twocol-wrap -->
  
<?php include("footer.php"); ?>