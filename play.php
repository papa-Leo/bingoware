	   <?php 
		if (!set_exists()) exit;
		else $numbercards = card_number();
		
		session_start();
		$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';
		global $setid;

		//The number in play is used if not all cards are distributed
		//If no number is registered, or if the number exceeds the maximum,
		//it is reverted to the maximum, meaning all cards generated for that set are
		//in play.
		$numberinplay = $numbercards; 
		
		if (isset($_POST["numberinplay"]) && $_POST["numberinplay"]<=$numbercards) $numberinplay = $_POST["numberinplay"];
		
		//debug
		//echo $numbercards."<br>";
		//echo $numberinplay."<br>";
		
	   ?>
	   <form name="random" method="post" action="index.php?action=play&numberinplay=<?php echo $numberinplay;?>" onSubmit="return validate_number(<?php echo $maxColumnNumber; ?>)">
	   
	   <table width="98%" border="0">
	   	<tr>
	   		<td style="vertical-align:top; font-family: Segoe UI;">
	   	
	   	<table border="0" width="480px" cellpadding="4">
		   	<tr>
		   	<td width="90%" style="text-align:center; vertical-align:middle; background-position:center; background-repeat:no-repeat; background-size:300px 300px;" <?php echo ($drawmode=="automatic")?'background="images/drawball-orange.png"':''; ?>>
			   	<?php 
			   		echo '<input type="hidden" name="letters" value="'.$bingoletters[0].$bingoletters[1].$bingoletters[2].$bingoletters[3].$bingoletters[4].'">';	
			   		if (isset($_POST["gimme"]) && $drawmode=="automatic"){
			   			$currentBall = random_number($numberinplay);
			   			echo '<br><br><br><br><br><font color="#000000"><b style="font-size: 64px;">&#160;&#160;'.$currentBall.'</b></font><br>';
			   		}else if ($drawmode=="automatic"){
			   			echo '<br><br><br><br><br><font color="#000000"><b style="font-size: 64px;">&#160;&#160;???</b></font>';
			   		}

			   		if (isset($_POST["gimme"]) && $drawmode=="manual") submit_number($_POST["enterednumber"],$numberinplay);
			   		
			   		if (isset($_GET["restart"])){
			   			restart();
			   			$_SESSION['previousBall'] = '';
			   		}

			   		$draws=load_draws();
			   		
			   		if ($drawmode=="manual" && (count($draws)<$maxNumber)) {
			   			echo '<body onLoad="document.random.enterednumber.focus()">Enter a number:<br><br><input tabindex="0" type="text" name="enterednumber" size="5" maxlength="3">&nbsp;&nbsp;&nbsp;&nbsp;(eg. '.$bingoletters[0].'4)<br></body>';
			   		} else {
			   			echo '<input type=hidden name=enterednumber value="'.$bingoletters[0].'1">'; //in automatic mode, use a hidden field with same name to avoid error msgs
			   		}
			   		 ?>
			   	<br><br><br><br><br><br><br><br><br>
		   	</td>
			</tr>
			<tr>
		   	<td style="width:200px; text-align:center; vertical-align:bottom;">
		   		<img id="pattern" width="200px">
		   		<p style="font-size: 16px;">Previous Number:</p>
		   		<div style="font-weight:bold; font-size:28px; color:#FFFF00; padding-top:10px; padding-bottom:14px;"><?php echo $_SESSION['previousBall'] ?></div>
		   	</td>
		   	</tr>
	   	</table>
	   	
	   	</td>
	   	<td rowspan=2 width="0%" valign=top style="font-family: Segoe UI;">
		   	<?php echo '<div style="padding-bottom:8px; font-weight:bold;"><font color="#FF5555">Numbers drawn so far ('.count($draws).' of 75):</font></div>';
		   		draws_table();
		   	?>
		   	<br><br>	   	</td>
	   	</tr>

	   	<!-- THIS IS THE BEST PLACE TO PUT THE BINGO CALLS:
	   	<tr><td width="50%" valign="top" style="font-weight:bold; font-size:20px; padding-top:15px;">
	   		G 30 - Dirty Gertie
	   	</td></tr>
 		   -->

	   	<tr><td width="50%" valign="bottom" style="padding-top:430px;">
	   		<br>
		   	<?php 
		   	if (count($draws)<$maxNumber)  //all numbers have been drawn, clicking the button would
		   	//make the program go into an infinite loop.
		   		if ($drawmode=="automatic") {
		   			echo '<input name="gimme" type="submit" style="margin-top:15px; font-size:22px; font-weight:bold;" value="Give Me a Number!" autofocus>&#160;&#160;&#160;&#160;<span style="font-size:22px; font-weight:bold;">'.$currentBall.'</span>';
		   		} else {
		   			echo '<input name="gimme" type="submit" style="margin-top:15px;" value="Enter!">';
		   		}
		   	else echo '<input name="emty" type="submit" style="margin-top:15px;" value="All numbers drawn!">';
		   	?>
		   	
		   	&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<input name="restart" type="button" style="font-weight:bold;" value="Restart Game" onClick="RestartConfirmation(<?php echo $numberinplay;?>)">

			<br><br><label for="pattern">Pattern to display:</label>
			<select name="pattern-selector" id="pattern-selector" onchange="document.getElementById('pattern').src = this.value;">
				<option disabled selected>Choose a pattern...</option>
				<option value="docs/Bingo Pattern 01 - Regular Compact.png">Regular</option>
				<option value="docs/Bingo Pattern 02 - Full Card.png">Full House</option>
				<option value="docs/Bingo Pattern 03 - Four Corners.png">Four Corners</option>
				<option value="docs/Bingo Pattern 04 - X-Shaped.png">X-Shaped</option>
				<option value="docs/Bingo Pattern 05 - Plus Shaped.png">+ Shaped</option>
				<option value="docs/Bingo Pattern 07 - T-Shaped.png">T-Shaped</option>
				<option value="docs/Bingo Pattern 08 - Z-Shaped.png">Z-Shaped</option>
				<option value="docs/Bingo Pattern 06 - Square Shaped.png">Open Square</option>
				<option value="docs/Bingo Pattern 09 - Box-Shaped.png">Center Box</option>
			</select>

		   	<?php echo '<p style="color:#FF5555; font-weight:bold; font-size:16px">Winning Card Numbers (New Numbers in Red):</p>';
		   		winners_table();
		   	?></s>
			
			<font size="-1">(This set has a maximum of <?php echo $numbercards; ?> cards)</font>
			<br>
			<br>
			<br>
			<b>Number of cards in play for set <?php echo $setid ?>:</b> <input name="numberinplay" type="text" size="2" value="<?php echo $numberinplay; ?>">&nbsp;&nbsp;&nbsp;<a href="javascript:explain('Cards in play')">help?</a>


	   	</td></tr></table></form>

	   	<?php $_SESSION['previousBall'] = $currentBall; ?>
	   	
	    
	   
	   
