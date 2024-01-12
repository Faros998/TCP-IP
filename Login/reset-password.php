<?php
session_start();
 
// KOntrola, zda je uživatel přihlášen, jinak přesměrujte na přihlašovací stránku
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
require_once "connection_database.php";
 
// Definujte proměnné a inicializujte je s prázdnými hodnotami
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Zpracování údajů formuláře při odeslání formuláře
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Ověření nového hesla
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Zadej nové heslo";     
    } elseif(strlen(trim($_POST["new_password"])) < 1){    
        $new_password_err = "Heslo musí mít 6 znaků";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    //Potvrzení hesla
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Zadej ověření hesla";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Heslo se neshoduje";
        }
    }
        
    // Před aktualizací databáze zkontrolujte vstupní chyby
    if(empty($new_password_err) && empty($confirm_password_err)){
      
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Proměnné na připravený příkaz jako parametry
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Uložení hodnot
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Provedení příkazu
            if(mysqli_stmt_execute($stmt)){
                // Heslo bylo úspěšně aktualizováno. Zničte relaci a přesměrujte na přihlašovací stránku
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Něco se pokazilo, zkus to znovu";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($connection);
}
?>
 
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Reset hesla</title>
    <link rel="stylesheet" href="../Css/login.css">
    <link rel="icon" href="../Img/logo-ico.ico" type="image/x-ico">
</head>
<body>
<img class="img logo_login" src="../Img/svg2.svg"
  width="500"  alt="Image…">
    <div class="wrapper">
        <b>Reset hesla</b><br><br><br>
      
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Nové heslo&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Ověření hesla</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Změnit">
                <input  class="btn btn-primary" type='button' onClick="parent.location='../index.php'"value='Exit'>
            </div>
        </form>
    </div>    
</body>
</html>