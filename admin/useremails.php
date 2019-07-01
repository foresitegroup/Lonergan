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
  <title>Bernard Lonergan Archive - E-Mail Addresses of Registered Users Who Want Updates</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
</head>
<body>

<?php include("menu.php"); ?>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 900px; margin: 0 auto;">
    <div style="margin-left: 12px;">
      
      <h3>E-Mail Addresses of Registered Users Who Want Updates</h3>
      
      <div style="font-size: 80%;">
        <?php
        $result = $mysqli->query("SELECT * FROM users WHERE getemail = 'Yes' ORDER BY email ASC");

        if($result) {
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo $row['email'] . "<br>\n";
          }
        }
        ?>
      </div>
      
      <div style="clear: both;"></div>
      
      <br><br>
  
    </div>
  </div>
</div>

<br><br>

</body>
</html>