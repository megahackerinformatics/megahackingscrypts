<!DOCTYPE html>
<html>
<head>
	<title>Array</title>
</head>
<body>
<h1>Array</h1>
<?php
$camelPop[1] = "Somalia";
$camelPop[2] = "Sudan";
$camelPop[3] = "Mauritania";
$camelPop[4] = "Pakistan";
$camelPop[5] = "India";

print "<h3>Top Camel Populations in the World </h3>\n";
for ($i= 1 ; $i <= 5 ; $i++) { 
	print "$i: $camelPop[$i] <br> \n";
}

print "<i>Source: <a href = http://www.fao.org/ag/aga/glipha/index.jsp>fao </a> </i> \n";

$binary = array("000", "001", "010", "011");

print "<h3>Binary numbers </h3> \n";
for ($i=0; $i < count($binary) ; $i++) { 
	print "$i: $binary[$i] <br> \n";
}
?>
</body>
</html>