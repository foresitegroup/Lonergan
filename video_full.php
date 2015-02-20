<?
// include("login.php");
// include("inc/dbconfig.php");

// $id = $_GET['id'];
// $query = "SELECT * FROM archive WHERE id = '$id'";
// $result = mysql_query($query);
// $row = mysql_fetch_array($result);

// if (!empty($row['archivalnum'])) {
  // $thenumber = $row['sku'] . " / " . $row['archivalnum'];
// } else {
  // $thenumber = $row['sku'];
// }

// $PageTitle = "Archive Item " . $thenumber;
include("header.php");
?>
  
  <div style="clear: both; height: 15px;"></div>
    
  <div id="main-left-content" style="width: 866px;">
    <span style="font-family: Verdana, sans-serif; font-size: 20px; color: #830D0D;"><?php echo $thenumber ?></span><br>
    <br>
    
    <div style="margin-left: 12px;">
      
      <div id="video">
        It appears you do not have Flash installed or your version of Flash is too old.  <a href="http://www.macromedia.com/shockwave/download/">Please download it here.</a>
      </div>
      <script type="text/javascript">
        var vid1 = new SWFObject("video/player.swf","player","450","358","6");
        vid1.addParam("allowfullscreen","true");
        vid1.addParam("allowscriptaccess","always");
        vid1.addParam("flashvars","file=T4.flv");
        vid1.write("video");
      </script>
      
      <br>
      <br>
    </div>
  </div> <!-- END main-left-content -->
  
<? include("footer.php"); ?>