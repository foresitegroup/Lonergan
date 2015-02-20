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
  <title>Bernard Lonergan Archive - Edit Item</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
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
    
      <?php
        $id = $_GET['id'];
        
        $query = "SELECT * FROM archive WHERE id = '$id'";
        
        $result = mysql_query($query);
        $row = mysql_fetch_array($result)
      ?>
  
      <form action="archiveupdate.php" method="POST">
      <table style="width: 450px; float: left;">
        <tr>
          <td colspan="2"><h3>Edit <?php echo $row['sku'] ?></h3></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Call Number/SKU:</td>
          <td><input type="text" name="sku" size="50" value="<?php echo $row['sku'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top" nowrap>Archival Number:</td>
          <td><input type="text" name="archivalnum" size="50" value="<?php echo $row['archivalnum'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Title:</td>
          <td><input type="text" name="title" size="50" value="<?php echo $row['title'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Author:</td>
          <td><input type="text" name="author" size="50" value="<?php echo $row['author'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Language:</td>
          <td><input type="text" name="language1" size="50" value="<?php echo $row['language1'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Language 2:</td>
          <td><input type="text" name="language2" size="50" value="<?php echo $row['language2'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Decade:</td>
          <td><input type="text" name="decade" size="50" value="<?php echo $row['decade'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">PDF:</td>
          <td><input type="text" name="pdf" size="50" value="<?php echo $row['pdf'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Audio:</td>
          <td><input type="text" name="audio" size="50" value="<?php echo $row['audio'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Video:</td>
          <td><input type="text" name="video" size="50" value="<?php echo $row['video'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Description:</td>
          <td><textarea rows="10" cols="37" name="description"><?php echo $row['description'] ?></textarea></td>
        </tr>
        <tr>
          <td valign="top">Transcription:</td>
          <td><textarea rows="15" cols="37" name="transcription"><?php echo $row['transcription'] ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="hidden" name="id" value="<?php echo $id ?>" /><input type="submit" value="Update" /></td>
        </tr>
      </table>
      </form>
      
      <div style="clear: both;"></div>
  
    </div>
  </div>
</div>

<br><br>

</body>
</html>