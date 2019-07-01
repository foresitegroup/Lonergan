<?php
$PageTitle = "News & Events";
include("header.php");
include("inc/dbconfig.php");
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/News.jpg" alt="News & Events"><br>
        <br>
        
        <div style="margin-left: 12px;">
          <?php
          $result = $mysqli->query("SELECT * FROM news ORDER BY id DESC");
          
          if($result) {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              echo "<strong>" . $row['title'] . "</strong><br>\n" . $row['text'] . "<br><br>\n";
            }
          }
          ?>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <?php include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<?php include("footer.php"); ?>