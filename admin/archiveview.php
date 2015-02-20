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
  <title>Bernard Lonergan Archive Viewer</title>
  <link rel="stylesheet" href="../inc/lonergan2008.css" type="text/css" media="screen">
  <script type="text/javascript" src="../inc/swfobject.js"></script>
</head>
<body>

<div style="clear: both; height: 15px;"></div>
  <div id="main-left-content" style="width: 800px; margin: 0 auto;">
    <div style="margin-left: 12px;">
  
      <?php
      $id = $_GET['id'];
      
      $query = "SELECT * FROM archive WHERE id = '$id'";
      
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      
      if (!empty($row['archivalnum'])) {
        $thenumber = $row['sku'] . " / " . $row['archivalnum'];
      } else {
        $thenumber = $row['sku'];
      }
      
      $downloads = "";
      if (!empty($row['pdf'])) {
        $downloads .= "<a href=\"../pdf/" . $row['pdf'] . "\"><img src=\"../images/pdf.gif\" alt=\"PDF\" border=\"0\"></a><br>";
      }
      if (!empty($row['audio'])) {
        $downloads .= "<a href=\"../audio/" . $row['audio'] . "\"><img src=\"../images/audio.gif\" alt=\"Audio\" border=\"0\"></a><br>";
      }
      if (!empty($row['video'])) {
        $downloads .= "
        <div id=\"video\">
          It appears you do not have Flash installed or your version of Flash is too old.  <a href=\"http://www.macromedia.com/shockwave/download/\">Please download it here.</a>
        </div>
        <script type=\"text/javascript\">
          var vid1 = new SWFObject(\"../video/player.swf\",\"player\",\"450\",\"358\",\"6\");
          vid1.addParam(\"allowfullscreen\",\"true\");
          vid1.addParam(\"allowscriptaccess\",\"always\");
          vid1.addParam(\"flashvars\",\"file=" . $row['video'] . "&image=../images/vidpreview.jpg\");
          vid1.write(\"video\");
        </script>
        ";
      }
      
      echo "
      <span style=\"font-family: Verdana, sans-serif; font-size: 20px; color: #830D0D;\">" . $thenumber . "</span><br>
      <br>
      <div style=\"float: right; padding-left: 10px;\">$downloads</div>
      <strong><em>" . $row['title'] . "</em></strong><br>
      by " . $row['author'] . "<br>
      Language(s): " . $row['language1'] . " " . $row['language2'] . "<br>
      Decade: " . $row['decade'] . "<br><br>
      " . $row['description'] . "<br><br>
      ";
      
      if (!empty($row['transcription'])) {
        echo "<span style=\"color: #830D0D; font-weight: bold;\">Transcription</span><br>\n" . $row['transcription'] . "<br><br>\n";
      }
      
      echo "<div style=\"clear: both;\"></div>\n";
      ?>

    </div>
  </div>
</div>

<br>

</body>
</html>