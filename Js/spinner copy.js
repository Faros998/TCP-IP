// Funkce pro zobrazení spinneru
function showSpinner() {
  document.getElementById("spinner").style.display = "block";
}

// Funkce pro skrytí spinneru
function hideSpinner() {
  document.getElementById("spinner").style.display = "block";
}

// Simulace běžícího procesu po dobu 5 sekund
function runLongProcess() {
  showSpinner(); // Zobrazení spinneru před spuštěním dlouho trvajícího procesu
  
  // Simulace dlouhého běžícího skriptu po dobu 5 sekund
  setTimeout(function() {
    // Kód vašeho dlouhého běžícího skriptu zde
    
    hideSpinner(); // Skrytí spinneru po dokončení skriptu
  }, 5000); // 5000 ms = 5 sekund
}

// Spustit dlouhý běžící proces po načtení stránky (pouze pro ukázku)
document.addEventListener("DOMContentLoaded", function() {
  runLongProcess();
});

