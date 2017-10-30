<html>
<head>
<title>hi user</title>
</head>
<body>
<center>
<h1>hi user</h1>
<div style="border-color:green;border-style:groove;border-width:2px">
<?
$userName = $_REQUEST["userName"];
print "<h3> hi, $userName</h3>";
?>
</div>
</center>
</body>
</html>