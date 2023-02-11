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
function horoscope($number) {
    $curl = curl_init("https://fakty.ua/horoscope/$number");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $page = curl_exec($curl);
    return Parse($page, '<div class="column1">', "</div>");
}

function display_horoscope($zodiac, $horoscope_text, $img) {
    return "
        <div class=\"result\">
            <h2 class=\"result__title\">Ваш знак зодіаку:</h2>
            <div class=\"horoscope__title\">{$zodiac}</div>
            <div class=\"horoscope__img\">
                <img src=\"{$img}\" alt=\"horoscope\">
            </div>
            <div class=\"horoscope__text\">
                <p>{$horoscope_text}</p>
            </div>
        </div>";
}

$img = [
    'Діва' => 'https://cdn-icons-png.flaticon.com/512/1994/1994953.png',
    'Козеріг' => 'https://cdn-icons-png.flaticon.com/512/3184/3184956.png',
    'Водолій' => 'https://cdn-icons-png.flaticon.com/512/47/47246.png',
    'Риби' => 'https://cdn-icons-png.flaticon.com/512/47/47160.png',
    'Овен' => 'https://cdn-icons-png.flaticon.com/512/47/47156.png',
    'Телець' => 'https://cdn-icons-png.flaticon.com/512/47/47414.png',
    'Близнюки' => 'https://cdn-icons-png.flaticon.com/512/47/47271.png',
    'Рак' => 'https://cdn-icons-png.flaticon.com/512/47/47412.png',
    'Лев' => 'https://cdn-icons-png.flaticon.com/512/47/47337.png',
    'Терези' => 'https://cdn-icons-png.flaticon.com/512/47/47117.png',
    'Скорпіон' => 'https://cdn-icons-png.flaticon.com/512/47/47128.png',
    'Стрілець' => 'https://cdn-icons-png.flaticon.com/512/47/47039.png'
];

if (isset($_POST['Button'])) {
    $input = $_POST['numbers'];
    $result = explode("-", $input);
    $day = $result[0];
    $month = $result[1];
    if (($month == 1) && ($day <= 20) || ($month == 12) && ($day >= 22)) {
        echo display_horoscope('Козеріг', horoscope(10), $img['Козеріг']);
    } else if (($month == 1) || ($month == 2) && ($day <= 19)) {
        echo display_horoscope('Водолій', horoscope(11), $img['Водолій']);
    } else if (($month == 2) || ($month == 3) && ($day <= 20)) {
        echo display_horoscope('Риби', horoscope(12), $img['Риби']);
    } else if (($month == 3) || ($month == 4) && ($day <= 19)) {
        echo display_horoscope('Овен', horoscope(1), $img['Овен']);
    } else if (($month == 4) || ($month == 5) && ($day <= 21)) {
        echo display_horoscope('Телець', horoscope(2), $img['Телець']);
    } else if (($month == 5) || ($month == 6) && ($day <= 21)) {
        echo display_horoscope('Близнюки', horoscope(3), $img['Близнюки']);
    } else if (($month == 6) || ($month == 7) && ($day <= 23)) {
        echo display_horoscope('Рак', horoscope(4), $img['Рак']);
    } else if (($month == 7) || ($month == 8) && ($day <= 23)) {
        echo display_horoscope('Лев', horoscope(5), $img['Лев']);
    } else if (($month == 8) || ($month == 9) && ($day <= 23)) {
        echo display_horoscope('Діва', horoscope(6), $img['Діва']);
    } else if (($month == 9) || ($month == 10) && ($day <= 23)) {
        echo display_horoscope('Терези', horoscope(7), $img['Терези']);
    } else if (($month == 10) || ($month == 11) && ($day <= 22)) {
        echo display_horoscope('Скорпіон', horoscope(8), $img['Скорпіон']);
    } else if (($month == 11) || ($month == 12) && ($day <= 30)) {
        echo display_horoscope('Стрілець', horoscope(9), $img['Стрілець']);
    } else if ($day < 31 || $month < 12) {
        echo "<h1 style=\"color: red;\">Помилка: Введіть вірні данні</h1>";
    }
}
