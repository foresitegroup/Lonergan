<?
$PageTitle = "Contact Us";
include("header.php");
?>
  
  <div style="clear: both;"></div>
  
  <div id="twocol-wrap">
  
    <div id="main-left">
      <div id="main-left-content">
        <img src="images/Contact.jpg" alt="Contact Us"><br>
        <br>
        
        <div style="margin-left: 12px;">
          To contact the Bernard Lonergan Archive please use the contact form provided below. The information you send us will not be shared with any third party.<br>
          <br>
          <form method="post" action="contactsend.php">
            Your Comments<br>
            <textarea name="comments" cols="53" rows="6"></textarea><br>
            Email Address <input type="text" name="email" size="56"><br>
            <br>
            <div style="text-align: center;"><input type="Submit" value=" Submit "></div>
          </form>
          
          <br><hr><br>
          
          If you wish to contribute to the Marquette Lonergan Project Endowment, make check payable to Marquette University and send it to the following address:<br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Robert M. Doran, S.J.<br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Theology Department<br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Coughlin Hall 100<br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Marquette University<br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Milwaukee, WI 53201-1881 USA<br>
          
          <br>
          <a href="privacy.php"><strong>Internet Privacy Policy</strong></a><br>
          <br>
        </div>
      </div> <!-- END main-left-content -->
    </div> <!-- END main-left -->
    
    <? include("sidebar.php"); ?>
    
  </div> <!-- END twocol-wrap -->
  
<? include("footer.php"); ?>