<?php
include("inc/dbconfig.php");

$SendTo = $_POST['email'];
$subject = "Lonergan Archive Password";
$from = "From: Bernard Lonergan Archive <info@bernardlonergan.com>\r\n";

$find_username = mysql_query("SELECT email FROM users WHERE email = '$SendTo'");
$count_username = mysql_num_rows($find_username);

if ($count_username !== 0 ) {
  $query = "SELECT password FROM users WHERE email = '$SendTo'";
  $result = mysql_query($query);
  
  while($row = mysql_fetch_array($result)) {
    $password = $row['password'];
  }
  $PageTitle = "Password Sent";
  $FinalText = "Your password has been sent to the submitted e-mail address.  Please make a note of it.";
  $message = "You password is $password.  Please keep it in a safe place.\n";
  // Send it
  mail($SendTo, $subject, $message, $from);
} else {
  $PageTitle = "Address Not Found";
  $FinalText = "Sorry, but this address does not exist in our database.  Please recheck and try again.  You may also <a href=\"register.php\">re-register</a> if you wish.";
} 

mysql_query($newrec);
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