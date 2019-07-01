<?php
include("login.php");
include("../inc/dbconfig.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <META http-equiv="Content-Type" content="text/html;charset=utf-8" >
  <META http-equiv="pragma" content="no-cache">
  <META name="language" content="en">
  <META name="author" content="Remedi Creative">
  <title>Bernard Lonergan Archive User Viewer</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
</head>
<body>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 340px; margin: 0 auto;">
    <div style="margin-left: 12px;">
  
      <?php
      $result = $mysqli->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
      $row = $result->fetch_array(MYSQLI_ASSOC)($result);
      
      // Load info for display
      $display = $row['firstname'] . " " . $row['lastname'];
      if (!empty($row['institute'])) {
        $display .= "<br>" . $row['institute'];
      }
      $display .= "<br>" . $row['addr1'];
      if (!empty($row['addr2'])) {
        $display .= "<br>" . $row['addr2'];
      }
      $display .= "<br>" . $row['city'] . ", " . $row['state'] . " " . $row['zip'];
      $display .= "<br>" . $row['country'];
      $display .= "<br><br>" . $row['phone'];
      $display .= "<br>" . $row['email'];
      $display .= "<br><br>Send Updates: " . $row['getemail'];
      $display .= "<br><br>Password: " . $row['password'];
      $display .= "<br><br>Registration Date: " . $row['regdate'];
      
      echo $display;
      ?>

    </div>
  </div>
</div>

<br>

</body>
</html>