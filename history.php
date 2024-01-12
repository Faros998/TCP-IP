<?php
session_start();

$hoste = gethostname();
$ipw = gethostbyname($hoste);
$ip = $_GET['ip'];
$ip1 = $_GET['ip1'];
$ip2 = $_GET['ip2'];
$ip3 = $_GET['ip3'];
$ip4 = $_GET['ip4'];
$m1 = $_GET['m1'];
$m2 = $_GET['m2'];
$m3 = $_GET['m3'];
$m4 = $_GET['m4'];
$g1 = $_GET['g1'];
$g2 = $_GET['g2'];
$g3 = $_GET['g3'];
$g4 = $_GET['g4'];
$r1 = $_GET['r1'];
$r2 = $_GET['r2'];
$location1 = $_GET['location'];

// Kontrola, zda byla hodnota záznamů na stránce odeslána formulářem
if (isset($_GET['zaznamuNaStranku'])) {
    $_SESSION['zaznamuNaStranku'] = intval($_GET['zaznamuNaStranku']);
}

// Použití uložené hodnoty nebo defaultní hodnoty, pokud není uložena
$zaznamuNaStranku = isset($_SESSION['zaznamuNaStranku']) ? $_SESSION['zaznamuNaStranku'] : 15;

?>

<!doctype html>

<html lang="cs">

<head>
    <title>Historie</title>
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Img/logo-ico.ico" type="image/x-ico">
</head>

<body>
<div id="up">
    <div>
        <header>Historie</header>
        <nav><?php include "menu.php"; ?></nav>
        <article>
            <h1>Detail zvolené adresace <? echo "$ip  Lokalita $location1 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Rozsah $ip1.$ip2.$ip3.$r1 - $ip1.$ip2.$ip3.$r2 &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; Maska $m1.$m2.$m3.$m4 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Brána $g1.$g2.$g3.$g4"
            
            ?></h1>
        

            <form action="evidence.php" method="GET">
          <input type="hidden" name="ip" value="<? echo $ip;?>">
          <input type="hidden" name="ip1" value="<? echo $ip1;?>">
          <input type="hidden" name="ip2" value="<? echo $ip2;?>">
          <input type="hidden" name="ip3" value="<? echo $ip3;?>">
          <input type="hidden" name="ip4" value="<? echo $ip4;?>">
          <input type="hidden" name="m1" value="<? echo $m1;?>">
          <input type="hidden" name="m2" value="<? echo $m2;?>">
          <input type="hidden" name="m3" value="<? echo $m3;?>">
          <input type="hidden" name="m4" value="<? echo $m4;?>">
          <input type="hidden" name="g1" value="<? echo $g1;?>">
          <input type="hidden" name="g2" value="<? echo $g2;?>">
          <input type="hidden" name="g3" value="<? echo $g3;?>">
          <input type="hidden" name="g4" value="<? echo $g4;?>">
          <input type="hidden" name="r1" value="<? echo $r1;?>">
          <input type="hidden" name="r2" value="<? echo $r2;?>">
          <input type="hidden" name="location" value="<? echo $location1;?>">
          <input class="color-button" type="submit" value="Zpět do evidence <? echo  $location1;?>"></form>
          <input  class="color-button"type='button' onClick="parent.location='index.php'"value='Exit'>

            <?php
            include 'connection_database.php';

            $query = $connection->prepare("SELECT ip, location, comment, periphery, evnumber, name, manufacturer, model, cpu, ram, hdd, sn, win, lastuser, comment, editor, DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s') FROM history WHERE ip=? AND editor!='SERVER' order by date desc LIMIT 5;");
            $query->bind_param("s", $_GET["ip"]);
            $query->execute();
           
            $result = $query->get_result();
             if ($result){           
            ?>
            <br><br><h2>Poslední změny editorů na IP <?php echo $ip; ?></h2>
       
            <?        
            if ($result->num_rows > 0) {
                echo "<div class='table_offline'>";
                echo "<table>";
                echo "<thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th></tr></thead>\n";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
       
                    echo "<tr>";
                    foreach ($row as $columnName => $columnValue) {
                        echo "<td>$columnValue</td>
                        ";
                    }
           
                echo "<th><form method='post' action='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
                      <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
                      </form> </th>
                  
                      <th><form method='post' action='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
                      <input class='color-button-tab' type='submit' name='submit_button_checkout' value='Checkout'>
                      </form> </th>
                  
                      </th>
                      <th><form method='post' action='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
                      <input class='color-button-tab' type='submit' name='submit_button_ping' value='Ping'>
                      </form>";
                    echo "</tr>";              
                }
                
                echo "</tbody>\n";
                echo "</table>";
                echo "</div>";
            } else {echo "Tato IP adresa nebyla dosud editována";}
