<?php
	session_start();
	if (!isset($_SESSION['type'])) header('Location: guestbook.html'); 
	//isset возвращает TRUE, если var существует, иначе FALSE, то есть определяет, установлена ли переменная
?>
<html>
<head>
	<title><?php echo $_SESSION['login']; ?> | Гостевая книга</title>
</head>
<body>
	<form action="add.php" method="post">
		<textarea name="new" cols="200" style="width:90%; margin-bottom:3px;"></textarea>
		<input type="submit" value="Добавить">
	</form>
	<h2>Предыдущие записи: </h2>
	<div class="posts">
	<?php
		if (!file_exists('posts.txt')) echo '<p>Записей пока нет</p>';
		else
		{
			$f = fopen('posts.txt','r') or die('Не удалось открыть существующий файл!'); //открыли файл для чтения
			for($i = 0; !feof($f); $i++) 
			{
				//читаем и выводим каждую строчку файла
				echo '<div class="post"><p class="text">'.fgets($f).'</p>';
				if ($_SESSION['type']>0) echo '<a class="edit" href="edit.php?id='.$i.'">Изменить</a>'; //изменять может модератор или администратор
				if ($_SESSION['type'] == 2) echo '<a class="delete" href="delete.php?id='.$i.'">Удалить</a>'; //удалять может администратор
				echo '</div>';
			}
		}
	?>
	</div>
	<hr>
	<a href="../guestbook/logout.php">Выйти</a>
</body>
</html>