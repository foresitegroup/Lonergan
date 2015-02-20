  <div style="clear: both; height: 14px;"></div>
  
  <?php if ((!isset($_COOKIE['BLarchive'])) || ($PageTitle == "Profile Deleted")) { ?>
    <img src="images/FreeRegistration.jpg" alt="Free Registration" style="padding-left: 13px;">
    <a href="register.php"><img src="images/RegisterNow.jpg" alt="Register Now" style="padding-left: 30px;"></a><br>
    <div id="main-bottom">
      To view or listen to the materials within the Bernard Lonergan Archive you must be a registered user.
    </div>
    
  <?php
  } else {
    include("inc/dbconfig.php");
    $query = "SELECT * FROM users";
    $result = mysql_query($query);
    
    // foreach($LOGIN_INFORMATION as $key=>$val) {
    while($row = mysql_fetch_array($result)) {
      $login = $row['email'];
      $password = $row['password'];
      
      //$lp = (USE_USERNAME ? $login : '') .'%'.$password;
      $lp = $login.'%'.$password;
      if ($_COOKIE['BLarchive'] == md5($lp)) {
        break;
      }
    }
  ?>
  <div style="padding-left: 13px;">
    <a href="profileedit.php?id=<?php echo $row['id']; ?>">Edit my profile</a> | <a href="logout.php">Logout</a>
  </div>
  <?php } ?>
  
  <br>
  
  <div id="copyright">
    <?php
    $archivepage = strpos($PageTitle, "Archive Item");
    if ($archivepage !== false) {
      echo "Database and descriptions &copy; Copyright 2008-" . date("Y") . " by Robert M. Doran<br>";
    }
    ?>
    &copy; 2008-<?php echo date("Y"); ?> Bernard Lonergan Estate &nbsp; &nbsp; &nbsp; All Rights Reserved<br>
    Website created and maintained by <a href="http://www.foresitegrp.com">Foresite Group</a>
  </div>
  
</div> <!-- END container -->

<br><br>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5868819-13");
pageTracker._trackPageview();
</script>

</body>
</html>