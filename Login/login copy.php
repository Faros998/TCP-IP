
<?php


// Initialize the session
session_start();
 
// Pokud je uživatel již přihlášen, přesměruj ho na uvítací str
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
    header("location: ../home.php");
    exit;
}
 
// Zahrnutí konfiguračního souboru
require_once "connection_database.php";
 
// Definice proměnných a inicializace s prázdnými hodnotami
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Zpracování dat z formuláře po odeslání
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   // Kontrola, zda uživatelské jméno je vyplněné
    if(empty(trim($_POST["username"]))){
        $username_err = "Napiš jméno";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Kontrola, zda heslo je vyplněné
    if(empty(trim($_POST["password"]))){
        $password_err = "Napiš heslo";
    } else{
        $password = trim($_POST["password"]);
    }
    
      // Ověření přihlašovacích údajů
    if(empty($username_err) && empty($password_err)){
        // Příprava dotazu pro výběr uživatele a jeho roli
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
             // Přiřazení proměnných k připravenému výrazu jako parametry
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
           // Nastavení parametrů
            $param_username = $username;
            
           // Pokus o provedení připraveného výrazu
            if(mysqli_stmt_execute($stmt)){
              // Uložení výsledku
                mysqli_stmt_store_result($stmt);
                
                // Kontrola, zda uživatelské jméno existuje a ověření hesla
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   // Přiřazení proměnných výsledků
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                        // Heslo je správné, začátek nové relace
                            session_start();
                            
                         // Uložení dat do relačních proměnných
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["role"] = $role;
                         // Podle role přesměruj uživatele na odpovídající stránku
                         if ($role === 'admin') {
                            header("location: ../home.php");
                        } elseif ($role === 'editor') {
                            header("location: ../editor_home.php");
                        } else {
                            header("location: ../evidence.php");
                        }
                        exit;
                    } else{
                        // Heslo není platné, zobrazení obecné chybové zprávy
                        $login_err = "Špatné ID nebo heslo";
                    }
                }
            } else{
                // Uživatelské jméno neexistuje, zobrazení obecné chybové zprávy
                $login_err = "Špatné ID nebo heslo";
            }
        } else{
            echo "Oops! Něco se pokazilo, opakuj akci později";
        }
        
            // Uzavření přípravného výrazu
            mysqli_stmt_close($stmt);
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/login.css">
    
</head>
<body>


<img class="img logo_login" src="../Img/svg2.svg"
  width="500"  alt="Image…">
    <div class="wrapper">
   
       
        <p>Přihlaš se svým účtem</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     
            <div class="form-group">
                
                
               <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="ID" >
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
               
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Heslo">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary" value="Přihlásit"><br><br><br><br>
            </div>
          
        </form>
    </div>
 
</body>
<footer><?php include "footer.php"; ?></footer>
</html>