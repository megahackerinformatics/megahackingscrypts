<?php
session_start();


	if(!isset($_POST['llogin'])||!isset($_POST['ppass'])) header('Location: emptypost.html');
    if(strlen(trim($_POST['llogin'])) == 0 || strlen(trim($_POST['ppass'])) == 0) {header('Location: emptypost.html'); exit;}
    $user = $_POST['llogin'];
    $pass = $_POST['ppass'];
	if(file_exists('users.txt')) $user = PHP_EOL.$user;
    if(file_exists('passwords.txt')) $pass = PHP_EOL.$pass;
	$u = fopen('users.txt', 'a') or die('Не удалось открыть файл с пользователями');
    $p = fopen('passwords.txt', 'a') or die('Не удалось открыть файл с паролями');
	//открыли файл для записи в конец 
	fwrite($u, $user);
    fwrite($p, $pass);
	fclose($u);
    fclose($p);
    /////
	header('Location: guestbook.html');
?>