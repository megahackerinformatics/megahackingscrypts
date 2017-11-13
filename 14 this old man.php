<!DOCTYPE html>
<html>
<head>
	<title>Param Old Man</title>
</head>
<body>
<h1>Param Old Man</h1>
<h3>Demonstrates use of function parameters</h3>
<?php
$places = array("bone", "thumb", "pamp", "paramp");

function chorus($where){
	print <<<HERE
    This old man he played $where<br>
	...with a knick-knack<br>
	paddy-whack <br>
	give a dog a bone <br>
	this old man came rolling home <br>
	<br><br>
HERE;
}
for ($i = 0; $i < 4; $i++){
    print(chorus($places[$i]));
}
?>
</body>
</html>