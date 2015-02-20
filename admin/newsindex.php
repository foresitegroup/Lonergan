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
  <title>Bernard Lonergan Archive - News Administration</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
  <script language="JavaScript" type="text/JavaScript">
    <!--
    function pop(u) {
      var width=600;
      var height=440;
      var x = Math.round((screen.availWidth - width) / 2);
	    var y = Math.round((screen.availHeight - height) / 2);
      var load = window.open(u,'','scrollbars=yes,left='+x+',top='+y+',menubar=no,height='+height+',width='+width+',resizable=yes,toolbar=no,location=no,status=no,addressbar=no');
    }
    //-->
  </script>
  <script language="javascript" type="text/javascript" src="../inc/tiny_mce/tiny_mce.js"></script>
  <script language="javascript" type="text/javascript">
  tinyMCE.init({
  	mode : "textareas",
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,bullist,numlist,separator,code",
  	theme_advanced_buttons2 : "",
  	theme_advanced_buttons3 : "",
  	theme_advanced_toolbar_location : "top",
  	theme_advanced_toolbar_align : "left",
    forced_root_block : false,
    force_br_newlines : true,
    force_p_newlines : false
  });
  </script>
</head>
<body>

<? include("menu.php"); ?>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 900px; margin: 0 auto;">
    <div style="margin-left: 12px;">
  
      <form action="newsadd.php" method="POST">
      <table style="width: 450px; float: left;">
        <tr>
          <td colspan="2"><h3>Add A New News Item</h3></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Title:</td>
          <td><input type="text" name="title" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Text:</td>
          <td><textarea rows="15" cols="37" name="text"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Add" /></td>
        </tr>
      </table>
      </form>
      
      <h3>Available News Items</h3>
      
      <div style="font-size: 80%;">
        <table>
        <?php
        $query = "SELECT * FROM news ORDER BY id DESC";
        
        $result = mysql_query($query);

        if($result) {
          while($row = mysql_fetch_array($result)) {
            echo "<tr><td valign=\"top\" nowrap><a href=\"newsdelete.php?id=" . $row['id'] . "\">delete</a> | <a href=\"newsedit.php?id=" . $row['id'] . "\">edit</a> ::</td><td><a href=\"javascript:pop('newsview.php?id=" . $row['id'] . "')\">" . $row['title'] . "</a></td></tr>\n";
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