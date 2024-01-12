<?php
session_start();
error_reporting(E_ALL);
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
$eip = $_GET['eip'];

?>
<!doctype html>
<html>
  <head>
    <title>Edit select</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Img/logo-ico.ico" type="image/x-ico">
  </head>
  <body>
  <div>
    <header>Edit</header>
    <nav><?php include "menu.php"; ?></nav>
    <article>

    <div class='edit-button-home-evidence'><h1>Editace IP <? echo $ip;?> </h1>

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
          <input class="color-button" type="submit" value="Zpět do evidence <? echo  $location1;?>"></form></div>
          <input  class="color-button"type='button' onClick="parent.location='index.php'"value='Exit'>
        
         <?php
   
include 'connection_database.php';

if(!isset($_POST["ulozit"])) {  

  $dotaz=$connection->prepare("SELECT  ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,comment,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,editor,date,status FROM evidence WHERE ip= ? ORDER by date DESC limit 1");
  $dotaz->bind_param("s",$_GET["ip"]);  

  $dotaz->bind_result($eip,$eip1,$eip2,$eip3,$eip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2,$elocation,$ecomment,$eperiphery,$eevnumber,$ename,$emanufacturer,$emodel,$ecpu,$eram,$ehdd,$esn,$ewin,$elastuser,$eeditor,$edate,$estatus); 
  $dotaz->execute();  
  $dotaz->fetch();   
  $dotaz->close();    
  $datee =strftime('%d.%m.%Y %H:%M:%S',strtotime($edate));
                
                      $dateactual = date("Y-m-d H:i:s");
                      $ddateactual =strftime('%d.%m.%Y %H:%M:%S',strtotime($dateactual));
             
                      if (isset(($_POST['btnClick']))) { 
                                                          include('checkout-edit.php');
                                                          $ename = $ehostname;                      
                                                         }
                      ?>

                      <div class="grid-container">
                        <div class="grid-item">
                          <label>Poslední editace uživatele <?php echo $eeditor; ?> dne <?php echo $datee; ?> </label><br>
                          <label><?php echo $ch ?></label>

          <form id="selectform" method="post" onsubmit="return kontrola()">
                                      <br> <br>
                                      <input type="hidden" name="ip"  value="<?php echo $eip; ?>">
                                      <input type="hidden" name="ip1"  value="<?php echo $eip1; ?>">
                                      <input type="hidden" name="ip2"  value="<?php echo $eip2; ?>">
                                      <input type="hidden" name="ip3"  value="<?php echo $eip3; ?>">
                                      <input type="hidden" name="ip4" value="<?php echo $eip4; ?>">
                                      <input type="hidden" name="mask" value="<?php echo $mask; ?>">
                                      <input type="hidden" name="gate" value="<?php echo $gate ?>">
                                    
                                      <div class="edit-grid-form">Name<div><input id="name" type="text" name="name" maxlength="130" value="<?php echo $ename; ?>"></div><div><button class="button" onclick="document.getElementById('name').value = null; return false;">Clear</button></div> </div>       
                                  
                                  <div class="edit-grid-form-location-periphery">Location   <div>                 
                                    <div><b style="color:black;"><?   echo "$elocation ";?></b></div>
                                      <select class="select" input name ="location" value ="ss" required>
                                          <?php
                                          include 'connection_database.php';
                                          $query ="SELECT * FROM `place`";
                                          $result2 = mysqli_query($connection, $query);
                                          $options = "";
                                          while($row2 = mysqli_fetch_array($result2))
                                          {$options = $options."<option>$row2[1]</option>";}
                                          echo $options;                        
                                          ?>
                                      </select>
                                    </div> </div>

                                    <div class="edit-grid-form">Comment<div><input id="comment" type="text"  name="comment" maxlength="130" value="<?php echo $ecomment; ?>"></div><div><button class="button" onclick=" document.getElementById('comment').value = null; return false;">Clear</button></div></div>

                                  <div class="edit-grid-form-location-periphery">Periphery  <div>
                                    <div> <b style="color:black;"><?echo "$eperiphery ";?></b></div>
                                      <select class="select" input name ="periphery"required>
                                        <?php
                                        include 'connection_database.php';
                                        $query ="SELECT * FROM `periferie`";
                                        $result2 = mysqli_query($connection, $query);
                                        $options = "";
                                        while($row2 = mysqli_fetch_array($result2))
                                        {$options = $options."<option>$row2[1]</option>";}
                                        echo $options;
                                        ?>
                                      </select>
                                    </div>                
                                  </div>

                <div class="edit-grid-form">Ev.number<div> </label><input id="evnumber" type="number" name="evnumber" maxlength="5" required value="<?php echo $eevnumber; ?>"></div><div><button class="button" onclick="document.getElementById('evnumber').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">Manufacturer<div> </label><input id="manufacturer" type="text" name="manufacturer" maxlength="130" value="<?php echo $emanufacturer; ?>"></div><div><button class="button" onclick="document.getElementById('manufacturer').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">Model<div> </label><input id="model" type="text" name="model" maxlength="130" value="<?php echo $emodel; ?>"></div><div><button class="button" onclick=" document.getElementById('model').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">CPU<div> </label><input id="cpu" type="text" name="cpu" maxlength="130" value="<?php echo $ecpu; ?>"></div><div><button class="button" onclick="document.getElementById('cpu').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">RAM<div></label><input id="ram" type="text" name="ram" maxlength="130" value="<?php echo $eram; ?>"></div><div><button class="button" onclick="document.getElementById('ram').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">HDD<div> </label><input id="hdd" type="text" name="hdd" maxlength="130" value="<?php echo $ehdd; ?>"></div><div><button class="button" onclick=" document.getElementById('hdd').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">SN<div> </label><input id="sn" type="text" name="sn" maxlength="130" value="<?php echo $esn; ?>"></div><div><button class="button" onclick=" document.getElementById('sn').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">System<div> </label><input id="system" type="text" name="system" maxlength="130" value="<?php echo $ewin; ?>"></div><div><button class="button" onclick="document.getElementById('system').value = null; return false;">Clear</button></div></div>
                <div class="edit-grid-form">Last user<div> </label><input id="lastuser" type="text" name="lastuser" maxlength="130" value="<?php echo $elastuser; ?>"></div><div><button class="button" onclick=" document.getElementById('lastuser').value = null; return false;">Clear</button></div></div>

                <br>

                <div class="button-clear-all-position"> 
                  <button class="button-clear-all" onclick="document.getElementById('selectform').reset(); 
                                  document.getElementById('name').value = null; 
                                  document.getElementById('evnumber').value = null;
                                  document.getElementById('manufacturer').value = null;
                                  document.getElementById('model').value = null;
                                  document.getElementById('cpu').value = null; 
                                  document.getElementById('ram').value = null;
                                  document.getElementById('hdd').value = null;
                                  document.getElementById('sn').value = null;
                                  document.getElementById('system').value = null;
                                  document.getElementById('lastuser').value = null;
                                  document.getElementById('comment').value = null;  
                                  return false;"> C-All                   
                  </button>
                </div>

                <div class="edit-info-save">
                  <label>Nový záznam: <?php echo $sadmin; ?></label><input type="hidden" name="editor"  value="<?php echo $sadmin; ?>"><br>
                  <label>Dne: <?php echo"$ddateactual";?></label><input type="hidden" name="editor"  value="<?php echo $dateactual; ?>">
                </div>

                <br>

                <input class="color-button" type='submit' name='ulozit' value="Save change">
                <input  class="color-button"type='button' onClick="parent.location='index.php'"value='Exit'>
          </form>

          <form method='post'>
            <input class='color-button' type='submit' name='btnClick' value='Checkout'>
            </form>

</div>  

<?php

}