?>

             
                <br><br><h2>Kompletní historie <?php echo $ip ?></h2>

                <?php

                if (isset($_GET["strana"])) {
                    $strana = intval($_GET["strana"]);  // převedení na číslo
                } else {
                    $strana = 1;
                }
?>
  
 <div>               <!-- Přidáme nový input pro počet záznamů na stránce -->
<form action="" method="GET">
    <label for="zaznamuNaStranku">Záznamů na stránce:</label>
    <select class="edit-grid-label" name="zaznamuNaStranku" id="zaznamuNaStranku">
        <?php
        $options = [10, 15, 30, 50, 100, 200, 256];
        foreach ($options as $option) {
            echo "<option value='$option'";
            if ($zaznamuNaStranku == $option) {
                echo " selected";
            }
            echo ">$option</option>";
        }
        ?>
    </select>
   
    <input type="hidden" name="ip" value="<?php echo $ip; ?>">
    <input class="color-button" type="submit" value="Změnit">
    <input type="hidden" name="ip1" value="<?php echo"$ip1"?>">
    <input type="hidden" name="ip2" value="<?php echo"$ip2"?>">
    <input type="hidden" name="ip3" value="<?php echo"$ip3"?>">
    <input type="hidden" name="ip4" value="<?php echo"$ip4"?>">
    <input type="hidden" name="m1" value="<?php echo"$m1"?>">
    <input type="hidden" name="m2" value="<?php echo"$m2"?>">
    <input type="hidden" name="m3" value="<?php echo"$m3"?>">
    <input type="hidden" name="m4" value="<?php echo"$m4"?>">
    <input type="hidden" name="g1" value="<?php echo"$g1"?>">
    <input type="hidden" name="g2" value="<?php echo"$g2"?>">
    <input type="hidden" name="g3" value="<?php echo"$g3"?>">
    <input type="hidden" name="g4" value="<?php echo"$g4"?>">
    <input type="hidden" name="r1" value="<?php echo"$r1"?>">
    <input type="hidden" name="r2" value="<?php echo"$r2"?>">
    <input type="hidden" name="location" value="<?php echo"$location1"?>">
</form>
    </div>  
    <button class="color-button" id="button-scrool" onClick="window.location='#up' "> -^-</button>  
