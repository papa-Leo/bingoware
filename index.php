<?php include_once "include/functions.php";
      include_once "header.php";
?>

<table width="100%" border="0" cellpadding="5">
  <tr>
    <td width="15%" valign="top">
			<p><img border="0" src="images/mh.gif" width="120" height="60"></p>
			<a href="/bingoware/index.php?action=play"><img src="images/b2d.gif"></a><br>
			<a href="/bingoware/index.php?action=generate"><img src="images/b1d.gif"></a><br>
			<a href="/bingoware/index.php?action=view"><img src="images/b3d.gif"></a><br>
			<p style="padding:0px; margin-top:2px; margin-bottom:6px;"><a href="/bingoware/print.php">Print Cards</a></p>
			<a href="/bingoware/index.php?action=config"><img src="images/b4d.gif"></a>
    </td>
    <td width="85%" valign="top">
    <?php
 	if (isset($_GET["action"])) {
	    	if (($_GET["action"]=="generate") || ($_GET["action"]=="regenerate")) {
	    		if (set_exists() && $_GET["action"]=="generate" && !isset($_POST["submit"])) 
	    			echo '<img src="images/gc.gif"><br><br>(Set ID: '.$setid.')<br><br><font size="4">You already have a set of '.card_number().' cards,<br> would you like to <a href="index.php?action=regenerate">create a new set</a>?</font>';
	    		else include_once ("generate.php");
	    	} else if ($_GET["action"]=="view") {
	    		if (set_exists()) 
	    			include_once ("choose.php");
	    		 else echo '<img src="images/vc.gif"><br><br><font size="4">You do not have a set of cards</font><br><br>(Set ID: '.$setid.')';
	    	} else if ($_GET["action"]=="play") {
	    		if (set_exists()) include_once ("play.php");
	    		else echo '<img src="images/pb.gif"><br><br><font size="4">You do not have a set of cards</font><br><br>(Set ID: '.$setid.')';
	    	} else if ($_GET["action"]=="config") {
	    		include_once ("configure.php");
		}
   	
   	} else if (set_exists()) echo '<img src="images/gc.gif"><br><br><font size="4">You have '.card_number().' cards in your set</font><br><br>(Set ID: '.$setid.')';
    	else include_once("generate.php");
    		
    ?>
    </td>
  </tr>
</table>
<?php include_once ("footer.php"); ?>
