<?
$PageTitle = "Register";
include("header.php");

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "BernardLonerganArchive";
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/Register.jpg" alt="Register"><br>
        <br>
        
        <div style="margin-left: 12px;">
          <script type="text/javascript">
            <!--
            function checkform (form) {
              if (document.getElementById('lastname').value == "") { alert('Last Name required.'); document.getElementById('lastname').focus(); return false; }
              if (document.getElementById('addr1').value == "") { alert('Address required.'); document.getElementById('addr1').focus(); return false; }
              if (document.getElementById('city').value == "") { alert('City required.'); document.getElementById('city').focus(); return false; }
              if (document.getElementById('state').value == "") { alert('State/Province required.'); document.getElementById('state').focus(); return false; }
              if (document.getElementById('zip').value == "") { alert('Zip/Postal Code required.'); document.getElementById('zip').focus(); return false; }
              if (document.getElementById('country').value == "") { alert('Country required.'); document.getElementById('country').focus(); return false; }
              if (document.getElementById('phone').value == "") { alert('Phone Number required.'); document.getElementById('phone').focus(); return false; }
              if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false; }
              return true ;
            }
            //-->
          </script>
          
          Starred fields are required.  Your user name and password will be sent to the submitted e-mail address; please make sure it is valid and correct. If you don't see this e-mail, check your spam folder.<br>
          <br>
          
          <form method="post" action="registersend.php" onsubmit="return checkform(this)">
            <table>
              <tr>
                <td id="left">First Name:</td>
                <td><input type="text" name="<?php echo md5("firstname" . $ip . $salt . $timestamp); ?>" id="firstname" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Last Name *:</td>
                <td><input type="text" name="<?php echo md5("lastname" . $ip . $salt . $timestamp); ?>" id="lastname" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Institute/Organization:</td>
                <td><input type="text" name="<?php echo md5("institute" . $ip . $salt . $timestamp); ?>" id="institute" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Address 1 *:</td>
                <td><input type="text" name="<?php echo md5("addr1" . $ip . $salt . $timestamp); ?>" id="addr1" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Address 2:</td>
                <td><input type="text" name="<?php echo md5("addr2" . $ip . $salt . $timestamp); ?>" id="addr2" size="30" /></td>
              </tr>
              <tr>
                <td id="left">City *:</td>
                <td><input type="text" name="<?php echo md5("city" . $ip . $salt . $timestamp); ?>" id="city" size="30" /></td>
              </tr>
              <tr>
                <td id="left">State/Province *:</td>
                <td><input type="text" name="<?php echo md5("state" . $ip . $salt . $timestamp); ?>" id="state" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Zip/Postal Code *:</td>
                <td><input type="text" name="<?php echo md5("zip" . $ip . $salt . $timestamp); ?>" id="zip" size="10" /></td>
              </tr>
              <tr>
                <td id="left">Country *:</td>
                <td><input type="text" name="<?php echo md5("country" . $ip . $salt . $timestamp); ?>" id="country" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Phone *:</td>
                <td><input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" size="30" /></td>
              </tr>
              <tr>
                <td id="left">Email *:</td>
                <td><input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" size="30" /></td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="checkbox" name="getemail" value="Yes"> Yes, I would like to receive updates regarding the Lonergan Project.  (The information you send us will not be shared with any third party.  Please see our <a href="privacy.php">Privacy Policy</a> for more details.)
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
                  <input type="hidden" name="ip" value="<?php echo $ip; ?>">
                  <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

                  <br><input type="submit" value="Submit"><br><br>
                </td>
              </tr>
            </table>
          </form>
          <br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>