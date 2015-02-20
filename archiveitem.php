<?
include("login.php");
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

$PageTitle = "Archive Item " . $thenumber;
include("header.php");
?>
  
  <div style="clear: both; height: 15px;"></div>
    
  <div id="main-left-content" style="width: 866px;">
    <span style="font-family: Verdana, sans-serif; font-size: 20px; color: #830D0D;"><?php echo $thenumber ?></span><br>
    <br>
    
    <div style="margin-left: 12px;">
      
      <?php
      $downloads = "";
      if (!empty($row['pdf'])) {
        $downloads .= "<a href=\"pdf/" . $row['pdf'] . "\"><img src=\"images/pdf.gif\" alt=\"PDF\" border=\"0\"></a><br>";
      }
      if (!empty($row['audio'])) {
        $downloads .= "<a href=\"audio/" . $row['audio'] . "\"><img src=\"images/audio.gif\" alt=\"Audio\" border=\"0\"></a><br>";
      }
      if (!empty($row['video'])) {
        $downloads .= "
        <div id=\"video\">
          It appears you do not have Flash installed or your version of Flash is too old.  <a href=\"http://www.macromedia.com/shockwave/download/\">Please download it here.</a>
        </div>
        <script type=\"text/javascript\">
          var vid1 = new SWFObject(\"video/player.swf\",\"player\",\"450\",\"358\",\"6\");
          vid1.addParam(\"allowfullscreen\",\"true\");
          vid1.addParam(\"allowscriptaccess\",\"always\");
          vid1.addParam(\"flashvars\",\"file=" . $row['video'] . "&image=../images/vidpreview.jpg\");
          vid1.write(\"video\");
        </script>
        ";
      }
      
      echo "
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
      
      <br>
      <br>
    </div>
  </div> <!-- END main-left-content -->
  
<? include("footer.php"); ?>