<link rel="stylesheet" href="./Css/style.css">
<?php
session_start();

include 'connection_database.php';

if(!isset($_POST["ulozit"])) {  

                                $dotaz=$connection->prepare("SELECT ip FROM evidence WHERE ip= ?");
                                $dotaz->bind_param("s",$_GET["ip"]);  
                                $dotaz->bind_result($ip); 
                                $dotaz->execute();  
                                $dotaz->fetch();   
                                $dotaz->close(); 

                                $searchTerm =  $_GET['searchTerm'];
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
                                $ehostname = strtoupper(gethostbyaddr($ip));
                                $edate = date("d.m.Y H:i:s"); 
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
                                                                                            $emanufacturer = substr($manufacturer,14);
                                                                                            $emodel = substr($model,6);
                                                                                            $ecpu = substr($cpu,41);
                                                                                            $eramm = substr($ram,21);
                                                                                            $eeram = $eramm/1074000000;
                                                                                            $eeeram = (ceil($eeram));
                                                                                            $eeeeram = (round($eeram,2));
                                                                                            $eram = "$eeeram ($eeeeram) GB";
                                                                                            $ehdd = substr($hdd,40);
                                                                                            $esn = substr($sn,14);
                                                                                            $ewin = substr($win,86);
                                                                                            $elastuser = strtoupper(substr($lastuser,20));
                                                                                             {
                                                                                               $ch = "Aktuální stav na $eip dne $ddateactual";                             
                                                                                              }                       
                                                                                           } 
                                                                                      
                                                             if ($resulttt === 0 && $t<5){
                                                                                            {                           
                                                                                              $ch = "Hostname $hostname na IP $eip je ONLINE, ale nevím o jaké zařízení se jedná.";                                                                 
                                                                                            }  
                                                                                          }
                                                           }   
                               }                               
                                                              if ($resulttt === 1)  { 
                                                                                      $ch = "Aktuální stav na  $eip je OFFLINE" ;
                                                                                     }

                       ?>
                   
           

               
                    
    
  