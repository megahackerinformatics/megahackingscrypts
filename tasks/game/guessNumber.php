<?php session_start(); ?>
<html>
<head>
	<title>Угадай число</title>
</head>
<body>
<?php
if ($_POST['type'] == 'user')
{
	//отгадывать будет пользователь
	if (!isset($_SESSION['number']))
	{
		//число ещё не загадано
		$min = 1;
		$_SESSION['try'] = 1;
		$_SESSION['number'] = rand($min, $min+99);
		echo '<p>Я загадал число от <b>'.$min.'</b> до <b>'.($min+99).'</b></p><br>';	
	}
	if($_POST['number'] == $_SESSION['number'])
	{
		//число угадано
		echo '<h3>Я действительно загадал число '.$_SESSION['number'].'! Вам потребовалось попыток: '.$_SESSION['try'].'</h3><hr><a href="../index.html">На главную</a>';	
		session_destroy();	
	}
	else if($_POST['number'] < $_SESSION['number'])
	{
		//загаданное число больше
		$_SESSION['try']++;
		echo '<h3>Мое число больше, чем '.$_POST['number'].'! Попробуйте ещё раз!</h3><h3>Попытка № '.$_SESSION['try'].'</h3>';
		echo '<form method="post" action="guessNumber.php">
		Ваше число: <input type="text" name="number">
		<input type="submit" value="Угадать!">
		<input type="hidden" name="type" value="user">
	</form>';		
	}
	else
	{
		//загаданное число меньше
		$_SESSION['try']++;
		echo '<h3>Мое число меньше, чем '.$_POST['number'].'! Попробуйте ещё раз!</h3><h3>Попытка № '.$_SESSION['try'].'</h3>';
		echo '<form method="post" action="guessNumber.php">
		Ваше число: <input type="text" name="number">
		<input type="submit" value="Угадать!">
		<input type="hidden" name="type" value="user">
	</form>';		
	} 
}
else
{
	//угадывать будет компьютер
	if (isset($_POST['min'])&&isset($_POST['max'])) //если окна заполнены
	{
		//угадываем первый раз
		$_SESSION['try'] = 1;
		$_SESSION['min'] = $_POST['min'];
		$_SESSION['max'] = $_POST['max'];
	}
	else if ($_POST['answer'] == 0)
	{
		echo '<h3>Мне понадобилось '.$_SESSION['try'].' попыток, чтобы угадать. Спасибо за игру!</h3><hr><a href="../index.html">На главную</a>';	
		session_destroy();
		exit;
	}
	else if ($_POST['answer'] == 1)
	{// дихотомия
		$_SESSION['try']++;
		$_SESSION['min'] += round(abs($_SESSION['min']-$_SESSION['max'])/2);
	}
	else
	{
		$_SESSION['try']++;
		$_SESSION['max'] -= round(abs($_SESSION['min']-$_SESSION['max'])/2);
	}
	echo '<p>Я считаю, что Вы загадали число <b>';
	echo round($_SESSION['min']+abs($_SESSION['min']-$_SESSION['max'])/2);
	echo '</b>. Что скажете?</p>';
?>
	<form method="post" action="guessNumber.php"><input type="radio" name="answer" value=1>Мое число больше!<br>
		<input type="radio" name="answer" value="-1">Мое число меньше!<br>
		<input type="radio" name="answer" value="0">Это мое число, как тебе это удалось?!<br>
		<input type="submit" value="Ответить!">
		<input type="hidden" name="type" value="guessing">
	</form>
<?php
}
?>

</body>
</html>