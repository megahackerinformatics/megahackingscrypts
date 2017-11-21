<html>
<body>
<?php
 
$randF = $_POST['rand'];
$num = $_POST['num'];
$I = $_POST['i'];
 
logic();
inter();
 
function logic(){
    global $num, $rand, $randF, $i, $I;
    if (empty($num)) {
        $i = 1;
        $rand = rand(1, 100);
        echo "<H1>Введите число от 1 до 100</H1>";
    } elseif ($num > 100 or $num < 1) {
        echo "<H1>Введите корректные данные</H1>!";
    }elseif ($num > $randF) {
        echo "<H2>Перебор</H2>";
        $rand = $randF;
        $I++;
        $i = $I;
    } elseif ($num < $randF) {
        echo "<H2>Маловато</H2>";
        $rand = $randF;
        $I++;
        $i = $I;
 
    } else {
        echo "<H1>Подравляю вы угадали! Вам понадобилось $I попыток.</H1>";
    }
}
 
function inter(){
    global $digit, $rand, $i, $I;
    echo <<<here
        <form method="post">
        <input name="num" type="text" value="">
        <input type="hidden" name="rand" value = $rand>
        <input type="hidden" name="i" value = $i>
        <input type="submit" value="Send">
        </form>
here;
    }
?>
</body>
</html>