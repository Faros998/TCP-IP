<!DOCTYPE html>

<head>  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/style.css">
    <title>Scan IP ALL</title>
    <header>Scan IP ALL 33,36,37,38,39,40,41</header>
   
</body>
</html>
<?php

session_start();
/* bez timeout limitu */
set_time_limit(0);
include "menu.php";
include 'connection_database.php';
$query ="SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,periphery FROM `ip_input`";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("dotaz do databaze selhal");
}

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        $port = 80;
        $wait = 1;
        $ip = $row["ip"];
        $ip1 = $row['ip1'];
        $ip2 = $row['ip2'];
        $ip3 = $row['ip3'];
        $ip4 = $row['ip4'];
        $m1 = $row['m1'];
        $m2 = $row['m2'];
        $m3 = $row['m3'];
        $m4 = $row['m4'];
        $g1 = $row['g1'];
        $g2 = $row['g2'];
        $g3 = $row['g3'];
        $g4 = $row['g4'];
        $r1 = $row['r1'];
        $r2 = $row['r2'];
        $location = $row['location'];
        $date = date("Y-m-d H:i:s");
        $editor  = "Server";
        $hostname = gethostbyaddr($ip);    
        $pingCommand = "ping -n 1 -w 1 $ip";
        $pingOutput =[];
        $resulttt = 0;
        exec ($pingCommand, $pingOutput, $resulttt);
        
        if ( $resulttt === 0) {
                                    $win = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass OS GET NAME, VERSION,BUILDNUMBER");
                                    $t = strlen($win);

if ($resulttt === 0 && $t>5){
    $manufacturer = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  COMPUTERSYSTEM GET MANUFACTURER");
    $model = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  COMPUTERSYSTEM GET MODEL" );
    $cpu = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  CPU GET NAME");
    $ram = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  COMPUTERSYSTEM GET TOTALPHYSICALMEMORY");
    $hdd = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  DISKDRIVE GET MODEL,SIZE");
    $sn = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  BIOS GET SERIALNUMBER");
    $win = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  OS GET NAME, VERSION,BUILDNUMBER");
    $lastuser = shell_exec("wmic /NODE:". $ip."/USER:$admin /PASSWORD:$adminpass  COMPUTERSYSTEM GET USERNAME");
    $ename = strtoupper($hostname);
    $emanufacturer = substr($manufacturer,14);
    $emodel = substr($model,6);
    $ecpu = substr($cpu,41);
    $eram = substr($ram,21);
    $eeram = $eram/1074000000;
    $eeeram = (ceil($eeram));
    $eeeeram = (round($eeram,2));
    $ehdd = substr($hdd,40);
    $esn = substr($sn,14);
    $ewin = substr($win,86);
    $elastuser = strtoupper(substr($lastuser,19));

    {$sqll = "INSERT INTO `history` (`idhistory`, `ip`, `ip1`, `ip2`, `ip3`, `ip4`, `m1`, `m2`, `m3`, `m4`, `g1`, `g2`, `g3`, `g4`, `r1`, `r2`, `location`, `comment`, `periphery`, `evnumber`, `name`, `manufacturer`, `model`, `cpu`, `ram`, `hdd`, `sn`, `win`, `lastuser`, `editor`, `date`, `status`) VALUES (NULL, '$ip','$ip1','$ip2','$ip3','$ip4','$m1','$m2','$m3','$m4','$g1','$g2','$g3','$g4','$r1','$r2','','' ,'','0','$ename', '$emanufacturer', '$emodel', '$ecpu', '$eeeram ($eeeeram) GB', '$ehdd', '$esn','$ewin','$elastuser','$editor','$date','ON')";           
 
    if ($connection->query($sqll) === TRUE) {
     
    echo "$ip ","$ip1 ","$ip2 ","$ip3 ","$ip4 ","$m1 ","$m2","$m3 ","$m4 ","$g1 ","$g2 ","$g3","$g4 ","$r1 ","$r2 ","$ename ","$emanufacturer ","$emodel ","$ecpu ","$eeeram ($eeeeram) GB","$ehdd ","$esn ","$ewin ","$elastuser ","$editor ","$date ","ON ","</br>";
    $text = "$ip OK \n";
    echo "New record created successfully ALL OK","</br>","</br>";  
   } 
}
}

if ($resulttt === 0 && $t<5){
    $hostnameon = gethostbyaddr($ip); 
    $ehostnameon = strtoupper($hostnameon);   
      
    {$sqll = "INSERT INTO `history` (`idhistory`,`ip`, `ip1`, `ip2`, `ip3`,`ip4`,`m1`,`m2`,`m3`,`m4`,`g1`,`g2`,`g3`,`g4`,`r1`,`r2`, `location`, `comment`,`periphery`, `evnumber`, `name`, `manufacturer`, `model`, `cpu`, `ram`, `hdd`, `sn`, `win`, `lastuser`, `editor`, `date`, `status`) VALUES (NULL, '$ip','$ip1','$ip2','$ip3','$ip4','$m1','$m2','$m3','$m4','$g1','$g2','$g3','$g4','$r1','$r2','','not recognized' ,'','0','$hostname', '', '', '', '', '', '','','','$editor','$date','ON')";                         

                            if ($connection->query($sqll) === TRUE) {                            
                            echo "$ip ","$ip1 ","$ip2 ","$ip3 ","$ip4 ","$m1 ","$m2 ","$m3 ","$m4 ","$g1 ","$g2 ","$g3","$g4 ","$r1 ","$r2 ","","","","","$ehostnameon ","","","","","$editor ","$date ","ON","</br>";
                            $text = "$ip neco tam je \n";                   
                            echo "New record created successfully JUST A PING","</br>","</br>";   
  
                        } }}
        }

if ($resulttt === 1 ){
    $sqll = "INSERT INTO `history` (`idhistory`,`ip`, `ip1`, `ip2`, `ip3`,`ip4`,`m1`,`m2`,`m3`,`m4`,`g1`,`g2`,`g3`,`g4`,`r1`,`r2`, `location`, `comment`,`periphery`, `evnumber`, `name`, `manufacturer`, `model`, `cpu`, `ram`, `hdd`, `sn`, `win`, `lastuser`, `editor`, `date`, `status`) VALUES (NULL, '$ip','$ip1','$ip2','$ip3','$ip4','$m1','$m2','$m3','$m4','$g1','$g2','$g3','$g4','$r1','$r2','','', '', '0', '', '', '', '', '','','','','','$editor','$date','OFF')";                                                                 
                                                                                                    
    if ($connection->query($sqll) === TRUE) {
    
    echo "$ip ","$ip1 ","$ip2 ","$ip3 ","$ip4 ","$m1 ","$m2 ","$m3 ","$m4 ","$g1 ","$g2 ","$g3 ","$g4 ","$r1 ","$r2 ","$date ","OFF","</br>";
    $text = "$ip OFF \n";
    echo "New record created successfully OFFLINE","</br>","</br>";}
}
    }
}


