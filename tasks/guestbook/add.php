<?php
	if(strlen(trim($_POST['new'])) == 0) {header('Location: emptypost.html'); exit;} //не даем добавлять пустой пост
	$new = htmlspecialchars(trim($new)); //убираем лишние пробелы 
	$new = str_replace(PHP_EOL, '<br>', $_POST['new']); //заменяем переводы строк на <br>
	if(file_exists('posts.txt')) $new = PHP_EOL.$new;
	$f = fopen('posts.txt', 'a') or die('Не удалось открыть файл с постами!');
	//открыли файл для записи в конец 
	fwrite($f, $new);
	fclose($f);
	header('Location: showContent.php'); //функция отправки http заголовка
	
?>