<html>
<head>
<title>Word Find Answer Key</title>
</head>
<body>
<?
//ключ ответа вызванный из wordFind.php
$puzzleName = $_POST['puzzleName'];
$key = $_POST['key'];
print <<<HERE
<center>
<h1>$puzzleName Answer key</h1>
$key
</center>
HERE;
?>
</body>
</html>
