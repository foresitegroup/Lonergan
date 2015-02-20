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
  <title>Bernard Lonergan Archive - Links Administration</title>
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
  
      <form action="linksdb.php?a=add" method="POST">
      <table style="width: 450px; float: left;">
        <tr>
          <td colspan="2"><h3>Add A New Link</h3></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Title:</td>
          <td><input type="text" name="title" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Link:</td>
          <td><input type="text" name="link" size="50" /></td>
        </tr>
        <tr>
          <td colspan="2">
            Description<br>
            <textarea name="description" rows="6" cols="6" style="width: 360px; height: 100px;"></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Add" /></td>
        </tr>
      </table>
      </form>
      
      <h3>Available Links</h3>
      
      <div style="font-size: 80%;">
        <table>
        <?php
        $result = mysql_query("SELECT * FROM links ORDER BY sort+0 ASC");
				
        if($result) {
					$rownum = 1;
					
          while($row = mysql_fetch_array($result)) {
            echo "
						<tr>
						  <td valign=\"top\" nowrap>
							  <a href=\"linksdb.php?a=delete&id=" . $row['id'] . "\">delete</a> | <a href=\"linksedit.php?id=" . $row['id'] . "\">edit</a> &nbsp;";
								
								echo ($rownum != "1") ? "<a href=\"linksdb.php?id=" . $row['id'] . "&s=" . $row['sort'] . "&a=sort&d=u\"><img src=\"images/move-u.png\" alt=\"^\" title=\"Move up\" style=\"height: 8px;\"></a>" : "<img src=\"images/blank.gif\" alt=\"\" style=\"width: 10px; height: 8px;\">";
								echo "&nbsp;";
                echo ($rownum != mysql_num_rows($result)) ? "<a href=\"linksdb.php?id=" . $row['id'] . "&s=" . $row['sort'] . "&a=sort&d=d\"><img src=\"images/move-d.png\" alt=\"v\" title=\"Move down\" style=\"height: 8px;\"></a>" : "<img src=\"images/blank.gif\" alt=\"\" style=\"width: 10px; height: 8px;\">";
								
								echo "&nbsp; ::
							</td>
							<td style=\"padding-bottom: 10px;\">
							  <a href=\"" . $row['link'] . "\">" . $row['title'] . "</a>
                ";
                
                if ($row['description'] != "") echo "<br><div style=\"font-size: 80%;\">" . $row['description'] . "</div>\n";
                
                echo "
							</td>
						</tr>
						";
						
						$rownum++;
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