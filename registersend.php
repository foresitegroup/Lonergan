<?php
if ($_POST['confirmationCAP'] == "") {
  $salt = "BernardLonerganArchive";

  include("inc/dbconfig.php");

  $SendTo = $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $subject = "Welcome to the Lonergan Archive";
  $from = "From: Bernard Lonergan Archive <info@bernardlonergan.com>\r\n";

  $newpass = substr(md5(rand().rand()), 0, 8);

  $message = "Welcome to the Bernard Lonergan Archive.  You may use your email address as your username.  Your password is $newpass.  Please retain this email for your records.\n";

  // Set varibles to be inserted in DB
  $firstname = $_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $lastname = $_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $institute = $_POST[md5('institute' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $addr1 = $_POST[md5('addr1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $addr2 = $_POST[md5('addr2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $city = $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $state = $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $zip = $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $country = $_POST[md5('country' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $phone = $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  $email = $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])];
  if (!empty($_POST['getemail'])) {
    $getemail = "Yes";
  } else {
    $getemail = "No";
  }
  $regdate = date("j F Y g:ia");
  
  $find_username = mysql_query("SELECT email FROM users WHERE email = '$email'");
  $duplicate_username = mysql_num_rows($find_username);

  if ($duplicate_username == 0 ) {
    $newrec = "INSERT INTO users (firstname,lastname,institute,addr1,addr2,city,state,zip,country,phone,email,password,getemail,regdate) VALUES('$firstname','$lastname','$institute','$addr1','$addr2','$city','$state','$zip','$country','$phone','$email','$newpass', '$getemail', '$regdate')";
    $PageTitle = "Registration Submitted";
    $FinalText = "Your information has been successfully submitted.  You will receive an e-mail shortly with your username and password. If you don't see this e-mail, check your spam folder.";
    // Send it
    mail($SendTo, $subject, $message, $from);
    //mail("m.lippert@remedicreative.com", "New Lonergan Archive Resistration", $firstname . " " $lastname, $from);
  } else {
    $PageTitle = "Duplicate Entry";
    $FinalText = "The e-mail address submitted already exists in our database.  Please go back and submit a different address or <a href=\"lostpassword.php\">retrieve the password</a> for this address.";
  } 

  mysql_query($newrec);
  mysql_close();

  // Print results
  //echo "<pre>$SendTo\n$from$subject\n\n$message</pre>";
} else {
  $PageTitle = "Sorry";
  $FinalText = "Looks like spam.";
}

include("header.php");
?>

  <div style="clear: both;"></div>
    
    <div id="twocol-wrap">
    
      <div id="main-left">
        <div id="main-left-content">
          <h2><?php echo $PageTitle; ?></h2>
          
          <div style="margin-left: 12px;">
            <?php echo $FinalText; ?>
            <br>
            <br>
          </div>
        </div> <!-- END main-left-content -->
      </div> <!-- END main-left -->
      
      <? include("sidebar.php"); ?>
      
    </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>