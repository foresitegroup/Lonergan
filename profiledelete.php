<?php
include("inc/dbconfig.php");

setcookie("BLarchive", "", time() - 3600, "/"); // delete cookie;

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = '$id'";

mysql_query($query);

mysql_close();

$PageTitle = "Profile Deleted";
include("header.php");
?>

  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/ProfileDeleted.jpg" alt="Profile Deleted"><br>
        <br>
        
        <div style="margin-left: 12px;">
          Your profile has been removed.  We are sorry to see you go.  If you wish to access the Archive in the future, you will have to <a href="register.php">register</a> again.
          <br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>