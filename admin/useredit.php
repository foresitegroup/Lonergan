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
  <title>Bernard Lonergan Archive - Edit User</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
</head>
<body>

<?php include("menu.php"); ?>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 900px; margin: 0 auto;">
    <div style="margin-left: 12px;">
    
      <?php
      $result = $mysqli->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      ?>
  
      <form action="userupdate.php" method="POST">
      <table style="width: 380px; float: left;">
        <tr>
          <td id="left">First Name:</td>
          <td><input type="text" name="firstname" size="30" value="<?php echo $row['firstname'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Last Name:</td>
          <td><input type="text" name="lastname" size="30" value="<?php echo $row['lastname'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Institute/Organization:</td>
          <td><input type="text" name="institute" size="30" value="<?php echo $row['institute'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Address 1:</td>
          <td><input type="text" name="addr1" size="30" value="<?php echo $row['addr1'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Address 2:</td>
          <td><input type="text" name="addr2" size="30" value="<?php echo $row['addr2'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">City:</td>
          <td><input type="text" name="city" size="30" value="<?php echo $row['city'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">State/Province:</td>
          <td><input type="text" name="state" size="30" value="<?php echo $row['state'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Zip/Postal Code:</td>
          <td><input type="text" name="zip" size="10" value="<?php echo $row['zip'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Country:</td>
          <td><input type="text" name="country" size="30" value="<?php echo $row['country'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Phone:</td>
          <td><input type="text" name="phone" size="30" value="<?php echo $row['phone'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Email:</td>
          <td><input type="text" name="email" size="30" value="<?php echo $row['email'] ?>" /></td>
        </tr>
        <tr>
          <td id="left">Wants Updates:</td>
          <td>
            
            <?php
            if ($row['getemail'] == "Yes") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            
            <input type="checkbox" name="getemail" value="Yes" <?php echo $checked ?>>
          </td>
        </tr>
        <tr>
          <td id="left">Password:</td>
          <td><input type="text" name="password" size="30" value="<?php echo $row['password'] ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="submit" value="Update" /></td>
        </tr>
      </table>
      </form>
      
      <div style="clear: both;"></div>
  
    </div>
  </div>
</div>

</body>
</html>