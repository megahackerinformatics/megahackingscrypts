<html>
<head>
	<title>Foreach</title>
</head>
<body>
<?php
$list = array("&alpha;", "&beta;", "&gamma;", "&delta;", "&epsilon;",);
print "<ul> \n";
foreach ($list as $value){
	print "<li> $value </li> \n";
} // end foreach
print "</ul> \n";
?>

</body>
</html>