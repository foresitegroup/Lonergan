<?
//include("login.php");
include("inc/dbconfig.php");

$id = $_GET['id'];
$query = "SELECT * FROM archive WHERE id = '$id'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if (!empty($row['archivalnum'])) {
  $thenumber = $row['sku'] . " / " . $row['archivalnum'];
} else {
  $thenumber = $row['sku'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <META http-equiv="Content-Type" content="text/html;charset=utf-8" >
  <META http-equiv="pragma" content="no-cache">
  <META name="language" content="en">
  <META name="author" content="Remedi Creative">
  <title>Bernard Lonergan Video <?php echo $thenumber; ?></title>
  <link rel="stylesheet" href="inc/lonergan2008.css" type="text/css" media="screen">
  <script type="text/javascript" src="inc/swfobject.js"></script>
</head>
<body>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 500px; margin: 0 auto;">
    
    <div style="margin-left: 25px;">
      
      <strong><em><?php echo $row['title']; ?></em></strong><br>
      <div id="video">
        It appears you do not have Flash installed or your version of Flash is too old.  <a href="http://www.macromedia.com/shockwave/download/">Please download it here.</a>
      </div>
      <script type="text/javascript">
        var vid1 = new SWFObject("video/player.swf","player","450","358","6");
        vid1.addParam("allowfullscreen","true");
        vid1.addParam("allowscriptaccess","always");
        vid1.addParam("flashvars","file=<?php echo $row['video']; ?>&image=../images/vidpreview.jpg");
        vid1.write("video");
      </script>

    </div>
    
    <br>
    
  </div>
</div>

<br>

</body>
</html>