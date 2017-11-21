<?php
	if(!isset($_POST['login'])||!isset($_POST['pass'])) header('Location: badpassword.html'); 

	if ($_POST['login'] == 'moder'&&$_POST['pass'] == 'moderpass')
	{
		session_start();
		$_SESSION['login'] = 'moder'; //Имя пользователя
		$_SESSION['type'] = 1; //Права модератора
		header('Location: showContent.php');
	}
	else if ($_POST['login'] == 'admin'&&$_POST['pass'] == 'adminpass')
	{
		session_start();
		$_SESSION['login'] = 'admin';
		$_SESSION['type'] = 2; //Права администратора
		header('Location: showContent.php');
	}
    
    else if(file_exists('users.txt') && file_exists('passwords.txt')){
            $u = file('users.txt');
            $p = file('passwords.txt');
        for ($i = 0; $i<count($u); $i++) {
            $user = $u[$i];
            $pass = $p[$i];
            if ($_POST['login'] == $user){
                break;
            };
        };
        if ($_POST['login'] == $user)
            {
                session_start();
                $_SESSION['login'] = $user; //Имя пользователя
                $_SESSION['type'] = 0; //Права пользователя
                header('Location: showContent.php'); //Функция отправки http заголовка
        }else header('Location: badpassword1.html');
    }
	else header('Location: badpassword.html');
?>