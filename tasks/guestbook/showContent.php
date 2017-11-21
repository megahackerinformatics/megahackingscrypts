<?php
	session_start();
	if (!isset($_SESSION['type'])) header('Location: guestbook.html'); 
	//isset ���������� TRUE, ���� var ����������, ����� FALSE, �� ���� ����������, ����������� �� ����������
?>
<html>
<head>
	<title><?php echo $_SESSION['login']; ?> | �������� �����</title>
</head>
<body>
	<form action="add.php" method="post">
		<textarea name="new" cols="200" style="width:90%; margin-bottom:3px;"></textarea>
		<input type="submit" value="��������">
	</form>
	<h2>���������� ������: </h2>
	<div class="posts">
	<?php
		if (!file_exists('posts.txt')) echo '<p>������� ���� ���</p>';
		else
		{
			$f = fopen('posts.txt','r') or die('�� ������� ������� ������������ ����!'); //������� ���� ��� ������
			for($i = 0; !feof($f); $i++) 
			{
				//������ � ������� ������ ������� �����
				echo '<div class="post"><p class="text">'.fgets($f).'</p>';
				if ($_SESSION['type']>0) echo '<a class="edit" href="edit.php?id='.$i.'">��������</a>'; //�������� ����� ��������� ��� �������������
				if ($_SESSION['type'] == 2) echo '<a class="delete" href="delete.php?id='.$i.'">�������</a>'; //������� ����� �������������
				echo '</div>';
			}
		}
	?>
	</div>
	<hr>
	<a href="../guestbook/logout.php">�����</a>
</body>
</html>