<?php
session_start();
if ($_SESSION['type'] == 0) {header('Location: norights.html'); exit;}//�� ���� ������������� �������������
if (!isset($_GET['id'])) die ('�� ��������� ������ �������!');
if (!isset($_POST['new'])) {
?>
<!doctype html>
<html>
	<head>
		<title>�������������� | �������� �����</title>
	</head>
	<body>
		<h2>�������������� ������</h2>
		<form action="edit.php?id=<?php echo $_GET['id']?>" method="post">
		<textarea name="new" cols="200" style="display:block; width:90%; margin-bottom:3px;">
<?php
	$f = fopen('posts.txt', 'r') or die ('�� ������� ������� ���� � �������!'); //������� ���� ��� ������
	for ($i = 0; $i<$_GET['id']; $i++) fgets($f); //��������� ��� ������� ����� ������
	echo trim(str_ireplace('<br>', PHP_EOL, fgets($f))); //trim ������� ������� �� ������ � ����� ������
?></textarea>	
		<input type="submit" value="���������">
		</form>
		<hr>
		<a href="showContent.php">���������</a>
	</body>
</html>
<?php
}
else {
$file = file('posts.txt'); //������� ���� ���� � ������
$file[$_GET['id']] = str_replace(PHP_EOL, "<br>",trim($_POST['new'])); //�������� ������ ������� �������, ��� ���� ������ �������
$f = fopen('posts.txt', 'w');//������� ���� ��� ����������
fwrite($f, implode(PHP_EOL, $file)); //�������� ������ ������� � ����, implode ���������� �������� ������� � ������
fclose($f);
header('Location: showContent.php');
}
?>