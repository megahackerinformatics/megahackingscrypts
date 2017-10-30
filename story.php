<html>
<head>
<title>Мальчик Кто?</title>
</head>
<body>
<center>
<h1>Мальчик Кто?</h1>
<?
$color = $_REQUEST["color"];
$instrument = $_REQUEST["instrument"];
$anim1 = $_REQUEST["anim1"];
$anim2 = $_REQUEST["anim2"];
$place = $_REQUEST["place"];
$anim3 = $_REQUEST["anim3"];
$structure = $_REQUEST["structure"];
$action = $_REQUEST["action"];
$vegetable = $_REQUEST["vegetable"];
print <<<HERE
<h3>
Мальчик $color, пришел в магазин, чтобы купить $instrument!<br>
$anim1 больше всего любит $place,  $anim2 обожает $vegetable.<br>
Где живет мальчик, которому принадлежит $anim3?<br>
Он поглощен тем, что называется $structure и $action.
</h3>
HERE;
?>
</center>
</body>
</html>