else {  
  $zprava=""; 
  $dateactual = date("Y-m-d H:i:s");
  
  $dotaz=$connection->prepare("UPDATE evidence SET location=?,comment=?,periphery=?,evnumber=?, name=?,manufacturer=?,model=?,cpu=?,ram=?,hdd=?,sn=?, win=?,lastuser=?,editor='$sadmin', date='$dateactual' WHERE ip=?");
  $dotaz->bind_param("sssissssssssss",$_POST["location"],$_POST["comment"],$_POST["periphery"],$_POST["evnumber"],$_POST["name"],$_POST["manufacturer"],$_POST["model"],$_POST["cpu"],$_POST["ram"],$_POST["hdd"],$_POST["sn"],$_POST["system"],$_POST["lastuser"],$_GET["ip"]);

            if($dotaz->execute()) {
            $iip= $_POST["ip"];
            $iip1 =  $_POST["ip1"];
            $iip2 =  $_POST["ip2"];
            $iip3 =  $_POST["ip3"];
            $iip4 =  $_POST["ip4"];
            $nname = $_POST["name"];
            $llocation = $_POST["location"];
            $ccommnet = $_POST["comment"];
            $pperiphery = $_POST["periphery"];
            $eevnumber = $_POST["evnumber"];
            $mmanufacturer = $_POST["manufacturer"];
            $mmodel = $_POST["model"];
            $ccpu = $_POST["cpu"];
            $rram = $_POST["ram"];
            $hhdd = $_POST["hdd"];
            $ssn = $_POST["sn"];
            $ssystem = $_POST["system"];
            $llastuser = $_POST["lastuser"];

            $sqll = "INSERT INTO `history` (`idhistory`, `ip`, `ip1`, `ip2`, `ip3`, `ip4`, `m1`, `m2`, `m3`, `m4`, `g1`, `g2`, `g3`, `g4`, `r1`, `r2`, `location`, `comment`, `periphery`, `evnumber`,`name`, `manufacturer`, `model`, `cpu`, `ram`, `hdd`, `sn`, `win`, `lastuser`, `editor`, `date`, `status`) VALUES (NULL, '$iip', '$iip1', '$iip2', '$iip3', '$iip4','$m1','$m2','$m3','$m4','$g1','$g2','$g3','$g4','$r1','$r2', '$llocation','$ccommnet', '$pperiphery', '$eevnumber','$nname', '$mmanufacturer', '$mmodel', '$ccpu', '$rram', '$hhdd', '$ssn', '$ssystem', '$llastuser', '$sadmin', '$dateactual', '');";

                      if ($connection->query($sqll) === TRUE) {
                        ?>
                        <div id="myModal" class="modal">
                           <div class="modal-content">
                            <h2>Rekapitulace uloženého záznamu</h2>
                            
                            <?
                              echo "IP adress ".$_POST["ip"];
                              echo "<br>";
                              echo "PC name ".$_POST["name"];
                              echo "<br>";
                              echo "Location ".$_POST["location"];
                              echo "<br>";
                              echo "Comment ".$_POST["comment"];
                              echo "<br>";
                              echo "Periphery ".$_POST["periphery"];
                              echo "<br>";
                              echo "Ev.number ".$_POST["evnumber"];
                              echo "<br>";
                              echo "Manufacturer ".$_POST["manufacturer"];
                              echo "<br>";
                              echo "Model ".$_POST["model"];
                              echo "<br>";
                              echo "CPU ".$_POST["cpu"];
                              echo "<br>";
                              echo "RAM ".$_POST["ram"];
                              echo "<br>";
                              echo "HDD ".$_POST["hdd"];
                              echo "<br>";
                              echo "S/N ".$_POST["sn"];
                              echo "<br>";
                              echo "OS ".$_POST["system"];
                              echo "<br>";
                              echo "Last user ".$_POST["lastuser"];
                              echo "<br>";      
                              echo "Editor ".$sadmin;
                              echo "<br>";
                              echo "Date ".$dateactual;
                              echo "<br>";  
                            ?>
        <button class="color-button" onclick="closeModal()">Home</button>

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
          <input type="hidden" name="location" value="<? echo $llocation;?>">
         <input class="color-button" type="submit" value="Zpět do evidence <? echo  $llocation;?>"></div>
        </form>
    </div>
</div>
                        <?
                     echo "<script>  
                                  document.getElementById('myModal').style.display = 'block';
                                  function closeModal() {
                                  document.getElementById('myModal').style.display = 'none';
                                  window.location= 'index.php';
                                                          }  
                            </script>";
                    echo '<style>.grid-item{display:none;}</style>';
                    echo '<style>.footer{display:none;}</style>';   
                              }

                                else {
                                        echo "Error: " . $sqll . "<br>" . $conn->error;
                                          }                          
                                              }
                                                    else {echo "<h2 class='chyba'>Změny nebyly uloženy</h2>\n".$dotaz->error;}                                           
                                                    $dotaz->close();                                         
           }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
