<?php
session_start();
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
  <div style="float: left; width: 400px;">
    <h3>Upload A PDF</h3>
    <form action="archiveupload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" name="usubmit" value="Upload">
    </form><br>

    <?php
    echo $_SESSION['POST'];
    unset($_SESSION['POST']);
    ?>
    <br>

    <hr>
    <br>

    <h3>Add A New Archive Item</h3>
    <form action="archiveadd.php" method="POST">
      <table style="width: 100%;" cellspacing="0" cellpadding="4" border="0">
        <tr>
          <td colspan="2">
            Do not display publically
            <input type="checkbox" name="display" value="no" style="vertical-align: middle;">
          </td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Call Number/SKU:</td>
          <td><input type="text" name="sku" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Archival Number:</td>
          <td><input type="text" name="archivalnum" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Title:</td>
          <td><input type="text" name="title" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Author:</td>
          <td><input type="text" name="author" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Language:</td>
          <td><input type="text" name="language1" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Language 2:</td>
          <td><input type="text" name="language2" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Decade:</td>
          <td><input type="text" name="decade" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">PDF:</td>
          <td><input type="text" name="pdf" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Audio:</td>
          <td><input type="text" name="audio" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;">Video:</td>
          <td><input type="text" name="video" style="width: 100%;"></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;" valign="top">Description:</td>
          <td><textarea name="description" style="width: 100%; height: 10em;"></textarea></td>
        </tr>
        <tr>
          <td style="width: 115px; text-align: right;" valign="top">Transcription:</td>
          <td><textarea name="transcription" style="width: 100%; height: 10em;"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Add" /></td>
        </tr>
      </table>
    </form>
  </div>
  
  <div style="float: right; width: 450px;">
    <a href="archiveexport.php">Export archive to Excel</a><br>
    <br>

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
          
          echo "<tr><td valign=\"top\" nowrap><a href=\"archivedelete.php?id=" . $row['id'] . "\">delete</a> | <a href=\"archiveedit.php?id=" . $row['id'] . "\">edit</a> ::</td><td><a href=\"javascript:pop('archiveview.php?id=" . $row['id'] . "')\">" . $thenumber . " - " . $row['title'] . "</a>";

          if (!empty($row['display'])) echo "<br><em>[Not displayed publically]</em>";

          echo "</td></tr>\n";
        }
      }
      ?>
      </table>
    </div>
  </div>
  
  <div style="clear: both;"></div>
  
  <br><br>
</div>

<br><br>

</body>
</html>