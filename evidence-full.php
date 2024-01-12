<?php
session_start();

$eip = $_GET['eip'];

if (isset($_GET['zaznamuNaStranku'])) {
    $_SESSION['zaznamuNaStranku'] = intval($_GET['zaznamuNaStranku']);
}

// Použití uložené hodnoty nebo defaultní hodnoty, pokud není uložena
$zaznamuNaStranku = isset($_SESSION['zaznamuNaStranku']) ? $_SESSION['zaznamuNaStranku'] : 15;



$j = isset($_GET["search"]) ? $_GET["search"] : '';
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledání</title>
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Img/logo-ico.ico" type="image/x-ico">
</head>

<body>
<div id="up">
    <header>Evidence komplet </header>
    <nav><?php include "menu.php"; ?></nav>

    <article>
    <h1>Vyhledání dle kritérií <?php echo $j; ?></h1>
    <div id="search">
      <form action="evidence-full.php" method="GET">
        <input name="search" type="text" placeholder="IP, název PC, sn, ev.č. ..... ">
        </form>
        </div>

        <div>
            <form action="evidence-full.php" method="get">
            <input type="hidden" name="search" value="<?php echo $j; ?>">
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
            
                <input class="color-button"  type="submit" value="Změnit">
            </form>
          </div>
         <button class="color-button" id="button-scrool" onClick="window.location='#up' "> -^-</button>
        <?php
        include 'connection_database.php';

       
            if (isset($_GET["strana"])) {
                $strana = intval($_GET["strana"]);
            } else {
                $strana = 1;
            }

            $searchInput = $connection->real_escape_string($_GET["search"]);
            
            $searchTerms = explode(" ", $searchInput);
            $conditions = array();

            foreach ($searchTerms as $term) {
                $conditions[] = "(ip LIKE '%$term%' OR location LIKE '%$term%' OR evnumber LIKE '%$term%' OR comment LIKE '%$term%' OR periphery LIKE '%$term%' OR name LIKE '%$term%' OR manufacturer LIKE '%$term%' OR model LIKE '%$term%' OR cpu LIKE '%$term%' OR ram LIKE '%$term%' OR hdd LIKE '%$term%' OR sn LIKE '%$term%' OR win LIKE '%$term%' OR lastuser LIKE '%$term%' OR date LIKE '%$term%' OR editor LIKE '%$term%')";
            }
            
            $whereClause = implode(" AND ", $conditions);
            $limitZacatek = ($strana - 1) * $zaznamuNaStranku;
            $query = "SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,comment,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,editor, DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s') AS formatovaneDatum FROM evidence WHERE  $whereClause  LIMIT $limitZacatek, $zaznamuNaStranku";
            $result = $connection->query($query);
            $celkovyPocetDotaz = "SELECT COUNT(*) as total FROM evidence WHERE $whereClause";
            $celkovyPocetResult = mysqli_query($connection, $celkovyPocetDotaz);

            if ($celkovyPocetResult) {
                $celkovyPocetZaznamu = mysqli_fetch_assoc($celkovyPocetResult)['total'];
            } else {
                $celkovyPocetZaznamu = 0;
            }
           
            echo "Počet nalezených záznamů:<B> $celkovyPocetZaznamu<br><br>";
            echo "<div class='table_offline'>";
            if ($result->num_rows > 0) {
                echo "<div class='tableFixHead'><table><thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th>
                
                </tr></thead></>\n";
                while ($row = $result->fetch_assoc()) {
     
                    echo "<tr>";
                    $ips = $row["ip"];
                    $ip1 = $row["ip1"];
                    $ip2 = $row["ip2"];  
                    $ip3 = $row["ip3"];  
                    $ip4 = $row["ip4"];
                    $m1 = $row["m1"];
                    $m2 = $row["m2"];
                    $m3 = $row["m3"];
                    $m4 = $row["m4"];
                    $g1 = $row["g1"];
                    $g2 = $row["g2"];
                    $g3 = $row["g3"];
                    $g4 = $row["g4"];
                    $r1 = $row["r1"];
                    $r2 = $row["r2"];
                    $location = $row["location"];

                    unset($row["ip1"]); // odstranění ip3 z výsledného pole
                    $ip2_value = $row["ip2"];
                    unset($row["ip2"]);
                    $ip3_value = $row["ip3"];
                    unset($row["ip3"]);
                    $ip4_value = $row["ip4"];
                    unset($row["ip4"]);
                    $m1_value = $row["m1"];
                    unset($row["m1"]);
                    $m2_value = $row["m2"];
                    unset($row["m2"]);
                    $m3_value = $row["m3"];
                    unset($row["m3"]);
                    $m4_value = $row["m4"];
                    unset($row["m4"]);
                    $g1_value = $row["g1"];
                    unset($row["g1"]);
                    $g2_value = $row["g2"];
                    unset($row["g2"]);
                    $g3_value = $row["g3"];
                    unset($row["g3"]);
                    $g4_value = $row["g4"];
                    unset($row["g4"]);
                    $r1_value = $row["r1"];
                    unset($row["r1"]);
                    $r2_value = $row["r2"];
                    unset($row["r2"]);
               
                    foreach ($row as $columnName => $columnValue) {
                        // Zvýraznění pouze sloupce, které odpovídá hledaným kritériím
                        foreach ($searchTerms as $term) {
                            if (stripos($columnValue, $term) !== false) {
                                $columnValue = str_ireplace($term, "<span class='highlight'>$term</span>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'SWITCH') !== false) {
                              $columnValue = str_ireplace('SWITCH', "<div class='per-switch'>SWITCH</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'TISK') !== false) {
                            $columnValue = str_ireplace('TISK', "<div class='per-tisk'><a href='http://$ips' target='blank'>TISK</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'PC') !== false) {
                              $columnValue = str_ireplace('PC', "<div class='per-pc'>PC</style>", $columnValue);
                            } 
                            if ($columnName === 'periphery' && stripos($columnValue, 'KAMERA') !== false) {
                                $columnValue = str_ireplace('KAMERA', "<div class='per-kamera'><a href='http://$ips' target='blank'>KAMERA</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'BRÁNA') !== false) {
                                $columnValue = str_ireplace('BRÁNA', "<div class='per-brana'>BRÁNA</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'NEZNÁMÉ') !== false) {
                                $columnValue = str_ireplace('NEZNÁMÉ', "<div class='per-nezname'>NEZNÁMÉ</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'SÍŤ') !== false) {
                              $columnValue = str_ireplace('SÍŤ', "<div class='per-sit'>SÍŤ</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'BROADCAST') !== false) {
                                $columnValue = str_ireplace('BROADCAST', "<div class='per-broadcast'>BROADCAST</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'DHCP') !== false) {
                                $columnValue = str_ireplace('DHCP', "<div class='per-dhcp'>DHCP</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'NAS') !== false) {
                                $columnValue = str_ireplace('NAS', "<div class='per-nas'>NAS</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'IP TELEFON') !== false) {
                                $columnValue = str_ireplace('NAS', "<div class='per-ip-telefon'>IP TELEFON</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'NVR') !== false) {
                                $columnValue = str_ireplace('NVR', "<div class='per-nvr'>NVR</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'SCO') !== false) {
                                $columnValue = str_ireplace('SCO', "<div class='per-sco'>SCO</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'ZAPŮJČENÁ IP') !== false) {
                                $columnValue = str_ireplace('ZAPŮJČENÁ IP', "<div class='per-zapujcena-ip'>ZAPŮJČENÁ IP</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'SERVER') !== false) {
                                $columnValue = str_ireplace('SERVER', "<div class='per-server'>SERVER</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'EKV') !== false) {
                                $columnValue = str_ireplace('EKV', "<div class='per-ekv'>EKV</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, 'EPYGI') !== false) {
                                $columnValue = str_ireplace('EPIGY', "<div class='per-epygi'>EPYGI</style>", $columnValue);
                            }
                            if ($columnName === 'periphery' && stripos($columnValue, '') !== false) {
                                $columnValue = str_ireplace('NEURČENO', "<div class='per-neurceno'>NEURČENO</style>", $columnValue);
                            }  
                            if ($columnName === 'periphery' && stripos($columnValue, '') !== false) {
                                $columnValue = str_ireplace('VOLNÁ', "<div class='per-volna'>VOLNÁ</style>", $columnValue);
                            }         
                            if ($columnName === 'periphery' && stripos($columnValue, '') !== false) {
                                $columnValue = str_ireplace('NOTEBOOK', "<div class='per-notebook'>NOTEBOOK</style>", $columnValue);
                            }    
                        }
                        echo "<td>$columnValue</td>";
                    }

                    echo " <th><form method='post' action='edit.php?ip=$ips&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location''>
                    <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
                  </form> </th>
            
                    <th><form method='post' action='history.php?ip=$ips&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
                    <input class='color-button-tab' type='submit' name='submit_button_history' value='History'>
                  </form> </th>
                    
                    <th><form method='post' action='evidence-full.php?ip=$ips&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
                    <input class='color-button-tab' type='submit' name='submit_button_checkout' value='Checkout'>
                  </form></th>
                    
                  <th><form method='post' action='evidence-full.php?ip=$ips&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
                  <input class='color-button-tab' type='submit' name='submit_button_ping' value='Ping'>
                </form> </th></tr></div></tbody>\n";
                }
               
                echo "</table>";
                       
                $pocetStranek = ceil($celkovyPocetZaznamu / $zaznamuNaStranku);
                echo "<br><b style='background-color:white;'>Strana $strana z $pocetStranek  |";
               
if ($strana > 1) {
    $predchoziStrana = $strana - 1;
    echo "<a href='evidence-full.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$predchoziStrana'> « </a> |";
}

// Ověření, zda je možné přeskočit o deset stránek
if ($strana > 10) {
    $predchoziDesetStran = $strana - 10;
    echo "<a href='evidence-full.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$predchoziDesetStran'> << </a> |";
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
  echo " <a href='evidence-full.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$nasledujiciDesetStran' >>> </a> |";
}

// Ověření, zda je možné přeskočit na poslední stránku
if ($strana < $pocetStranek) {
  $nasledujiciStrana = $strana + 1;
  echo "<a href='evidence-full.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$nasledujiciStrana'> » </a> |";
}

for ($i = max(1, $strana - 10); $i <= min($pocetStranek, $nasledujiciDesetStran); $i++) {
  if ($i == $strana) {
      echo "<strong>$i</strong> ";
  } else {
      echo "<a href='evidence-full.php?search=$j&zaznamuNaStranku=$zaznamuNaStranku&strana=$i'> $i</a> ";
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

