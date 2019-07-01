<?php
include("login.php");
include("inc/dbconfig.php");

$var = $_POST['search'];
$search = trim($var);

$PageTitle = "Search Results for " . $search;
include("header.php");
?>
  
  <div style="clear: both; height: 15px;"></div>
    
  <div id="main-left-content" style="width: 866px;">
    <span style="font-family: Verdana, sans-serif; font-size: 20px; color: #830D0D;"><?php echo "Search Results for $search"; ?></span><br>
    <br>
    
    <div style="margin-left: 12px;">
      
      <?php
      $result = $mysqli->query("SELECT * FROM archive WHERE description LIKE '%$search%' OR transcription LIKE '%$search%' OR title LIKE '%$search%' OR sku LIKE '%$search%' ORDER BY sku");
      $numrows = $result->num_rows;
      
      if ($numrows == 0) {
        echo "Sorry, your search did not return any results.";
      } else {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          if (!empty($row['archivalnum'])) {
            $thenumber = $row['sku'] . " / " . $row['archivalnum'];
          } else {
            $thenumber = $row['sku'];
          }
          echo "<a href=\"archiveitem.php?id=" . $row['id'] . "\">" . $thenumber . " - " . $row['title'] . "</a><br>";
        }
      }
      ?>
      
      <br><br>
      <form name="frmFilter" method="post" action="search.php" style="text-align: center;">
        <input type="input" name="search" size="40" /> <input type="submit" name="Submit" value="Search Again" />
      </form>
      
      <br>
      <br>
    </div>
  </div> <!-- END main-left-content -->
  
<?php include("footer.php"); ?>