<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: Login/login.php");
    exit;
  }

include 'connection_database.php';
$hoste = gethostname();
$ipw = gethostbyname($hoste);
$ipaddress = $_SERVER['REMOTE_ADDR'];

$query = "SELECT * FROM `evidence`";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("dotaz do databaze selhal");
}
$hoste = gethostname();
$ipw = gethostbyname($hoste);

$dotaz = $connection->prepare("SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,comment,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,editor,DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s'),status from `evidence`  where ip='$ipaddress'");
$dotaz->bind_result($ip,$ip1,$ip2,$ip3,$ip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2, $location, $comment, $periphery, $evnumber, $name, $manufacturer, $model, $cpu, $ram, $hdd, $sn, $win, $lastuser, $editor, $date, $status);
$dotaz->execute();

?>
<!DOCTYPE html>

<title>  Evidence TCP/IP</title>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Img/logo-ico.ico" type="image/x-ico">
  <link rel="stylesheet" href="../Img/style.css">

</head>

<body>
  <div>
    <header>Home </header>
    <nav><?php include "menu.php"; ?></nav>
    
    <?
include ('flag.php');

    echo "<div id='hiddenDiv'>";
    echo "<h1>Editace tvé IP</h1>";
    echo "<table>";
    echo "<thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th><th>STATUS</th></tr><thead>\n";
    while ($dotaz->fetch()) {
   
      echo "<div clss='color_row'><tbody><tr><td>$ipaddress</td><td>$location</td><td>$comment</td><td>$periphery</td><td>$evnumber</td><td>$name</td><td>$manufacturer</td><td>$model</td><td>$cpu</td><td>$ram</td><td>$hdd</td><td>$sn</td><td>$win</td><td>$lastuser</td><td>$editor</td><td>$date</td><td>$status<td>
                                    <a href='edit.php?ip=$ip'>Edit</a></td><td><a href='history.php?ip=$ip'>History</a></td><td><a href='checkout.php?ip=$ip'>Check out</a></td> 
                                    <td><a href='ping.php?ip=$ip'>Ping</a></td></tr></div></tbody>\n";
    }

    $dotaz->close();
    mysqli_close($connection);
    echo "</table></div></div>";

    ?>
    <script src="./Js/hidendiv.js"></script>
    <?php

    include 'connection_database.php';

    $query = "SELECT * FROM `evidence`";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("dotaz do databaze selhal");
    }

    $dotaz = $connection->prepare("SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,comment,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,editor,DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s'),status from evidence ORDER BY date desc limit 10;");
    $dotaz->bind_result($ip,$ip1,$ip2,$ip3,$ip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2, $location, $comment, $periphery, $evnumber, $name, $manufacturer, $model, $cpu, $ram, $hdd, $sn, $win, $lastuser, $editor, $date, $status);
    $dotaz->execute();

    echo "<div class='table_offline'>";
    echo " <div id='io'> <h1>Poslední změny v záznamu IP</h1>";
    echo "<table>";

    echo "<thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th></tr><thead>\n";
    while ($dotaz->fetch()) {    
    
     echo "<tbody><tr><td>$ip</td></td>
    <td>$location</td><td>$comment</td>";

      include 'periphery.php';
      echo "</td><td>$evnumber</td><td>$name</td><td>$manufacturer</td><td>$model</td><td>$cpu</td><td>$ram</td><td>$hdd</td><td>$sn</td><td>$win</td><td>$lastuser</td><td>$editor</td><td>$date</td>
  
      <th><form method='post' action='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
      <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
    </form> </th>

      <th><form method='post' action='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
      <input class='color-button-tab' type='submit' name='submit_button_history' value='History'>
    </form> </th>
       
    <th><form method='post' action='index.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
    <input class='color-button-tab' type='submit' name='submit_button_checkout' value='Checkout'>
  </form> </th>
  
  <th><form method='post' action='index.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
    <input class='color-button-tab' type='submit' name='submit_button_ping' value='Ping'>
  </form> </th></tr></div></tbody>\n";
    }

    echo "</table>";
    echo "<br><br><br><br><br><br><br><br>";
    echo "</div>";
    ?>

</body>
<footer><?php include "footer.php"; ?></footer>

<?php
if (isset($_POST['submit_button_checkout'])) {
  include "checkout.php";
  }
  
  if (isset($_POST['submit_button_ping'])) {
    include "ping.php";
    }
?>