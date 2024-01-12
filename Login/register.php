<?php

require_once "connection_database.php";
 
// Definujte proměnné a inicializujte je s prázdnými hodnotami
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Zpracování údajů formuláře při odeslání formuláře
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Ověření uživatelského jména
    if(empty(trim($_POST["username"]))){
        $username_err = "Zadej jméno";
    } elseif(!preg_match('/^[a-zA-Z0-9_ěščřžýáíéúůďťňĚŠČŘŽÝÁÍÉÚŮĎŤŇ]+$/', trim($_POST["username"]))){
        $username_err = "Uživatelské jméno může obsahovat pouze písmena, čísla a podtržítka.";
    } else{
       
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Proměnné na připravený příkaz jako parametry
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Uložení hodnoty
            $param_username = trim($_POST["username"]);
            
            // Provedení uloženého příkazu
            if(mysqli_stmt_execute($stmt)){
                /* uložený výsledek */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Toto uživatelské jméno je již obsazeno.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Jejda! Něco se pokazilo. Prosím zkuste to znovu později.";
            }

            // Ukončení příkazu
            mysqli_stmt_close($stmt);
        }
    }
    
    // Heslo
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Heslo musí mít alespoň 6 znaků.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Ověření hesla
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Prosím potvrďte heslo.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Heslo se neshoduje.";
        }
    }
    
    // Před vložením do databáze zkontrolujte vstupní chyby
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
       
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Proměnné na připravený příkaz jako parametry
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Uložení hodnot
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Provedení příkazu
            if(mysqli_stmt_execute($stmt)){
                // přesměrování
                header("location: login.php");
            } else{
                echo "Jejda! Něco se pokazilo. Prosím zkuste to znovu později.";
            }

          // Ukončení příkazu
            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($connection);
}
?>
 
 <!DOCTYPE html>

<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrace</title>
  <link rel="stylesheet" href="../Css/login.css">
  <link rel="icon" href="../Img/logo-ico.ico" type="image/x-ico">

<body>

<body>
<img class="img logo_login" src="../Img/svg2.svg"
  width="500"  alt="Image…">
    <div class="wrapper">
   
        <b>Registrace nového uživatele</b><br><br> 

      
   
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">    
        <div class="form-group">
                <label>Příjmení &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div> 
                <div class="form-group">
                <label>Heslo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div> 
                <div class="form-group">
                <label>Ověření hesla </label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div> 
                <div class="form-group">
                <input  class="btn btn-primary" type='button' onClick="parent.location='../index.php'"value='Exit'>
              
                <input type="reset" class="btn btn-primary" value="Reset">
                <input type="submit" class="btn btn-primary" value="Odeslat">
</div>

         
            </div>
        </form>
        </div>

        

    
</body>
</html>