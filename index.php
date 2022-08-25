<meta charset="UTF-8">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style>
    * { font-family: "Montserrat", sans-serif; }
</style>
<body>
<form action="#" method="post">
    <label for="date">Введіть дату (00-00)</label>
        <input type="text" name="numbers">
    <button name="Button" type="submit">Підтвердити</button>
    <br>
    <?php
    date_default_timezone_set("Europe/Kiev");
    function Parse($p1, $p2, $p3)
    {
        $num1 = strpos($p1, $p2);
        if ($num1 === false)
            return 0;
        $num2 = substr($p1, $num1);
        return strip_tags(substr($num2, 0, strpos($num2, $p3)));
    }
    function Horoscope($number) {
        $curl = curl_init("https://fakty.ua/horoscope/$number");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $page = curl_exec($curl);
        return Parse($page, '<div class="column1">', "</div>");
    }
    if (isset($_POST['Button'])) {
        $input = $_POST['numbers'];
        $result = explode("-", $input);
        $day = $result[0];
        $month = $result[1];
        if (($month == 1) && ($day <= 20) || ($month == 12) && ($day >= 22)) {
            echo "<h1>Козеріг</h1><br>".Horoscope(10);
        } else if (($month == 1) || ($month == 2) && ($day <= 19)) {
            echo "<h1>Водолій</h1><br>".Horoscope(11);
        } else if (($month == 2) || ($month == 3) && ($day <= 20)) {
            echo "<h1>Риби</h1><br>".Horoscope(12);
        } else if (($month == 3) || ($month == 4) && ($day <= 19)) {
            echo "<h1>Овен</h1><br>".Horoscope(1);
        } else if (($month == 4) || ($month == 5) && ($day <= 21)) {
            echo "<h1>Телець</h1><br>".Horoscope(2);
        } else if (($month == 5) || ($month == 6) && ($day <= 21)) {
            echo "<h1>Близнюки</h1><br>".Horoscope(3);
        } else if (($month == 6) || ($month == 7) && ($day <= 23)) {
            echo "<h1>Рак</h1><br>".Horoscope(4);
        } else if (($month == 7) || ($month == 8) && ($day <= 23)) {
            echo "<h1>Лев</h1><br>".Horoscope(5);
        } else if (($month == 8) || ($month == 9) && ($day <= 23)) {
            echo "<h1>Діва</h1><br>".Horoscope(6);
        } else if (($month == 9) || ($month == 10) && ($day <= 23)) {
            echo "<h1>Терези</h1><br>".Horoscope(7);
        } else if (($month == 10) || ($month == 11) && ($day <= 22)) {
            echo "<h1>Скорпіон</h1><br>".Horoscope(8);
        } else if (($month == 11) || ($month == 12) && ($day <= 30)) {
            echo "<h1>Стрілець</h1><br>".Horoscope(9);
        } else if ($day < 31 || $month < 12) {
            echo "<h1>Помилка: Введіть вірні данні</h1>";
        }
    }
    ?>
</form>
</body>
</html>
