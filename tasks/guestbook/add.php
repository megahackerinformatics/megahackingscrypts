<?php
	if(strlen(trim($_POST['new'])) == 0) {header('Location: emptypost.html'); exit;} //�� ���� ��������� ������ ����
	$new = htmlspecialchars(trim($new)); //������� ������ ������� 
	$new = str_replace(PHP_EOL, '<br>', $_POST['new']); //�������� �������� ����� �� <br>
	if(file_exists('posts.txt')) $new = PHP_EOL.$new;
	$f = fopen('posts.txt', 'a') or die('�� ������� ������� ���� � �������!');
	//������� ���� ��� ������ � ����� 
	fwrite($f, $new);
	fclose($f);
	header('Location: showContent.php'); //������� �������� http ���������
	
?>