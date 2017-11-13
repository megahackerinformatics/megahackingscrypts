<html>
<head>
<title>Мальчик Кто?</title>
</head>
<body>
<form>
<?php
$txtBoxCounter = $_REQUEST["txtBoxCounter"];
$hdnCounter = $_REQUEST["hdnCounter"];
$txtBoxCounter++;
$hdnCounter++;
print <<<HERE
<input type="text"
name="txtBoxCounter"
value="$txtBoxCounter">

<input type="hidden"
name="hdnCounter"
value="$hdnCounter">

<h3>the hidden value is $hdnCounter</h3>
<input type="submit"
value="click to increment counters">
HERE;
?>
</form>
</body>
</html>