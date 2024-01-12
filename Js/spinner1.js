


    var spinner = document.getElementById("spinner");
    var button = document.querySelector("button");

    spinner.style.display = "block"; // Zobrazí spinner po kliknutí
    button.style.display = "none"; // Skryje tlačítko po kliknutí

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            
            alert("Status OFFLINE byl spočítán ");

            // Skryje spinner po zobrazení hlášky a opětovně zobrazí tlačítko
            spinner.style.display = "none";
            button.style.display = "block";
        }
    };

    xhttp.open("GET", "offline1.php", true);
    xhttp.send();


