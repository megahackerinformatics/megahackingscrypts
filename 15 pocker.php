<!DOCTYPE html>
<html>
<head>
	<title>poker dice</title>
	<style type = "text/css"
body {
	backround: green;
	color: tan;
}
</style>
</head>
<body>
<center>
	<h1>Poker Dice</h1>
	<form>
		<?php
        $secondroll = $_REQUEST["secondroll"];
        $cash = $_REQUEST["cash"];
        $keepit = $_REQUEST["keepit"];
        $hdnCounter = $_REQUEST["hdnCounter"];
		if (empty($cash)) {
			$cash = 100;
		}
		rollDice();
		if ($secondRoll == TRUE) {
			print "<h2>Second Roll </h2> \n";
			$secondRoll = FALSE;
			evaluate();
		} else {
			print "<h2>First Roll</h2> \n";
			$secondRoll = TRUE;
		}
		printStuff();
		function rollDice(){
			global $die, $secondRoll, $keepIt;
			print "<table border = 1><td><tr>";
			for ($i=0; $i < 5; $i++) { 
				if ($keepIt[$i] == ""){
					$die[$i] = rand(1,6);
			} else {
				$die[$i] = $keepIt[$i];
			}
			$theFile = "die" . $die[$i]. ".jpg";
			print <<<HERE
			<td>
			<img src = "$theFile"
			height = 50
			width = 50> <br>
HERE;
            if ($secondRoll == FALSE) {
                print <<<HERE
                    <input type = "checkbox"  name = "keepIt[$i}" value = $die[$i]>
                    </td>
HERE;
}
}
			print <<<HERE
			</td></td>
			<tr>
			<td colspan = "5">
			<center>
			<input type = "submit"  value = "повторить">
			</center>
			</td>
			</tr>
			</table>
HERE;
		}
		if ($keepIt[$i] == "") {
			$die[$i] = rand(1,6);
		} else {
			$die[$i] = $keepIt[$i];
		}
		$theFile = "die" . $die[$i] . ".jpg";
		
		print <<<HERE
		<td>
		<img src = "$theFile" ; 
		height = 50
		width = 50> <br>
HERE;

if ($secondRoll == FALSE) {
	print <<<HERE
	<input type = "checkbox" name = "keepIt[$i]" value = $die[$i]>
	</td>
HERE;
}

print <<<HERE
</tr> </td>
<tr>
<td colspan = "5">
<center>
<input type = "submit" value = "roll again">
</center>
</td>
</tr>
</table>
HERE;
function evaluate(){
	global $die, $cash;

	$payoff = 0;

	$cash -= 2;
	// count the dice
	$numVals  = array(6);
	for ($theVal=1; $theVal <= 6 ; $theVal++) { 
		for ($dieNum=0; $dieNum < 5; $dieNum++) { 
			if ($die[$dieNum] == $theVal) {
				$numVals[$theVal]++;
			}
		}
	}
// for ($i = 1; $i <= 6; $i++) {
	// print "$i: $numVals[$i] <br> \n";
	// }
	// count how many pairs, threes, fours, fives
	$numPairs = 0;
	$numThrees = 0;
	$numFours = 0; 
	$numFives = 0;
	for ($i= 1; $i <= 6 ; $i++) { 
		switch ($numVals[$i]) {
			case 2:
				$numPairs++;
				break;

			case 3:
				$numThrees++;
				break;

			case 4:
				$numFours++;
				break;
			case 5:
				$numFives++;
				break;
		}
	}
    
	if ($numPairs == 2) {
	   print "You have two pairs! <br> \n";
	   $payoff = 1;
	}
    
	if ($numThrees == 1) {
		if ($numPairs == 1) {
			print "You have a full house! <br> \n";
			$payoff = 5;
		} else {
			print "You have three of a kind! <br> \n";
			$payoff = 2;
		}
	}
	if ($numFours == 1) {
		print "You have four of a kind! <br> \n";
		$payoff = 5;
	}
	if ($numFives == 1) {
		print "You got five of a kind! <br> \n";
		$payoff = 10;
		}
        
		if (($numVals[1] == 1)
			&& ($numVals[2] == 1)
		    && ($numVals[3] == 1)
		    && ($numVals[4] == 1)
			&& ($numVals[5] == 1)){
		    	print "You have a flush! <br> \n";
		    	$payoff = 10;
	}

	if (($numVals[2] == 1)
			&&($numVals[3] == 1)
		    &&($numVals[4] == 1)
		    &&($numVals[5] == 1) 
		    &&($numVals[6] == 1)) {
		    	print "You have a flush! <br> \n";
		    	$payoff = 10;
}
print "You bet 2<br> \n";
print "Payoff is $payoff <br> \n";
$cash += $payoff;
}
for ($theVal = 1; $theVal  <= 6 ; $theVal ++) { 
	for ($dieNum =0; $dieNum  < 5 ; $dieNum++) { 
		if ($die[$dieNum] == $theVal) {
		    $numVals[$theVal]++;
		}
	}
}

// for ($i = 1; $i <= 6; $i++){
	// print "$i = 1: $numVals[$1] <br> \n";
// } // end for the loop

// count how many pairs, three, fours, fives
$numPairs = 0;
$numThree = 0;
$numFours = 0;
$numFives = 0;
for ($i= 1; $i <= 6; $i++) { 
	switch ($numVals[$i]) {
		case 2:
			$numPairs++;
			break;
		
		case 3:
			$numThrees++;
			break;
		case 4:
			$numFours++;
			break;
		case 5:
			$numFives++;
			break;
	}
}


if ($numPairs == 2) {
	print "You have two pairs! <br> \n";
	$payoff = 1;
}


if ($numThrees == 1) {
	if ($numPairs == 1){
		print "You have a full house! <br> \n";
		$payoff = 5;
	} else {
		print "You have three of a kind! <br> \n";
		$payoff =2; 
	}
}


if ($numFours == 1) {
	print "You have four of a kind! <br> \n";
	$payoff = 5;
}


if ($numFives == 1) {
	print "You got five of a kind! <br> \n}";
	$payoff = 10;
}

if (($numVals[1] == 1)
	&& ($numVals[2] == 1)
	&& ($numVals[3] == 1)
	&& ($numVals[4] == 1)
	&& ($numVals[5] == 1)){
	print "You have a straight! <br> \n";
	$payoff = 10; 
}
if (($numVals[2] ==1)
	&& ($numVals[3] == 1)
	&& ($numVals[4] == 1)
	&& ($numVals[5] == 1)
	&& ($numVals[6] == 1)) {
	print "You have a straight! <br> \n";
    $payoff = 10;
}

function printStuff(){
	global $cash, $secondRoll;
	print "Cash, $cash \n";
print <<<HERE
<input type = "hidden" name = "secondRoll" value = "$secondRoll">
<input type = "hidden" name = "cash" value = "$cash">
HERE;
}
?>
	</form>
</center>

</body>
</html>