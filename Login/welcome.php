<?php

session_start();
 
// Zkontrolujte, zda je uživatel přihlášen, pokud ne, přesměrujte jej na přihlašovací stránku
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vítej!</title>

    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Ahoj, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Již jsi přihlášen.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset hesla</a><br><br>
        <a href="logout.php" class="btn btn-danger ml-3">Odhlásit se z účtu</a><br><br>
        <a href="../index.php" class="btn btn-danger ml-3">TCP/IP</a>
    </p>
</body>
</html>