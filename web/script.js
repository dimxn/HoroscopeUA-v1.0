const form = document.querySelector(".form");

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    document.querySelector(".horoscope").innerHTML = '<div class="loading"><div class="lds-ring"><div></div><div></div><div></div><div></div></div><p>Шукаю гороскоп</p></div>';
    let load = document.querySelector('.loading');
    const img = {
        'Діва': 'https://cdn-icons-png.flaticon.com/512/1994/1994953.png',
        'Козеріг': 'https://cdn-icons-png.flaticon.com/512/3184/3184956.png',
        'Водолій': 'https://cdn-icons-png.flaticon.com/512/47/47246.png',
        'Риби': 'https://cdn-icons-png.flaticon.com/512/47/47160.png',
        'Овен': 'https://cdn-icons-png.flaticon.com/512/47/47156.png',
        'Телець': 'https://cdn-icons-png.flaticon.com/512/47/47414.png',
        'Близнюки': 'https://cdn-icons-png.flaticon.com/512/47/47271.png',
        'Рак': 'https://cdn-icons-png.flaticon.com/512/47/47412.png',
        'Лев': 'https://cdn-icons-png.flaticon.com/512/47/47337.png',
        'Терези': 'https://cdn-icons-png.flaticon.com/512/47/47117.png',
        'Скорпіон': 'https://cdn-icons-png.flaticon.com/512/47/47128.png',
        'Стрілець': 'https://cdn-icons-png.flaticon.com/512/47/47039.png'
    };

    const displayHoroscope = (zodiac, horoscopeText, img) => {
        return `<div class=\"result\">
            <h2 class=\"result__title\">Ваш знак зодіаку:</h2>
            <div class=\"horoscope__title\">${zodiac}</div>
            <div class=\"horoscope__img\">
                <img src=\"${img}\" alt=\"horoscope\">
            </div>
            <div class=\"horoscope__text\">
                <p>${horoscopeText}</p>
            </div>
        </div>`;
    }
    let day = document.getElementById('day').value,
        month = document.getElementById('month').value;

    if ((month == 1) && (day <= 20) || (month == 12) && (day >= 22)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Козеріг', await eel.horoscope(10)(), img['Козеріг']);
    } else if ((month == 1) || (month == 2) && (day <= 19)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Водолій', await eel.horoscope(11)(), img['Водолій']);
    } else if ((month == 2) || (month == 3) && (day <= 20)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Риби', await eel.horoscope(12)(), img['Риби']);
    } else if ((month == 3) || (month == 4) && (day <= 19)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Овен', await eel.horoscope(1)(), img['Овен']);
    } else if ((month == 4) || (month == 5) && (day <= 21)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Телець', await eel.horoscope(2)(), img['Телець']);
    } else if ((month == 5) || (month == 6) && (day <= 21)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Близнюки', await eel.horoscope(3)(), img['Близнюки']);
    } else if ((month == 6) || (month == 7) && (day <= 23)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Рак', await eel.horoscope(4)(), img['Рак']);
    } else if ((month == 7) || (month == 8) && (day <= 23)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Лев', await eel.horoscope(5)(), img['Лев']);
    } else if ((month == 8) || (month == 9) && (day <= 23)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Діва', await eel.horoscope(6)(), img['Діва']);
    } else if ((month == 9) || (month == 10) && (day <= 23)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Терези', await eel.horoscope(7)(), img['Терези']);
    } else if ((month == 10) || (month == 11) && (day <= 22)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Скорпіон', await eel.horoscope(8)(), img['Скорпіон']);
    } else if ((month == 11) || (month == 12) && (day <= 30)) {
        document.querySelector(".horoscope").innerHTML = displayHoroscope('Стрілець', await eel.horoscope(9)(), img['Стрілець']);
    } else if (day < 31 || month < 12) {
        document.querySelector(".horoscope").innerHTML = "<h1 style=\"color: red;\">Помилка: Введіть вірні данні</h1>";
    }

    load.classList.add('hide')
    setTimeout(() => {
        load.remove()
    }, 1200);
});
    // fetch('functions.php', {
    //     method: 'post',
    //     body: body,
    // }).then((response) => {
    //     // document.querySelector(".horoscope").innerHTML = response;
    //     console.log(response);
    // }).catch((error) => {
    //     document.querySelector(".horoscope").innerHTML = "Помилка якась не єбу яка" + error;
    // })

