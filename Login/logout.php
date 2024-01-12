<?php

session_start();

// Zrušte nastavení všech proměnných
$_SESSION = array();

// Zrušení relace
session_destroy();

// Přesměrování na login
header("location: ../Login/login.php");

exit;
?>