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
  <title>Bernard Lonergan Archive - Registered Users</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
  <script language="JavaScript" type="text/JavaScript">
    <!--
    function pop(u) {
      var width=440;
      var height=440;
      var x = Math.round((screen.availWidth - width) / 2);
	    var y = Math.round((screen.availHeight - height) / 2);
      var load = window.open(u,'','scrollbars=yes,left='+x+',top='+y+',menubar=no,height='+height+',width='+width+',resizable=yes,toolbar=no,location=no,status=no,addressbar=no');
    }
    //-->
  </script>
</head>
<body>

<?php include("menu.php"); ?>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 900px; margin: 0 auto;">
    <div style="margin-left: 12px;">
      
      <div style="text-align: right; float: right; width: 300px;">
        <a href="useremails.php">Get list of emails of users who want updates</a><br>
        <a href="userexport.php">Export users to Excel</a>
      </div>
      
      <h3>Registered Users</h3>
      
      <div style="font-size: 80%;">
        
        <table celpadding="0" cellspacing="0" style="width: 100%;">
          <tr>
            <td>&nbsp;</td>
            <td valign="top"><strong>Name</strong></td>
            <td valign="top"><strong>Institute</strong></td>
            <td valign="top"><strong>City</strong></td>
            <td valign="top"><strong>State</strong></td>
            <td valign="top"><strong>Email</strong></td>
            <td valign="top" style="text-align: center;" nowrap><strong>Updates?</strong></td>
            <td valign="top" style="text-align: center;"><strong>Registration Date</strong></td>
            <td>&nbsp;</td>
          </tr>
        <?php
        $result = $mysqli->query("SELECT * FROM users ORDER BY lastname ASC");

        if($result) {
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr>
              <td style=\"width: 40px; padding: 9px 5px 9px 0;\" valign=\"top\" nowrap><a href=\"userdelete.php?id=" . $row['id'] . "\">delete</a><br><a href=\"useredit.php?id=" . $row['id'] . "\">edit</a></td>
              <td style=\"width: 125px; padding: 9px 5px 9px 0; overflow: hidden;\" valign=\"top\">" . $row['firstname'] . " " . $row['lastname'] . "</td>
              <td style=\"width: 125px; padding: 9px 5px 9px 0;\" valign=\"top\">" . $row['institute'] . "</td>
              <td style=\"width: 125px; padding: 9px 5px 9px 0;\" valign=\"top\" style=\"overflow: hidden;\">" . ((strlen($row['city']) >= 20) ? substr($row['city'], 0, 20) . "..." : $row['city']) . "</td>
              <td style=\"width: 125px; padding: 9px 5px 9px 0;\" valign=\"top\">" . ((strlen($row['state']) >= 20) ? substr($row['state'], 0, 20) . "..." : $row['state']) . "</td>
              <td style=\"width: 125px; padding: 9px 5px 9px 0;\" valign=\"top\">" . ((strlen($row['email']) >= 20) ? substr($row['email'], 0, 20) . "..." : $row['email']) . "</td>
              <td style=\"width: 55px; padding: 9px 0 9px; text-align: center;\" valign=\"top\">" . $row['getemail'] . "</td>
              <td style=\"width: 125px; padding: 9px 0 9px; text-align: center;\" valign=\"top\">" . $row['regdate'] . "</td>
              <td style=\"width: 55px; padding: 9px 0 9px; text-align: center;\" valign=\"top\"><a href=\"javascript:pop('userview.php?id=" . $row['id'] . "')\">See full details</a></td>
            </tr>\n";
          }
        }
        ?>
        </table>
      </div>
      
      <div style="clear: both;"></div>
      
      <br><br>
  
    </div>
  </div>
</div>

<br><br>

</body>
</html>