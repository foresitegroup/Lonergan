<?php
$PageTitle = "Links";
include("header.php");
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/Links.jpg" alt="Bernard Lonergan Links"><br>
        <br>
        
        <div style="margin-left: 12px;">
          The following links are to other reliable Bernard Lonergan resources, and are not affiliated with the Bernard Lonergan Archive.<br>
          <br>
          
          <?php
          include_once("inc/dbconfig.php");
          
          $result = $mysqli->query("SELECT * FROM links ORDER BY sort+0 ASC");
          
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<a href=\"" . $row['link'] . "\">" . $row['title'] . "</a><br>\n";
            
            if ($row['description'] != "") echo $row['description'] . "<br>\n";
            
            echo "<br>\n";
          }
          ?>
          
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <?php include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<?php include("footer.php"); ?>