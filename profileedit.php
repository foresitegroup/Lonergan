<?
include("login.php");
$PageTitle = "Edit Profile";
include("header.php");
include("inc/dbconfig.php");

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysql_query($query);
$row = mysql_fetch_array($result)
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/EditProfile.jpg" alt="Edit Profile"><br>
        <br>
        
        <div style="margin-left: 12px;">
          <script type="text/javascript">
            <!--
            function checkform (form) {
              if (form.newpassword1.value !== form.newpassword2.value) {
                alert('Password fields do not match.  Make sure the new password is identical in both fields.');
                form.newpassword1.focus();
                return false ;
              }
              return true ;
            }
            //-->
          </script>
          
          <form method="post" action="profileupdate.php" onsubmit="return checkform(this)">
            <table>
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
                <td colspan="2" style="font-size: 80%; font-style: italic;">Note: If you change your e-mail address, the new address will be your login name from now on.<br><br></td>
              </tr>
              <tr>
                <td colspan="2">
                  
                  <?php
                  if ($row['getemail'] == "Yes") {
                    $checked = "checked";
                  } else {
                    $checked = "";
                  }
                  ?>
                  
                  <input type="checkbox" name="getemail" value="Yes" <?php echo $checked ?>> Yes, I would like to receive updates regrding the Lonergan Project.  (The information you send us will not be shared with any third party.)
                </td>
              </tr>
              <tr>
                <td colspan="2"><br><hr><br></td>
              </tr>
              <tr>
                <td colspan="2" style="font-size: 80%; font-style: italic;">Leave the fields below blank if you do <strong>NOT</strong> want to change your password.  The other fields <strong>will</strong> be updated regardless of the password fields.</td>
              </tr>
              <tr>
                <td id="left">New Password:</td>
                <td><input type="password" name="newpassword1" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Retype New Password:</td>
                <td><input type="password" name="newpassword2" size="30" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <br>
                  <input type="hidden" name="id" value="<?php echo $id ?>" />
                  <input type="submit" value="Update">
                </td>
              </tr>
            </table>
          </form>
          
          <br><hr><br>
          
          If you no longer wish to access the Lonergan Archive and want your personal information removed from our database, you may delete your account.  When you click the link below, your profile will be removed <em>immediately</em> and you will be logged out and no longer able to access the archive.<br>
          <a href="profiledelete.php?id=<?php echo $id ?>" onClick="return confirm('Are you SURE you want to delete your account?  This will happen immediately.');">Delete Account</a>
          
          <br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>