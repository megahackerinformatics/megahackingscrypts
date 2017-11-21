<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
$style = '.divText {font-family: ';
switch ($_POST['font'])
{
	case 1: {$style.='"Times New Roman";'; break;}
	case 2: {$style.='Arial;'; break;}
	case 3: {$style.='Courier;'; break;}
}
$style.='font-size: '.$_POST['size'].'pt; ';
if ($_POST['bold'] == 1) $style.='font-weight: bold; ';
if ($_POST['italic'] == 1) $style.='font-style: italic; ';
if ($_POST['underlined'] == 1) $style.='text-decoration:underline; ';
$style.='color: '.$_POST['color'].'; ';
$style.='background-color: '.$_POST['bgcolor'].'; ';
$style.='}';



$f = fopen('generated.css', 'w');
//открыли файл для перезаписи
fwrite($f, $style) or die('Запись в файл не удалась!'); //если будет ошибка - она всплывет
fclose($f);

header('Location: ../london/london.html');//перемещаемся обратно на главную страницу
?>