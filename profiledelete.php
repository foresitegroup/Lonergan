<?php
include("inc/dbconfig.php");

setcookie("BLarchive", "", time() - 3600, "/"); // delete cookie;

$mysqli->query("DELETE FROM users WHERE id = '".$_GET['id']."'");

mysqli_close();

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
    
    <?php include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<?php include("footer.php"); ?>