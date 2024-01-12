<?php
session_start();
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, 'cs_CZ.UTF-8');

?>
<!DOCTYPE html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OFFLINE</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div id="up">
    <header>OFFLINE</header>
    <nav><?php include "menu.php"; ?></nav>
    <article>

      <h1>Vyhledání OFFLINE IP adres </h1>
   
      <div id="offline_search_grid">
      <div id="offline-search">
      <form action="offline.php" method="GET">
     
      <h2> Zadej konkrétní IP</h2> <input name="ip1xx" type="number" maxlenght="3" max="192" placeholder="10">
        <input name="ip2xx" type="number" maxlenght="3" max="255" placeholder="185">
        <input name="ip3xx" type="number" maxlenght="3" max="255" placeholder="38">
        <input name="ip4xx" type="number" maxlenght="3" max="255" placeholder="199">
        <input type="submit" value="Odeslat">
        <input type='button' onClick="parent.location='offline.php'"value='Reset'>   
      </form></div>
       
      <div id="offline-search">
      <form action="offline.php" method="GET">
      <h2>Zadej rozsah IP adresy</h2>
       OD<br> <input name="ip1x" type="number" maxlenght="3" max="192" value="10">
        <input name="ip2x" type="number" maxlenght="3" max="255" value="185">
        <input name="ip3x" type="number" maxlenght="3" max="255" placeholder="255">
        <input name="ip4x" type="number" maxlenght="3" max="255" placeholder="1">
        <br>
        <br>DO<br> <input name="ip5x" type="number" maxlenght="3" max="192" value="10">
        <input name="ip6x" type="number" maxlenght="3" max="255" value="185">
        <input name="ip7x" type="number" maxlenght="3" max="255" placeholder="255">
        <input name="ip8x" type="number" maxlenght="3" max="255" placeholder="255">
        <input type="submit" value="Odeslat">
      <input type='button' onClick="parent.location='offline.php'"value='Reset'>
      </form>
</div></div>
<img src="./Img/kab.svg" alt="logo" widht="200" class="logo-background"> 

<?php

$ip1xx = $_GET['ip1xx'];
$ip2xx = $_GET['ip2xx'];
$ip3xx = $_GET['ip3xx'];
$ip4xx = $_GET['ip4xx'];

    $ip1x = $_GET['ip1x'];
    $ip2x = $_GET['ip2x'];
    $ip3x = $_GET['ip3x'];
    $ip4x = $_GET['ip4x'];
    $ip5x = $_GET['ip5x'];
    $ip6x = $_GET['ip6x'];
    $ip7x = $_GET['ip7x'];
    $ip8x = $_GET['ip8x'];

      include 'connection_database.php';

      if (isset($ip1xx,$ip2xx,$ip3xx,$ip4xx)) {     {    

        $dotaz = $connection->prepare("SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,editor,date,status from history where date(date)= CURDATE() AND `ip1` = $ip1xx AND `ip2` = $ip2xx AND `ip3`= $ip3xx AND `ip4` = $ip4xx AND `status` = 'off';");
        $dotaz->bind_result($ip,$ip1,$ip2,$ip3,$ip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2, $editor, $date, $status);
        $dotaz->execute();
  
          echo "<div class='table_offline'>";      
          echo " <div id='io'> <h1>OFFLINE na IP $ip1xx.$ip2xx.$ip3xx.$ip4xx</h1>";
          echo "<table>";
          echo "<thead><tr><th>IP</th><th>EDITOR</th><th>DATE</th><th> OFFLINE DNŮ</th></tr><thead>\n";

          while ($dotaz->fetch()) {
            include('offline1.php');  

           echo "<tbody><tr><td>$ip</td><td>$editor</td><td>$date</td><td>$rozdill</td><th>        
              <a href='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>Edit</th>
              <th><a href='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>History</th>
              <th><a href='checkout.php?ip=$ip'>Check</th><th>  
              <a href='ping.php?ip=$ip'>Ping</a></tr></div></tbody>\n";
          }     
          echo "</table>";
      } 
/* Získání počtu řádků ve výsledku */
$row_cnt = $dotaz->num_rows;

echo "<br>Nalezen $row_cnt záznam";
if ($row_cnt == 0) {
  echo "<br><br>Zvolená adresace je ONLINE";}
echo "</div>";  
    }

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

if (isset($ip1x,$ip2x,$ip3x,$ip4x,$ip5x,$ip6x,$ip7x,$ip8x)) {

  $row_cnt = $dotaz->num_rows;
  $dotaz = $connection->prepare("SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,editor,DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s') AS formatovaneDatum,status from history  where date(date)= CURDATE() AND `ip1` BETWEEN $ip1x AND $ip5x AND `ip2` BETWEEN $ip2x AND $ip6x AND `ip3` BETWEEN $ip3x AND $ip7x AND `ip4` BETWEEN $ip4x AND $ip8x AND `status` = 'off';");
    $dotaz->bind_result($ip,$ip1,$ip2,$ip3,$ip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2, $editor, $date, $status);
    $dotaz->execute();

    echo "<div class='table_offline'>";
      echo " <div id='io'> <h1>OFFLINE v rozsahu $ip1x.$ip2x.$ip3x.$ip4x - $ip5x.$ip6x.$ip7x.$ip8x</h1>";
      echo "<table>";
      echo "<thead><tr><th>IP</th><th>EDITOR</th><th>DATE</th><th> OFFLINE DNŮ</th></tr><thead>\n";
      
      while ($dotaz->fetch()) { 
          include('offline1.php');        

       echo "<tbody><tr><td>$ip</td><td>$editor</td><td>$date</td><td>$rozdill</td><th> 
          <a href='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>Edit</th>
          <th><a href='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>History</th>
          <th><a href='checkout.php?ip=$ip'>Check</th><th>  
          <a href='ping.php?ip=$ip'>Ping</a></tr></div></tbody>\n";    
      }

      echo "</table>";
      $row_cnt = $dotaz->num_rows;
      echo "<br>Z daného rozsahu nalezen(o) $row_cnt záznam(ů) OFFLINE";
      echo "</div>";
    }
      ?>

  </article>
</body>

<footer>
    <?php include "footer.php"; ?>
</footer>

</html>
