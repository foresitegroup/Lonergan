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

<?php include("menu.php"); ?>

<div style="clear: both; height: 15px;"></div>
<div id="main-left-content" style="width: 900px; margin: 0 auto;">
  <?php
  $result = $mysqli->query("SELECT * FROM archive WHERE id = '".$_GET['id']."'");
  $row = $result->fetch_array(MYSQLI_ASSOC);
  ?>
  
  <h3>Edit <?php echo $row['sku'] ?></h3>

  <form action="archiveupdate.php" method="POST">
    <table style="width: 450px;">
      <tr>
        <td colspan="2">
          Do not display publically
          <input type="checkbox" name="display" value="no" style="vertical-align: middle;"<?php if($row['display'] != "") echo " checked"; ?>>
        </td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Call Number/SKU:</td>
        <td><input type="text" name="sku" value="<?php echo $row['sku'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Archival Number:</td>
        <td><input type="text" name="archivalnum" value="<?php echo $row['archivalnum'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Title:</td>
        <td><input type="text" name="title" value="<?php echo $row['title'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Author:</td>
        <td><input type="text" name="author" value="<?php echo $row['author'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Language:</td>
        <td><input type="text" name="language1" value="<?php echo $row['language1'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Language 2:</td>
        <td><input type="text" name="language2" value="<?php echo $row['language2'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Decade:</td>
        <td><input type="text" name="decade" value="<?php echo $row['decade'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">PDF:</td>
        <td><input type="text" name="pdf" value="<?php echo $row['pdf'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Audio:</td>
        <td><input type="text" name="audio" value="<?php echo $row['audio'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;">Video:</td>
        <td><input type="text" name="video" value="<?php echo $row['video'] ?>" style="width: 100%;"></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;" valign="top">Description:</td>
        <td><textarea name="description" style="width: 100%; height: 10em;"><?php echo $row['description'] ?></textarea></td>
      </tr>
      <tr>
        <td style="width: 115px; text-align: right;" valign="top">Transcription:</td>
        <td><textarea name="transcription" style="width: 100%; height: 10em;"><?php echo $row['transcription'] ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="submit" value="Update" /></td>
      </tr>
    </table>
  </form>

  <br><br>
</div>

<br><br>

</body>
</html>