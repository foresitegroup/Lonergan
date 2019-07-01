<?php
include("../inc/dbconfig.php");

switch ($_GET['a']) {
  case "add":
    // Set sort number
    $result = $mysqli->query("SELECT sort FROM links ORDER BY sort+0 DESC LIMIT 1");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $sort = $row[0] + 1;
    
    $mysqli->query("INSERT INTO links (title,link,description,sort) VALUES('" . $mysqli->real_escape_string($_POST['title']) . "','" . $mysqli->real_escape_string($_POST['link']) . "','" . $mysqli->real_escape_string($_POST['description']) . "','$sort')");
    
    break;
  
  case "delete":
    $mysqli->query("DELETE FROM links WHERE id = '" . $_GET['id'] . "'");
    
    // Renumber the sort column to remove any gaps in sequence
    $mysqli->query("SET @new_sort = 0;");
    $mysqli->query("SET @sort_inc = 1;");
    $mysqli->query("UPDATE links SET sort = (@new_sort := @new_sort + @sort_inc) ORDER BY sort+0 ASC");
    
    break;
  
  case "edit":
    $mysqli->query("UPDATE links SET title = '" . $mysqli->real_escape_string($_POST['title']) . "', link = '" . $mysqli->real_escape_string($_POST['link']) . "', description = '" . $mysqli->real_escape_string($_POST['description']) . "' WHERE id = '" . $_POST['id'] . "'");
    
    break;
  
  case "sort":
    // Get page and sort number we are changing
    $result = $mysqli->query("SELECT * FROM links WHERE id = '" . $_GET['id'] . "'");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    // Moving up or down?
    $sort = ($_GET['d'] == "u") ? $row['sort'] - 1 : $row['sort'] + 1;
    
    // Change sort number of neighboring record
    $mysqli->query("UPDATE links SET sort = '" . $row['sort'] . "' WHERE sort = '" . $sort . "'");
    
    // Change sort number of current record
    $mysqli->query("UPDATE links SET sort = '" . $sort . "' WHERE id = '" . $_GET['id'] . "'");
    
    break;
}

mysqli_close();

header("Location: linksindex.php");
?>