if (!isset($_POST["ulozitt"]))  {

  $dotazz=$connection->prepare("SELECT ip,ip1,ip2,ip3,ip4,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2,location,periphery,evnumber,name,manufacturer,model,cpu,ram,hdd,sn,win,lastuser,comment,editor,date,status FROM history WHERE ip=? and editor='server' order by date desc ;");
  $dotazz->bind_param("s",$_GET["ip"]); 
  $dotazz->bind_result($aip,$aip1,$aip2,$aip3,$aip4,$m1,$m2,$m3,$m4,$g1,$g2,$g3,$g4,$r1,$r2,$alocation,$aperiphery,$aevnumber,$aname,$amanufacturer,$amodel,$acpu,$aram,$ahdd,$asn,$awin,$alastuser,$acomment,$aeditor,$adate,$astatus); 
  $dotazz->execute(); 
  $dotazz->fetch();   
  $dotazz->close();   
  $ddatee =strftime('%d.%m.%Y %H:%M:%S',strtotime($adate));
  $dateactual = date("Y-m-d H:i:s");
 
?>
              <div class="grid-item">
                <label>Poslední automatický záznam ze SERVERU dne <?php echo $ddatee; ?> </label>  
                <form id="selectform2" method="post" onsubmit="return kontrola()">
                <br> <br>
                <input type="hidden" name="ipp"  value="<?php echo $aip; ?>">
                <input type="hidden" name="ip11"  value="<?php echo $aip1; ?>">
                <input type="hidden" name="ip22"  value="<?php echo $aip2; ?>">
                <input type="hidden" name="ip33"  value="<?php echo $aip3; ?>">
                <input type="hidden" name="ip44" value="<?php echo $aip4; ?>">
                                       
        <div class="edit-grid-form">Name<div><input id="namee" type="text" name="namee" maxlength="130" value="<?php echo $aname; ?>"></div><div><button class="button" onclick="document.getElementById('namee').value = null; return false;">Clear</button></div> </div>                                             
                                         
        <div class="edit-grid-form-location-periphery">Location   <div> 
         <div><b style="color:black;"><?   echo "$elocation ";?></b></div>               
              <select class="select" input name ="locationn" required>
                  <?php
                  include 'connection_database.php';
                  $query ="SELECT * FROM `place`";
                  $result2 = mysqli_query($connection, $query);
                  $options = "";
                  while($row2 = mysqli_fetch_array($result2))
                  {$options = $options."<option>$row2[1]</option>";}
                  echo $options;
                  ?>
              </select></div> </div>

              <div class="edit-grid-form">Comment<div><input id="commentt" type="text"  name="commentt" maxlength="130" value="<?php echo $acomment; ?>"></div><div><button class="button" onclick=" document.getElementById('commentt').value = null; return false;">Clear</button></div> </div>       
                  
              <div class="edit-grid-form-location-periphery">Periphery   <div> 
               <div> <b style="color:black;"><?   echo "$eperiphery ";?></b></div>
                <select class="select" input name ="peripheryy"required>
                  <?php
                  include 'connection_database.php';
                  $query ="SELECT * FROM `periferie`";
                  $result2 = mysqli_query($connection, $query);
                  $options = "";
                  while($row2 = mysqli_fetch_array($result2))
                  {$options = $options."<option>$row2[1]</option>";}
                  echo $options;
                  ?>
                </select></div> </div>

              <div class="edit-grid-form">Ev.number<div>                
              </label><input id="evnumberr" type="number" name="evnumberr" maxlength="5" required value="<?php echo $aevnumber; ?>"></div><div><button class="button" onclick="document.getElementById('evnumberr').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">Manufacturer<div> </label><input id="manufacturerr" type="text" name="manufacturerr" maxlength="130" value="<?php echo $amanufacturer; ?>"></div><div><button class="button" onclick="document.getElementById('manufacturerr').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">Model<div> </label><input id="modell" type="text" name="modell" maxlength="130" value="<?php echo $amodel; ?>"></div><div><button class="button" onclick=" document.getElementById('modell').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">CPU<div> </label><input id="cpuu" type="text" name="cpuu" maxlength="130" value="<?php echo $acpu; ?>"></div><div><button class="button" onclick="document.getElementById('cpuu').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">RAM<div> </label><input id="ramm" type="text" name="ramm" maxlength="130" value="<?php echo $aram; ?>"></div><div><button class="button" onclick="document.getElementById('ramm').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">HDD<div> </label><input id="hddd" type="text" name="hddd" maxlength="130" value="<?php echo $ahdd; ?>"></div><div><button class="button" onclick=" document.getElementById('hddd').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">SN<div> </label><input id="snn" type="text" name="snn" maxlength="130" value="<?php echo $asn; ?>"></div><div><button class="button" onclick=" document.getElementById('snn').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">System<div> </label><input id="systemm" type="text" name="systemm" maxlength="130" value="<?php echo $awin; ?>"></div><div><button class="button" onclick="document.getElementById('systemm').value = null; return false;">Clear</button></div></div>
              <div class="edit-grid-form">Last user<div> </label><input id="lastuserr" type="text" name="lastuserr" maxlength="130" value="<?php echo $alastuser; ?>"></div><div><button class="button" onclick=" document.getElementById('lastuserr').value = null; return false;">Clear</button></div></div>
              <label>Status <b style='color:black'> <?php echo $astatus; ?></b></label>
        <br> <br>
        <div class="button-clear-all-position"> <button class="button-clear-all" onclick="document.getElementById('selectform2').reset();
                          document.getElementById('namee').value = null;             
                          document.getElementById('evnumberr').value = null;
                          document.getElementById('manufacturerr').value = null;
                          document.getElementById('modell').value = null;
                          document.getElementById('cpuu').value = null; 
                          document.getElementById('ramm').value = null;
                          document.getElementById('hddd').value = null;
                          document.getElementById('snn').value = null;
                          document.getElementById('systemm').value = null;
                          document.getElementById('lastuserr').value = null;
                          document.getElementById('commentt').value = null;
                          
                          return false;">
                                C-ALL
                            </button></div>

                            <div class="edit-info-save">
<label>Nový záznam: <?php echo $sadmin; ?></label><input type="hidden" name="editor"  value="<?php echo $sadmin; ?>"><br>
<label>Dne: <?php echo"$ddateactual";?></label><input type="hidden" name="editor"  value="<?php echo $dateactual; ?>">
</div>
                            <input class='color-button' type='submit' name='ulozitt' value="Save change">
                            <input class='color-button' type='button'onClick="parent.location='index.php'"value='Exit'>
        </form>
        </div>  </div>
        <br><br><br><br><br><br><br><br><br>
<?

}
        else {  
          $zprava=""; 
          $dateactual = date("Y-m-d H:i:s");

        $dotaz=$connection->prepare("UPDATE evidence SET location=?,periphery=?,evnumber=?,name=?,manufacturer=?,model=?,cpu=?,ram=?,hdd=?,sn=?, win=?,lastuser=?,comment=?, editor='$sadmin', date='$dateactual' WHERE ip=?"); 
        $dotaz->bind_param("ssisssssssssss",$_POST["locationn"],$_POST["peripheryy"],$_POST["evnumberr"],$_POST["namee"],$_POST["manufacturerr"],$_POST["modell"],$_POST["cpuu"],$_POST["ramm"],$_POST["hddd"],$_POST["snn"],$_POST["systemm"],$_POST["lastuserr"],$_POST["commentt"],$_GET["ip"]);

                  if ($dotaz->execute()) {
                  $iipp= $_POST["ipp"];
                  $iip11 =  $_POST["ip11"];
                  $iip22 =  $_POST["ip22"];
                  $iip33 =  $_POST["ip33"];
                  $iip44 =  $_POST["ip44"];
                  $nnamee = $_POST["namee"];
                  $llocationn = $_POST["locationn"];
                  $pperipheryy = $_POST["peripheryy"];
                  $eevnumberr = $_POST["evnumberr"];
                  $mmanufacturerr = $_POST["manufacturerr"];
                  $mmodell = $_POST["modell"];
                  $ccpuu = $_POST["cpuu"];
                  $rramm = $_POST["ramm"];
                  $hhddd = $_POST["hddd"];
                  $ssnn = $_POST["snn"];
                  $ssystemm = $_POST["systemm"];
                  $llastuserr = $_POST["lastuserr"];
                  $ccommnett = $_POST["commentt"];
  
                  $sqll = "INSERT INTO `history` (`idhistory`, `ip`, `ip1`, `ip2`, `ip3`, `ip4`,m1,m2,m3,m4,g1,g2,g3,g4,r1,r2, `location`, `periphery`, `evnumber`, `name`, `manufacturer`, `model`, `cpu`, `ram`, `hdd`, `sn`, `win`, `lastuser`, `comment`, `editor`, `date`,`status`) VALUES (NULL, '$iipp', '$iip11', '$iip22', '$iip33', '$iip44','$m1','$m2','$m3','$m4','$g1','$g2','$g3','$g4','$r1','$r2', '$llocationn', '$pperipheryy', '$eevnumberr', '$nnamee', '$mmanufacturerr', '$mmodell', '$ccpuu', '$rramm', '$hhddd', '$ssnn', '$ssystemm', '$llastuserr', '$ccommnett', '$sadmin', '$dateactual', '');";

                    if ($connection->query($sqll) === TRUE) {
                      ?>
                      <div id="myModal" class="modal">
  <div class="modal-content">
      <h2>Rekapitulace uloženého záznamu</h2>
      
      <?
      echo "IP adress ".$_POST["ip"];
      echo "<br>";
      echo "IP adress ".$_POST["ipp"];
      echo "<br>";
      echo "PC name ".$_POST["namee"];
      echo "<br>";
      echo "Location ".$_POST["locationn"];
      echo "<br>";
      echo "Periphery ".$_POST["peripheryy"];
      echo "<br>";
      echo "Ev.number ".$_POST["evnumberr"];
      echo "<br>";
      echo "Manufacturer ".$_POST["manufacturerr"];
      echo "<br>";
      echo "Model ".$_POST["modell"];
      echo "<br>";
      echo "CPU ".$_POST["cpuu"];
      echo "<br>";
      echo "RAM ".$_POST["ramm"];
      echo "<br>";
      echo "HDD ".$_POST["hddd"];
      echo "<br>";
      echo "S/N ".$_POST["snn"];
      echo "<br>";
      echo "OS ".$_POST["systemm"];
      echo "<br>";
      echo "Last user ".$_POST["lastuserr"];
      echo "<br>";
      echo "Comment ".$_POST["commentt"];
      echo "<br>";
      echo "Editor ".$sadmin;
      echo "<br>";
      echo "Date ".$dateactual;
      echo "<br>";
      echo "</h2>";

      ?>
      <button class="color-button" onclick="closeModal()">Home</button>

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
          <input type="hidden" name="location" value="<? echo $llocationn;?>">
         <input class="color-button" type="submit" value="Zpět do evidence <? echo  $llocationn;?>"></div>
        </form>
  </div>
</div>
                      <?
                   echo "<script>
 
                   document.getElementById('myModal').style.display = 'block';
                   function closeModal() {
                   document.getElementById('myModal').style.display = 'none';
                   window.location= 'index.php';
                                         }  
                         </script>";
                  echo '<style>.grid-item{display:none;}</style>';
                  echo '<style>.footer{display:none;}</style>'; 
                            }

                              else {
                                      echo "Error: " . $sqll . "<br>" . $conn->error;
                                        }                          
                                            }
                                                  else {echo "<h2 class='chyba'>Změny nebyly uloženy</h2>\n".$dotaz->error;}                                         
                                                  $dotaz->close();                                                                  
               }
?>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>
</html>

<?php
if (isset($_POST['submit_button'])) {
 
include "checkout.php";
}
?>