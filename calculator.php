<!DOCTYPE html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./Css/style.css">
</head>
        <body>
            <?php include "./Class/class_cal.php"; ?>        
            <div id="up">
                <header>IP kalkulačka</header>
                    <nav><?php include "menu.php"; ?></nav>
                        <article>
                            <div><h1> Výpočet sítě </h1><br>
                            </div>
                                <img src="./Img/kab.svg" alt="logo" widht="200" class="logo-background"> 
                                <div id="offline_search_grid">
                                    <div id="offline-search">
                                    <form action='calculator.php' method='GET'>
                                        <h2> Zadej IP sítě a prefix</h2>   <input type='text' name ='ipAddress' >
                                            <select class="select-calculator" name='cidr'>
                                                <option value=''>--</option>
                                                <option value='23'>255.255.254.0 /23</option>
                                                <option value='24'>255.255.255.0 /24</option>
                                                <option value='25'>255.255.255.128 /25</option>
                                                <option value='26'>255.255.255.192 /26</option>
                                                <option value='27'>255.255.255.224 /27</option>
                                                <option value='28'>255.255.255.240 /28</option>
                                            </select>
                                            <input class="color-button" type='submit' value='Spočitej'>
                                    </form>  
                                </div>
            <?php
            $ipAddress = $_GET["ipAddress"];
            $cidr = $_GET["cidr"];
                $ipAddress = $_GET["ipAddress"];
                $cidr = $_GET["cidr"];
                if (isset($_GET["cidr"]) && ($_GET["ipAddress"])){
                    $networkCalculator = new NetworkCalculator($ipAddress, $cidr);
                    $result = $networkCalculator->calculateNetwork();
                    echo " <h1 style='text-align:center;'>";
                    echo "Výsledek pro: " .$ipAddress ." prefix/".$cidr ."<br><br>";
                    echo "Síť: " . $result['Network'] . "<br>";
                    echo "Broadcast: " . $result['Broadcast'] . "<br>";
                    echo "Maska: " . $result['Mask'] ." / " .$cidr ."<br>";
                    echo "Brána: " . $result['Gateway'] . "<br>";
                    echo "Z toho použitelných: " . $result['UsableIPs'] . "<br>";
                    }
            ?>
        </body>
<footer><?php include "footer.php"; ?></footer>