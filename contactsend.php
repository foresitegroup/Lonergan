<?php
$SendTo = "bdoranca@yahoo.ca"; // CHANGE THIS!
$subject = "Message Via The Bernard Lonergan Archive";
$from = "From: " . $_POST['email'] . "\r\n";

$message = $_POST['comments'] . "\n";

// Print results
//echo "<pre>$SendTo\n$from$subject\n\n$message</pre>";

// Send it
mail($SendTo, $subject, $message, $from);

// Done, so let's go back
//header( "Location: contact.php" );
?>

<?
$PageTitle = "Message Submitted";
include("header.php");
?>

  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/Contact.jpg" alt="Contact Us"><br>
        <br>
        
        <div style="margin-left: 12px;">
    	
    	    <h2>Message Submitted</h2>
      
          Your message has been sent!  Thank you for your interest in the Bernard Lonergan Archive.
      
          <br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>