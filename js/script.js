const form = document.querySelector(".form");

form.addEventListener('submit', (e) => {
    e.preventDefault();
    let body = new FormData(form);

    fetch('functions.php', {
        method: 'post',
        body: body,
    }).then((response) => {
        // document.querySelector(".horoscope").innerHTML = response;
        console.log(response);
    }).catch((error) => {
        document.querySelector(".horoscope").innerHTML = "Помилка якась не єбу яка" + error;
    })
});