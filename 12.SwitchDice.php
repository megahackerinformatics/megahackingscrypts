<!DOCTYPE html>
<html>
<head>
	<title>Switch Dice</title>
</head>
<body>
<center>
	<h1>Switch Dice</h1>
	<h3>switch</h3>
	<?php
	$roll = rand(1,6);
	print "You rolled a $roll";
	print "<br>";

	switch ($roll) {
		case '1':
			$romValue = "I";
			break;
		case '2':
			$romValue = "II";
			break;
		case '3':
			$romValue = "III";
			break;
		case '4':
			$romValue = "IV";
			break;
		case '5':
			$romValue = "V";
			break;
		case '6':
			$romValue = "VI";
			break;
		default:
			print "";
			break;
	} // end switch 

	print "<br>";
	print "<img src = dice$roll.jpg>";
	print "<br>";
	print "In Roman numerals, that's $romValue";
	print "<br>";
	print "<br>";
	print "<br>";
	?>
	<br>
	обновить для перегенерации
</center>

</body>
</html>