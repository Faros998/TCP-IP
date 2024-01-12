function updateClock() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    var day = date.getDate();
    var month = date.getMonth() + 1; // Měsíce jsou číslovány od 0, takže přidáme 1
    var year = date.getFullYear();

    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;

    var formattedTime = hours + ":" + minutes + ":" + seconds;
    var formattedDate = day + "." + month + "." + year;
    var dateTimeString = formattedDate + " " + formattedTime;
    document.getElementById("clock").innerHTML = dateTimeString;
}

// Zavolejte funkci `updateClock` při načtení stránky a poté každou sekundu
updateClock(); // Zavoláme funkci hned při načtení stránky
setInterval(updateClock, 1000); // Nastavíme interval na každou sekundu (1000 ms)

