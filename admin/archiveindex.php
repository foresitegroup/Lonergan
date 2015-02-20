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
  <title>Bernard Lonergan Archive - Archive Administration</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
  <script language="JavaScript" type="text/JavaScript">
    <!--
    function pop(u) {
      var width=900;
      var height=500;
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
      <div style="text-align: center;">
        <a href="archiveexport.php">Export archive to Excel</a>
      </div>
      
      <form action="archiveadd.php" method="POST">
      <table style="width: 450px; float: left;">
        <tr>
          <td colspan="2"><h3>Add A New Archive Item</h3></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Call Number/SKU:</td>
          <td><input type="text" name="sku" size="50" /></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Archival Number:</td>
          <td><input type="text" name="archivalnum" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Title:</td>
          <td><input type="text" name="title" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Author:</td>
          <td><input type="text" name="author" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Language:</td>
          <td><input type="text" name="language1" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Language 2:</td>
          <td><input type="text" name="language2" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Decade:</td>
          <td><input type="text" name="decade" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">PDF:</td>
          <td><input type="text" name="pdf" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Audio:</td>
          <td><input type="text" name="audio" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Video:</td>
          <td><input type="text" name="video" size="50" /></td>
        </tr>
        <tr>
          <td valign="top">Description:</td>
          <td><textarea rows="10" cols="37" name="description"></textarea></td>
        </tr>
        <tr>
          <td valign="top">Transcription:</td>
          <td><textarea rows="15" cols="37" name="transcription"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Add" /></td>
        </tr>
      </table>
      </form>
      
      <h3>Available Archive Items</h3>
      
      <div style="font-size: 80%;">
        <table>
        <?php
        $query = "SELECT * FROM archive ORDER BY sku ASC";
        
        $result = mysql_query($query);

        if($result) {
          while($row = mysql_fetch_array($result)) {
            if (!empty($row['archivalnum'])) {
              $thenumber = $row['sku'] . " / " . $row['archivalnum'];
            } else {
              $thenumber = $row['sku'];
            }
            
            echo "<tr><td valign=\"top\" nowrap><a href=\"archivedelete.php?id=" . $row['id'] . "\">delete</a> | <a href=\"archiveedit.php?id=" . $row['id'] . "\">edit</a> ::</td><td><a href=\"javascript:pop('archiveview.php?id=" . $row['id'] . "')\">" . $thenumber . " - " . $row['title'] . "</a></td></tr>\n";
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