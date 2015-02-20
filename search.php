<?
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
      $query = "SELECT * FROM archive WHERE description LIKE '%$search%' OR transcription LIKE '%$search%' OR title LIKE '%$search%' OR sku LIKE '%$search%' ORDER BY sku";
      $result = mysql_query($query);
      $numrows = mysql_num_rows($result);
      
      if ($numrows == 0) {
        echo "Sorry, your search did not return any results.";
      } else {
        while ($row = mysql_fetch_array($result)) {
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
  
<? include("footer.php"); ?>