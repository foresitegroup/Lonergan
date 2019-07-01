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
    $result = $mysqli->query("SELECT * FROM users");
    
    // foreach($LOGIN_INFORMATION as $key=>$val) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
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
    if (isset($PageTitle)) {
      $archivepage = strpos($PageTitle, "Archive Item");
      if ($archivepage !== false) {
        echo "Database and descriptions &copy; Copyright 2008-" . date("Y") . " by Robert M. Doran<br>";
      }
    }
    ?>
    &copy; 2008-<?php echo date("Y"); ?> Bernard Lonergan Estate &nbsp; &nbsp; &nbsp; All Rights Reserved<br>
    Website created and maintained by <a href="http://www.foresitegrp.com">Foresite Group</a>
  </div>
  
</div> <!-- END container -->

<br><br>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-5868819-13', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>