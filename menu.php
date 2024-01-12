
<?
session_start();
$admin ="pcr.cz\sad_vh271428";
$adminpass ="Hejnice252333333+";
$sadmin=($_SESSION["username"]);
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, 'cs_CZ.UTF-8');
?>

<ul>  
<img src="./Img/logo-svg2.svg" alt="logo" class="logo">
<li><a href="index.php">HOME</a></li> 
 
  <li><a href="evidence-full.php">EVIDENCE</a></li> 
    <li>ADMIN
    <ul>
    <li>    <a href="./login/register.php">Vytvořit účet</a> </li>
    <li> <a href="Login/reset-password.php" class="btn btn-warning">Reset hesla</a></li>
    <li> <a href="calculator.php" class="btn btn-warning">IP kalkulačka</a></li>
    <li><a href="offline.php">OFFLINE</a></li>
  <!--  <li><a href="scanip.php">SCAN IP ALL !</a></li> -->
   <li><a href="#" id='toggleButton'>Edit tvé IP <? echo $ip ?></a></li>
    </ul>  
    </li>

 <div class="menu-informace">
    <a href="./login/logout.php" class="logoff">Odhlásit uživatele &nbsp;&nbsp;&nbsp;<b>
      <?php echo htmlspecialchars($_SESSION["username"]);    $ipaddress = $_SERVER['REMOTE_ADDR'];?></a><br>
      
<?
  echo "Tvá IP adresa: " . $ipaddress;
  echo "<br>";

$hostnamee = gethostbyaddr($ipaddress); 
Echo "Název PC: " . $hostnamee; 
  ?>
<div id='clock'></div>
<script src="./Js/time.js"></script>

<div id="menu-search">
      <form action="search.php" method="GET">
       <input name="search" type="text" placeholder="Evidence a historie">    
        </form>
        </div>
        </div>