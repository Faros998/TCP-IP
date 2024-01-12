<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
   
    exit;
  }

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
$location = $_GET['location'];
$info = $_GET['info'];
$info1 = $_GET['info1'];
$info2 = $_GET['info2'];
$info3 = $_GET['info3'];
$info4 = $_GET['info4'];
$info5 = $_GET['info5'];
$info6 = $_GET['info6'];
$info7 = $_GET['info7'];
$info8 = $_GET['info8'];

?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence</title>
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Img/logo-ico.ico" type="image/x-ico">
  </head>


<body>

<div id="up">
    <header>Evidence lokality
   
</div>

<nav><?php include "menu.php"; ?></nav>

<article>
<div class="evidence-info-fix">
    <h1>Vyhledání v lokalitě
   <? echo " $location1 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Rozsah $ip1.$ip2.$ip3.$r1 - $ip1.$ip2.$ip3.$r2 &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; Maska $m1.$m2.$m3.$m4 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Brána $g1.$g2.$g3.$g4</h1> </div><br>";
        ?></h1>
    <div id="search">
  
        <form action="evidence.php" method="GET">
          <input name="searchTerm" type="text" placeholder="IP, název, Ev.č. ..... ">
            <?php echo " <input type='hidden' name='ip1' value='$ip1'>"; ?>
            <?php echo " <input type='hidden' name='ip2' value='$ip2'>"; ?>
            <?php echo " <input type='hidden' name='ip3' value='$ip3'>"; ?>
            <?php echo " <input type='hidden' name='ip4' value='$ip4'>"; ?>
            <?php echo " <input type='hidden' name='m1' value='$m1'>"; ?>
            <?php echo " <input type='hidden' name='m2' value='$m2'>"; ?>
            <?php echo " <input type='hidden' name='m3' value='$m3'>"; ?>
            <?php echo " <input type='hidden' name='m4' value='$m4'>"; ?>
            <?php echo " <input type='hidden' name='g1' value='$g1'>"; ?>
            <?php echo " <input type='hidden' name='g2' value='$g2'>"; ?>
            <?php echo " <input type='hidden' name='g3' value='$g3'>"; ?>
            <?php echo " <input type='hidden' name='g4' value='$g4'>"; ?>
            <?php echo " <input type='hidden' name='r1' value='$r1'>"; ?>
            <?php echo " <input type='hidden' name='r2' value='$r2'>"; ?>
            <?php echo " <input type='hidden' name='location' value='$location'>"; ?>
            <?php echo " <input type='hidden' name='info' value='$info'>"; ?>
            <?php echo " <input type='hidden' name='info1' value='$info1'>"; ?>
            <?php echo " <input type='hidden' name='info2' value='$info2'>"; ?>
            <?php echo " <input type='hidden' name='info3' value='$info3'>"; ?>
            <?php echo " <input type='hidden' name='info4' value='$info4'>"; ?>
            <?php echo " <input type='hidden' name='info5' value='$info5'>"; ?>
            <?php echo " <input type='hidden' name='info6' value='$info6'>"; ?>
            <?php echo " <input type='hidden' name='info7' value='$info7'>"; ?>
            <?php echo " <input type='hidden' name='info8' value='$info8'>"; ?>
            </form>

            <form action="evidence.php" method="GET">
            <?php echo " <input type='hidden' name='ip1' value='$ip1'>"; ?>
            <?php echo " <input type='hidden' name='ip2' value='$ip2'>"; ?>
            <?php echo " <input type='hidden' name='ip3' value='$ip3'>"; ?>
            <?php echo " <input type='hidden' name='ip4' value='$ip4'>"; ?>
            <?php echo " <input type='hidden' name='m1' value='$m1'>"; ?>
            <?php echo " <input type='hidden' name='m2' value='$m2'>"; ?>
            <?php echo " <input type='hidden' name='m3' value='$m3'>"; ?>
            <?php echo " <input type='hidden' name='m4' value='$m4'>"; ?>
            <?php echo " <input type='hidden' name='g1' value='$g1'>"; ?>
            <?php echo " <input type='hidden' name='g2' value='$g2'>"; ?>
            <?php echo " <input type='hidden' name='g3' value='$g3'>"; ?>
            <?php echo " <input type='hidden' name='g4' value='$g4'>"; ?>
            <?php echo " <input type='hidden' name='r1' value='$r1'>"; ?>
            <?php echo " <input type='hidden' name='r2' value='$r2'>"; ?>
            <?php echo " <input type='hidden' name='location' value='$location'>"; ?>
            <?php echo " <input type='hidden' name='info' value='$info'>"; ?>
            <?php echo " <input type='hidden' name='info1' value='$info1'>"; ?>
            <?php echo " <input type='hidden' name='info2' value='$info2'>"; ?>
            <?php echo " <input type='hidden' name='info3' value='$info3'>"; ?>
            <?php echo " <input type='hidden' name='info4' value='$info4'>"; ?>
            <?php echo " <input type='hidden' name='info5' value='$info5'>"; ?>
            <?php echo " <input type='hidden' name='info6' value='$info6'>"; ?>
            <?php echo " <input type='hidden' name='info7' value='$info7'>"; ?>
            <?php echo " <input type='hidden' name='info8' value='$info8'>"; ?>
            <div><input class="color-button" type="submit" value="ALL"></div>
        </form>
    </div>

        <?php
 
 echo "<div class='info_net'>$info<b style='color:#8B0000'>$info1</b><b style='color:#C71585'>$info2</b><b style='color:olive'>$info3</b><b style='color:blue'>$info4</b><b style='color:#696969'>$info5</b><b style='color:purple'>$info6</b><b style='color:#006400'>$info7</b><b style='color:#FF4500'>$info8</b></div>";
    ?>
    </div>
    <?      
        include 'connection_database.php';
     
