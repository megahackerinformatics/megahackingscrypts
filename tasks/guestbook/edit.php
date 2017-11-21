<?php
session_start();
if ($_SESSION['type'] == 0) {header('Location: norights.html'); exit;}//не даем пользователям редактировать
if (!isset($_GET['id'])) die ('Не пытайтесь ломать систему!');
if (!isset($_POST['new'])) {
?>
<!doctype html>
<html>
	<head>
		<title>Редактирование | Гостевая книга</title>
	</head>
	<body>
		<h2>Редактирование записи</h2>
		<form action="edit.php?id=<?php echo $_GET['id']?>" method="post">
		<textarea name="new" cols="200" style="display:block; width:90%; margin-bottom:3px;">
<?php
	$f = fopen('posts.txt', 'r') or die ('Не удалось открыть файл с постами!'); //открыли файл для чтения
	for ($i = 0; $i<$_GET['id']; $i++) fgets($f); //прочитали все строчки перед нужной
	echo trim(str_ireplace('<br>', PHP_EOL, fgets($f))); //trim удаляет пробелы из начала и конца строки
?></textarea>	
		<input type="submit" value="Сохранить">
		</form>
		<hr>
		<a href="showContent.php">Вернуться</a>
	</body>
</html>
<?php
}
else {
$file = file('posts.txt'); //считали весь файл в массив
$file[$_GET['id']] = str_replace(PHP_EOL, "<br>",trim($_POST['new'])); //изменили нужный элемент массива, при этом удаляя пробелы
$f = fopen('posts.txt', 'w');//открыли файл для перезаписи
fwrite($f, implode(PHP_EOL, $file)); //записали массив обратно в файл, implode объединяет элементы массива в строку
fclose($f);
header('Location: showContent.php');
}
?>