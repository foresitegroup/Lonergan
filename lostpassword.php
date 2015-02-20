<?
$PageTitle = "Retrieve Password";
include("header.php");
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/RetrievePassword.jpg" alt="Retrieve Password"><br>
        <br>
        
        <div style="margin-left: 12px;">
          Please enter the e-mail address you signed up with and use to access the site.  Your password will be sent to that address.<br>
          <br>
          
          <form method="post" action="lostpasswordsend.php">
            <table>
              <tr>
                <td id="left">E-mail:</td>
                <td><input type="text" name="email" size="30" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><br><input type="submit" value="Submit"><br><br></td>
              </tr>
            </table>
          </form>
          <br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>