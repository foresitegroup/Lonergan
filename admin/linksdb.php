<?php
include("../inc/dbconfig.php");

switch ($_GET['a']) {
  case "add":
    // Set sort number
    $result = mysql_query("SELECT sort FROM links ORDER BY sort+0 DESC LIMIT 1");
    $row = mysql_fetch_array($result);
    $sort = $row[0] + 1;
    
    mysql_query("INSERT INTO links (title,link,description,sort) VALUES('" . mysql_real_escape_string($_POST['title']) . "','" . mysql_real_escape_string($_POST['link']) . "','" . mysql_real_escape_string($_POST['description']) . "','$sort')");
    
    break;
  
  case "delete":
    mysql_query("DELETE FROM links WHERE id = '" . $_GET['id'] . "'");
    
    // Renumber the sort column to remove any gaps in sequence
    mysql_query("SET @new_sort = 0;");
    mysql_query("SET @sort_inc = 1;");
    mysql_query("UPDATE links SET sort = (@new_sort := @new_sort + @sort_inc) ORDER BY sort+0 ASC");
    
    break;
  
  case "edit":
    mysql_query("UPDATE links SET title = '" . mysql_real_escape_string($_POST['title']) . "', link = '" . mysql_real_escape_string($_POST['link']) . "', description = '" . mysql_real_escape_string($_POST['description']) . "' WHERE id = '" . $_POST['id'] . "'");
    
    break;
  
  case "sort":
    // Get page and sort number we are changing
    $result = mysql_query("SELECT * FROM links WHERE id = '" . $_GET['id'] . "'");
    $row = mysql_fetch_array($result);
    
    // Moving up or down?
    $sort = ($_GET['d'] == "u") ? $row['sort'] - 1 : $row['sort'] + 1;
    
    // Change sort number of neighboring record
    mysql_query("UPDATE links SET sort = '" . $row['sort'] . "' WHERE sort = '" . $sort . "'");
    
    // Change sort number of current record
    mysql_query("UPDATE links SET sort = '" . $sort . "' WHERE id = '" . $_GET['id'] . "'");
    
    break;
}

mysql_close();

header( "Location: linksindex.php" );
?>