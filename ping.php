<link rel="stylesheet" href="./Css/style.css">

<?php
$location1 = $_GET['location'];
$location = $_GET['location'];

$ip = $_GET['ip'];

include 'connection_database.php';

  $dotaz=$connection->prepare("SELECT ip FROM evidence WHERE ip= ?");
  $dotaz->bind_param("s",$_GET["ip"]);  

  $dotaz->bind_result($eip); 
  $dotaz->execute();  
  $dotaz->fetch();   
  $dotaz->close();   
  $edate = date("d.m.Y H:i:s"); 
  $hostname = gethostbyaddr($eip); 

  echo "<div id='rtrt'> ";
  echo "<h1>Ping na IP $eip dne $edate","</h1>";   
  echo "<h1>Hostname " .$hostname, "</h1>";                    
  exec("ping -w 1 $eip", $output, $resultt);
  foreach($output as $response){
      echo $response;echo "<br><br>";
    }
 
echo"<br> <a id='mylink' class='color-button_ping_check' href='evidence.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'' onclick='myfunction();'>Lokalita $location</a></br></br></br>";
echo"<a id='mylink' class='color-button_ping_check' href='history.php?ip=$ip&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'' onclick='myfunction();'>Historie $ip</a></br></br></br>";
echo" <a id='mylink' class='color-button_ping_check' href='evidence-full.php?ip=$ips&ip1=$ip1&ip2=$ip2&ip3=$ip3&ip4=$ip4&m1=$m1&m2=$m2&m3=$m3&m4=$m4&g1=$g1&g2=$g2&g3=$g3&g4=$g4&r1=$r1&r2=$r2&location=$location'' onclick='myfunction();'>Evidence</a></br></br></br>";
echo"<a id='mylink' class='color-button_ping_check' href='index.php' onclick='myfunction();'>Home</a></br></br></div>";
?>
