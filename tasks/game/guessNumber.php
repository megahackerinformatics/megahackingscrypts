<?php session_start(); ?>
<html>
<head>
	<title>������ �����</title>
</head>
<body>
<?php
if ($_POST['type'] == 'user')
{
	//���������� ����� ������������
	if (!isset($_SESSION['number']))
	{
		//����� ��� �� ��������
		$min = 1;
		$_SESSION['try'] = 1;
		$_SESSION['number'] = rand($min, $min+99);
		echo '<p>� ������� ����� �� <b>'.$min.'</b> �� <b>'.($min+99).'</b></p><br>';	
	}
	if($_POST['number'] == $_SESSION['number'])
	{
		//����� �������
		echo '<h3>� ������������� ������� ����� '.$_SESSION['number'].'! ��� ������������� �������: '.$_SESSION['try'].'</h3><hr><a href="../index.html">�� �������</a>';	
		session_destroy();	
	}
	else if($_POST['number'] < $_SESSION['number'])
	{
		//���������� ����� ������
		$_SESSION['try']++;
		echo '<h3>��� ����� ������, ��� '.$_POST['number'].'! ���������� ��� ���!</h3><h3>������� � '.$_SESSION['try'].'</h3>';
		echo '<form method="post" action="guessNumber.php">
		���� �����: <input type="text" name="number">
		<input type="submit" value="�������!">
		<input type="hidden" name="type" value="user">
	</form>';		
	}
	else
	{
		//���������� ����� ������
		$_SESSION['try']++;
		echo '<h3>��� ����� ������, ��� '.$_POST['number'].'! ���������� ��� ���!</h3><h3>������� � '.$_SESSION['try'].'</h3>';
		echo '<form method="post" action="guessNumber.php">
		���� �����: <input type="text" name="number">
		<input type="submit" value="�������!">
		<input type="hidden" name="type" value="user">
	</form>';		
	} 
}
else
{
	//��������� ����� ���������
	if (isset($_POST['min'])&&isset($_POST['max'])) //���� ���� ���������
	{
		//��������� ������ ���
		$_SESSION['try'] = 1;
		$_SESSION['min'] = $_POST['min'];
		$_SESSION['max'] = $_POST['max'];
	}
	else if ($_POST['answer'] == 0)
	{
		echo '<h3>��� ������������ '.$_SESSION['try'].' �������, ����� �������. ������� �� ����!</h3><hr><a href="../index.html">�� �������</a>';	
		session_destroy();
		exit;
	}
	else if ($_POST['answer'] == 1)
	{// ���������
		$_SESSION['try']++;
		$_SESSION['min'] += round(abs($_SESSION['min']-$_SESSION['max'])/2);
	}
	else
	{
		$_SESSION['try']++;
		$_SESSION['max'] -= round(abs($_SESSION['min']-$_SESSION['max'])/2);
	}
	echo '<p>� ������, ��� �� �������� ����� <b>';
	echo round($_SESSION['min']+abs($_SESSION['min']-$_SESSION['max'])/2);
	echo '</b>. ��� �������?</p>';
?>
	<form method="post" action="guessNumber.php"><input type="radio" name="answer" value=1>��� ����� ������!<br>
		<input type="radio" name="answer" value="-1">��� ����� ������!<br>
		<input type="radio" name="answer" value="0">��� ��� �����, ��� ���� ��� �������?!<br>
		<input type="submit" value="��������!">
		<input type="hidden" name="type" value="guessing">
	</form>
<?php
}
?>

</body>
</html>