<?
                $limitZacatek = ($strana - 1) * $zaznamuNaStranku;
                $queryHistory = $connection->prepare("SELECT ip, location, comment, periphery, evnumber, name, manufacturer, model, cpu, ram, hdd, sn, win, lastuser, editor, date, status FROM history WHERE ip=? ORDER BY date DESC LIMIT ?, ?");
                $queryHistory->bind_param("sii", $_GET["ip"], $limitZacatek, $zaznamuNaStranku);
                $queryHistory->execute();
                $queryHistory->store_result();
                $celkovyPocetDotaz = $connection->prepare("SELECT COUNT(*) as total FROM history WHERE ip=?");
                $celkovyPocetDotaz->bind_param("s", $_GET["ip"]);
                $celkovyPocetDotaz->execute();
                $celkovyPocetResult = $celkovyPocetDotaz->get_result();

                if ($celkovyPocetResult) {
                    $celkovyPocetZaznamu = $celkovyPocetResult->fetch_assoc()['total'];
                } else {
                    $celkovyPocetZaznamu = 0;
                }
              
                echo "Celkem nalezeno: $celkovyPocetZaznamu záznamů<br><br>";
                echo "<div class='table_offline'>";
                if ($queryHistory->num_rows > 0) {
                    $queryHistory->bind_result($hip, $hlocation, $hcomment, $hperiphery, $hevnumber, $hname, $hmanufacturer, $hmodel, $hcpu, $hram, $hhdd, $hsn, $hwin, $hlastuser, $heditor, $hdate, $hstatus);
                                   
                    echo "<table><thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th><th>Status</th></th></tr></thead></body>";

                    while ($queryHistory->fetch()) {
                        $dsa = $hdate;
                        $datee = strftime('%d.%m.%Y %H:%M:%S', strtotime($dsa));
                        echo "<div><tbody>";
                        echo "<tr>";
                        echo "<td>" . $hip . "</td>";
                        echo "<td>" . $hlocation . "</td>";
                        echo "<td>" . $hcomment . "</td>";
                        echo "<td>" . $hperiphery . "</td>";
                        echo "<td>" . $hevnumber . "</td>";
                        echo "<td>" . $hname . "</td>";
                        echo "<td>" . $hmanufacturer . "</td>";
                        echo "<td>" . $hmodel . "</td>";
                        echo "<td>" . $hcpu . "</td>";
                        echo "<td>" . $hram . "</td>";
                        echo "<td>" . $hhdd . "</td>";
                        echo "<td>" . $hsn . "</td>";
                        echo "<td>" . $hwin . "</td>";
                        echo "<td>" . $hlastuser . "</td>";
                        echo "<td>" . $heditor . "</td>";
                        echo "<td>" . $datee . "</td>";
                        echo "<td>" . $hstatus . "</td>"; 
                        echo" <td><form method='post' action='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
            <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
             </form> </td></tr>";                   
                    }
                   
                    echo "</tbody></table>";
                    echo "</div><br>";

$pocetStranek = ceil($celkovyPocetZaznamu / $zaznamuNaStranku);
echo "<b style='background-color:white;'>&nbsp Strana $strana z $pocetStranek  |";

if ($strana > 1) {
$predchoziStrana = $strana - 1;
echo "<a href='search.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$predchoziStrana'> « </a> |";
}

// Ověření, zda je možné přeskočit o deset stránek
if ($strana > 10) {
$predchoziDesetStran = $strana - 10;
echo "<a href='search.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$predchoziDesetStran'> << </a> |";
}

// Ověření, zda je možné přeskočit na poslední stránku
if ($strana + 10 < $pocetStranek) {
$nasledujiciDesetStran = $strana + 10;
} else {
$nasledujiciDesetStran = $pocetStranek;
}

}

// Ověření, zda je možné přeskočit o deset stránek
if ($strana + 10 < $pocetStranek) {
  $nasledujiciDesetStran = $strana + 10;
  echo " <a href='history.php?ip=$ip&zaznamuNaStranku=$zaznamuNaStranku&strana=$nasledujiciDesetStran' >>> </a> |";
}

// Ověření, zda je možné přeskočit na poslední stránku
if ($strana < $pocetStranek) {
  $nasledujiciStrana = $strana + 1;
  echo "<a href='history.php?ip=$ip&zaznamuNaStranku=$zaznamuNaStranku&strana=$nasledujiciStrana'> » </a> |";
}
}

for ($i = max(1, $strana - 10); $i <= min($pocetStranek, $nasledujiciDesetStran); $i++) {
  if ($i == $strana) {
      echo "<strong>$i&nbsp</strong> ";
  } else {
      echo "<a href='history.php?ip=$ip&zaznamuNaStranku=$zaznamuNaStranku&strana=$i'> $i&nbsp</a> ";
  }
}

mysqli_close($connection);
echo "<br><br><br><br><br><br><br><br>";

if (isset($_POST['submit_button_checkout'])) {
    include "checkout.php";
    }
    
    if (isset($_POST['submit_button_ping'])) {   
      include "ping.php";
      }
   
?>
</article>
</body>

<footer>
<?php include "footer.php"; ?>
</footer>

</html>