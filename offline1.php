<?php

session_start();
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, 'cs_CZ.UTF-8');
set_time_limit(0);

 $servername = "localhost"; 
 $username = "root";    
 $password = "root";       
 $dbname = "ip";     
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Chyba připojení k databázi: " . $conn->connect_error);
 }
 

 // Hledaná hodnota
 $hledanaHodnotaoff = "OFF"; 
     
 // SQL dotaz pro zjištění počtu výskytů hledané hodnoty
 $sql = "SELECT COUNT(*) AS pocet FROM history WHERE ip='$ip' and status = '$hledanaHodnotaoff'";
 $result12 = $conn->query($sql);
 
 if ($result12) {
     $row = $result12->fetch_assoc();
     $pocetVyskytu = $row['pocet'];
 } else {
     echo "Chyba při provádění dotazu: " . $conn->error;
 }
 
 // Hledaná hodnota
 $hledanaHodnotaon = "ON"; 
   
 // SQL dotaz pro zjištění počtu výskytů hledané hodnoty
 $sql = "SELECT COUNT(*) AS pocet FROM history WHERE ip='$ip' and status = '$hledanaHodnotaon' ";
 
 $result12 = $conn->query($sql);
 
 if ($result12) {
     $row = $result12->fetch_assoc();
     $pocetVyskytu = $row['pocet'];
 } else {
     echo "Chyba při provádění dotazu: " . $conn->error;
 }
 
 $hledanaHodnotaon = "ON"; 
   
 // SQL dotaz pro zjištění počtu výskytů hledané hodnoty
 $sql = "SELECT MAX(date) AS dnyon FROM history WHERE status='on' AND ip='$ip' and date <= CURDATE();  ";
 
 $result12 = $conn->query($sql);
 
 if ($result12) {
     $row = $result12->fetch_assoc();
     $po = $row['dnyon'];
    }
    else {
     echo "Chyba při provádění dotazu: " . $conn->error;
 } 

 $denactu = date("Y-m-d H:i:s");
 $dateTime1 = new DateTime($denactu);
 $dateTime2 = new DateTime($po);
 // Odečtení dvou datumů
 $rozdil = $dateTime1->diff($dateTime2);
 $rozdill = abs(($rozdil->format("%R%a")));
/* if ($rozdill == 0){ ($rozdill = $rozdill-1); };*/

 $conn->close();
?>




