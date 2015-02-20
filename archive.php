<?
include("login.php");
$PageTitle = "Archive";
include("header.php");
include("inc/dbconfig.php");
?>
  
  <style>
    td {
      padding: 1px 3px;
    }
    tr.highlight { 
    	background-color: #FACE80;
    	cursor: pointer;
      text-decoration: none;
    }
    #archive A:link, #archive A:visited, #archive A:hover, #archive A:active {
      color: #000000;
      font-weight: normal;
      text-decoration: none;
    }
  </style>
  <script type="text/javascript">
    window.onload = function(){
  	  ConvertRowsToLinks("archive");
    }
    
    function ConvertRowsToLinks(xTableId){
    	var rows = document.getElementById(xTableId).getElementsByTagName("tr");

    	for(i=0;i<rows.length;i++){
    	  var link = rows[i].getElementsByTagName("a")
    	  if(link.length == 1){
      		rows[i].onclick = new Function("document.location.href='" + link[0].href + "'");
      		rows[i].onmouseover = new Function("this.className='highlight'");
      		rows[i].onmouseout = new Function("this.className=''");
    	  }
    	}
    }
  </script>
  
  <div style="clear: both; height: 15px;"></div>
    
  <div id="main-left-content" style="width: 866px;">
    <img src="images/Archive.jpg"><br>
    <br>
    
    <div style="margin-left: 12px;">
    
      <?php
      $iswhere = "no";
      $wherestatement = "";
      if ($_POST["author"]=="") {
        $selauthor = "Filter Author";
      } else {
        $selauthor = $_POST["author"];
        $iswhere = "yes";
        $wherestatement .= "author = '$selauthor'";
      }
      if ($_POST["language"]=="") {
        $sellanguage = "Filter Language";
      } else {
        $sellanguage = $_POST["language"];
        $iswhere = "yes";
        if ($wherestatement !== "") {
          $wherestatement .= " AND ";
        }
        $wherestatement .= "(language1 = '$sellanguage' OR language2 = '$sellanguage')";
      }
      if ($_POST["decade"]=="") {
        $seldecade = "Filter Decade";
      } else {
        $seldecade = $_POST["decade"];
        $iswhere = "yes";
        if ($wherestatement !== "") {
          $wherestatement .= " AND ";
        }
        $wherestatement .= "decade = '$seldecade'";
      }
      if ($_POST["type"]=="") {
        $seltype = "Filter Type";
      } else {
        $seltype = $_POST["type"];
        $iswhere = "yes";
        if ($wherestatement !== "") {
          $wherestatement .= " AND ";
        }
        $wherestatement .= "$seltype != ''";
      }
      
      if ($iswhere == "yes") {
        $where = "WHERE $wherestatement";
      } else {
        $where = "";
      }
      ?>
      
      <form name="frmSearch" method="post" action="search.php" style="float: left;">
        <input type="input" name="search" /> <input type="submit" name="Submit" value="Search" />
      </form>
      
      <form name="frmFilter" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align: right;">
        <select name="author" onchange="document.frmFilter.submit()">
        <option value="">Filter Author</option>
        <?php
        $authorquery = "SELECT DISTINCT author FROM archive ORDER BY author ASC";
        
        $authorresult = mysql_query($authorquery);
          
        while($row = mysql_fetch_array($authorresult)) {
          if ($row[0]!=="") {
            echo "<option value=\"$row[0]\"";
            if ($row[0]==$selauthor) {
              echo " selected";
            }
            echo ">$row[0]</option>\n";
          }
        }
        ?>
        </select>
        
        <select name="language" onchange="document.frmFilter.submit()">
        <option value="">Filter Language</option>
        <?php
        $languagequery = "SELECT DISTINCT language1 FROM archive ORDER BY language1 ASC";
        
        $languageresult = mysql_query($languagequery);
          
        while($row = mysql_fetch_array($languageresult)) {
          if ($row[0]!=="") {
            echo "<option value=\"$row[0]\"";
            if ($row[0]==$sellanguage) {
              echo " selected";
            }
            echo ">$row[0]</option>\n";
          }
        }
        ?>
        </select>
        
        <select name="decade" onchange="document.frmFilter.submit()">
        <option value="">Filter Decade</option>
        <?php
        $decadequery = "SELECT DISTINCT decade FROM archive ORDER BY decade ASC";
        
        $decaderesult = mysql_query($decadequery);
          
        while($row = mysql_fetch_array($decaderesult)) {
          if ($row[0]!=="") {
            echo "<option value=\"$row[0]\"";
            if ($row[0]==$seldecade) {
              echo " selected";
            }
            echo ">$row[0]</option>\n";
          }
        }
        ?>
        </select>
        
        <select name="type" onchange="document.frmFilter.submit()">
        <option value="">Filter Type</option>
        <option value="pdf" <?php if ($seltype=="pdf") { echo "selected"; } ?>>PDF</option>
        <option value="audio" <?php if ($seltype=="audio") { echo "selected"; } ?>>Audio</option>
        <option value="video" <?php if ($seltype=="video") { echo "selected"; } ?>>Video</option>
        </select>
      </form>
      <br>
      
      <div style="font-size: 80%;">
        <table width="100%" border="0" cellspacing="0" id="archive">
          <tr style="background: #CCCCCC; font-weight: bold;">
            <td nowrap>SKU / Archive #</td>
            <td>Title</td>
            <td>Author</td>
            <td>Language(s)</td>
            <td>Decade</td>
            <td>Type</td>
          </tr>
        
        <?php
        // how many rows to show per page
        $rowsPerPage = 30;

        // by default we show first page
        $pageNum = 1;

        // if $_GET['page'] defined, use it as page number
        if(isset($_GET['page'])) {
          $pageNum = $_GET['page'];
        }

        // counting the offset
        $offset = ($pageNum - 1) * $rowsPerPage;
        
        // If filtering show all results else break it up in multiple pages
        if ($iswhere == "no") {
          $query = "SELECT * FROM archive ORDER BY sku ASC LIMIT $offset, $rowsPerPage";
        } else {
          $query = "SELECT * FROM archive $where ORDER BY sku ASC";
        }
        //$query = "SELECT * FROM archive $where ORDER BY sku ASC";
        
        $result = mysql_query($query);
        
        if($result) {
          while($row = mysql_fetch_array($result)) {
            if (!empty($row['archivalnum'])) {
              $thenumber = $row['sku'] . " / " . $row['archivalnum'];
            } else {
              $thenumber = $row['sku'];
            }
            
            $titlelen = $row['title'];
            if (strlen($titlelen) > 50) {
              $title = substr($titlelen, 0, 50) . "...";
            } else {
              $title = $titlelen;
            }
            
            $downloads = "";
            if (!empty($row['pdf'])) {
              $downloads .= "<img src=\"images/pdf.gif\" alt=\"PDF\" height=\"15\">";
            }
            if (!empty($row['audio'])) {
              $downloads .= "<img src=\"images/audio.gif\" alt=\"Audio\" height=\"15\">";
            }
            if (!empty($row['video'])) {
              $downloads .= "<img src=\"images/video.gif\" alt=\"Video\" height=\"15\">";
            }
            
            echo "<tr>
              <td nowrap><a href=\"archiveitem.php?id=" . $row['id'] . "\">" . $thenumber . "</a></td>
              <td>$title</td>
              <td nowrap>" . $row['author'] . "</td>
              <td nowrap>" . $row['language1'] . " " . $row['language2'] . "</td>
              <td nowrap>" . $row['decade'] . "</td>
              <td nowrap align=\"center\">$downloads</td>
            </tr>\n";
          }
        }
        ?>
        </table>
      
        <?php
        if ($iswhere == "no") {
          
          // how many rows we have in database
          $result = mysql_query("SELECT * FROM archive");
          $numrows = mysql_num_rows($result);

          // how many pages we have when using paging?
          $maxPage = ceil($numrows/$rowsPerPage);

          // print the link to access each page
          $self = $_SERVER['PHP_SELF'];
          $nav  = '';

          for($page = 1; $page <= $maxPage; $page++) {
            if ($page == $pageNum) {
              $nav .= " $page "; // no need to create a link to current page
            } else {
              $nav .= " <a href=\"$self?page=$page\">$page</a> ";
            }
          }
          
          if ($pageNum > 1) {
            $page  = $pageNum - 1;
            $prev  = " <a href=\"$self?page=$page\">[Prev]</a> ";
            $first = " <a href=\"$self?page=1\">[First Page]</a> ";
          } else {
            $prev  = ""; // we're on page one, don't print previous link
            $first = ""; // nor the first page link
          }

          if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = " <a href=\"$self?page=$page\">[Next]</a> ";
            $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
          } else {
            $next = ""; // we're on the last page, don't print next link
            $last = ""; // nor the last page link
          }

          // print the navigation link
          echo "<br><div style=\"text-align: center;\">" . $first . $prev . $nav . $next . $last . "</div>";
        
        }
        ?>
      
      </div>
      
      <br>
      <br>
    </div>
  </div> <!-- END main-left-content -->
  
<? include("footer.php"); ?>