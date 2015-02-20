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
  <title>Bernard Lonergan News Viewer</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
</head>
<body>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 500px; margin: 0 auto;">
    <div style="margin-left: 12px;">
  
      <?php
      $id = $_GET['id'];
      
      $query = "SELECT * FROM news WHERE id = '$id'";
      
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      
      echo "<strong>" . $row['title'] . "</strong><br>\n" . $row['text'] . "<br><br>\n";
      ?>

    </div>
  </div>
</div>

<br>

</body>
</html>