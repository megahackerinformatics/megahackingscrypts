<?php
session_start();
if ($_SESSION['type'] != 2) {header('Location: norights.html'); exit;}//ограничиваем права
if (!isset($_GET['id'])) die ('Не пытайтесь ломать систему!');
$file = file('posts.txt'); //записали файл в массив
unset($file[$_GET['id']]); //убрали нужный элемент массива
if(empty($file)) unlink('posts.txt'); //если записей не осталось - удаляем файл
else
{
	ksort($file); //убираем дырку в индексах, пересортировка
	$f = fopen('posts.txt', 'w'); //открыли файл для перезаписи
	foreach ($file as $post) //перебор массива
	{
		fwrite($f, $post); //записали каждый элемент массива в файл
	}
	fclose($f);
}
header('Location: showContent.php');
?>