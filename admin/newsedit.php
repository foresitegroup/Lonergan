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
  <title>Bernard Lonergan Archive - Edit News Item</title>
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
    <div style="margin-left: 12px;">
    
      <?php
      $result = $mysqli->query("SELECT * FROM news WHERE id = '".$_GET['id']."'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      ?>
  
      <form action="newsupdate.php" method="POST">
      <table style="width: 450px; float: left;">
        <tr>
          <td colspan="2"><h3>Edit <?php echo $row['id']; ?></h3></td>
        </tr>
        <tr>
          <td valign="top">Title:</td>
          <td><input type="text" name="title" size="50" value="<?php echo $row['title']; ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Text:</td>
          <td><textarea rows="15" cols="37" name="text"><?php echo $row['text']; ?></textarea></td>
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

<br><br>

</body>
</html>