$query ="SELECT * FROM `evidence`";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("dotaz do databaze selhal");
}

        $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

        if (isset($_GET['searchTerm'])) {

            $conditions = array();
            $searchTerms = explode(" ", $searchTerm);

            foreach ($searchTerms as $term) {
                $conditions[] = "(ip LIKE '%$term%' OR location LIKE '%$term%' OR comment LIKE '%$term%' OR periphery LIKE '%$term%' OR evnumber LIKE '%$term%' OR name LIKE '%$term%' OR manufacturer LIKE '%$term%' OR model LIKE '%$term%' OR cpu LIKE '%$term%' OR ram LIKE '%$term%' OR hdd LIKE '%$term%' OR sn LIKE '%$term%' OR win LIKE '%$term%' OR lastuser LIKE '%$term%' OR editor LIKE '%$term%')";
            }

            $whereClause = implode(" AND ", $conditions);

            $query = $connection->prepare("SELECT ip, ip1, ip2, ip3, ip4, m1, m2, m3, m4, g1, g2, g3, g4, r1, r2, location, comment, periphery, evnumber, name, manufacturer, model, cpu, ram, hdd, sn, win, lastuser, editor, DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s'), status FROM evidence WHERE $whereClause AND ip3=$ip3 AND ip4 BETWEEN $r1 AND $r2 ORDER BY id_evidence");
            $query->bind_result($ip, $ip1, $ip2, $ip3, $ip4, $m1, $m2, $m3, $m4, $g1, $g2, $g3, $g4, $r1, $r2, $location, $comment, $periphery, $evnumber, $name, $manufacturer, $model, $cpu, $ram, $hdd, $sn, $win, $lastuser, $editor, $date, $status);
            $query->execute();

            $datee = date_create("$date");
            $daate = date_format($datee, "d.m.Y H:i:s");
          
            echo "<div class='tableFixHead'><table><thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th>
            <th><form method='post'>
            <input class='color-button' type='submit' name='btnClick' value='OFF'></form></th>
            </tr></thead></>\n";
          
            while ($query->fetch()) {
                if (isset(($_POST['btnClick']))) {                  
                    include('offline1.php');
                }
              
                echo "<div><tbody><tr><td>$ip</td><td>$location</td><td>$comment</td>";
   include('periphery.php');
   echo "</td><td>$evnumber</td><td>$name</td><td>$manufacturer</td><td>$model</td><td>$cpu</td><td>$ram</td><td>$hdd</td><td>$sn</td><td>$win</td><td>$lastuser</td><td>$editor</td><td>$date</td><td>$rozdill</td>
   
            <th><form method='post' action='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1''>
            <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
             </form> </th>
    
            <th><form method='post' action='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
            <input class='color-button-tab' type='submit' name='submit_button_history' value='History'>
            </form> </th>
            
            <th><form method='post' action='evidence.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
            <input class='color-button-tab' type='submit' name='submit_button_checkout' value='Checkout'>
            </form></th>
            
           <th><form method='post' action='evidence.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
           <input class='color-button-tab' type='submit' name='submit_button_ping' value='Ping'>
           </form> </th></tr></div></tbody>\n";   
            }

            echo "</table>";
            $query->close();
        } 
              
        else {

          $dotaz=$connection->prepare("SELECT  ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,comment,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,editor,DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s'),status from evidence where ip3=$ip3 and ip4 BETWEEN $r1 AND $r2  ORDER BY id_evidence");
          $dotaz->bind_result($ip,$ip1,$ip2,$ip3,$ip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2,$location,$comment,$periphery,$evnumber,$name,$manufacturer,$model,$cpu,$ram,$hdd,$sn,$win,$lastuser,$editor,$date,$status);
          $dotaz->execute();         
          $datee=date_create("$date");
          $daate= date_format($datee,"d.m.Y H:i:s");
         
          echo "<div class='table_offline'>";
          echo "<div class='tableFixHead'><table><thead><tr><th>IP</th><th>LOCATION</th><th>COMMENT</th><th>PERIPHERY</th><th>EV.NUMBER</th><th>NAME</th><th>NANUFACTURER</th><th>Model</th><th>CPU</th><th>RAM</th><th>HDD</th><th>SN</th><th>OS</th><th>LAST USER</th><th>EDITOR</th><th>DATE</th>
          <th><form method='post'>
          <input class='color-button-tab' type='submit' name='btnClick' value='OFF'></form></th>
          </tr></thead></div></>\n";
         
          while($dotaz->fetch()){        
            if(isset(($_POST['btnClick']))){
             ?> <div class="spinner" id="spinner"></div><?
            
             include('offline1.php');
             
            }
       
            echo "<div><tbody><tr><td>$ip</td></b>
           
            <td>$location</td><td>$comment</td>";
            include('periphery.php');
            echo "</td><td>$evnumber</td><td>$name</td><td>$manufacturer</td><td>$model</td><td>$cpu</td><td>$ram</td><td>$hdd</td><td>$sn</td><td>$win</td><td>$lastuser</td><td>$editor</td><td>$date</td><td>$rozdill</td>
            
            <th><form method='post' action='edit.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
            <input class='color-button-tab' type='submit' name='submit_button_history' value='Edit'>
            </form> </th>
    
            <th><form method='post' action='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location1'>
            <input class='color-button-tab' type='submit' name='submit_button_history' value='History'>
            </form> </th>
            
            <th><form method='post' action='evidence.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
            <input class='color-button-tab' type='submit' name='submit_button_checkout' value='Checkout'>
            </form></th>
            
            <th><form method='post' action='evidence.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'>
            <input class='color-button-tab' type='submit' name='submit_button_ping' value='Ping'>
            </form> </th></tr></div></tbody>\n";
          }         
          echo "</table></div>";   
         }

        ?>
       
    </article>
<br><br><br><br><br><br><br>

<footer>
    <?php include "footer.php"; ?>
</footer>

</html>

<?php
if (isset($_POST['submit_button_checkout'])) {
 include "checkout.php";
 }
 
 if (isset($_POST['submit_button_ping'])) {
   include "ping.php";
   }
?>

