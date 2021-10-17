<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="main_admin.php">
    <!--css--> 
    <link rel="stylesheet" type="text/js" href="src/js/main.js">
	  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css"> 
	  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>
    <title>test</title>
</head>
<body style="background: #ecf0f1;">
<header role="header">
      <nav class="menu" role="navigation">
          <div class="inner">
              <div class="m-left">
                  <h3 class="logo">InfoAddict<span>Shop</span></h3>
              </div>
            </div>
      </nav>
</header>
<?php
$erreur = null;
if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
       if ($_POST['pseudo'] === 'tarik' && $_POST['password'] === "12345678"){
           session_start();
           $_SESSION['connecte'] = 1;
           header('Location: admin_client.php');
       
}else{
       $erreur = '<i class="fas fa-exclamation-triangle"></i> Identifiant incorrect';
}
}
function est_connecte() : bool{
    if (session_status() === PHP_SESSION_NONE){
    session_start();
}
    return !empty($_SESSION['connecte']);
}

function forcer_utilisateur_connecte(): void {
    if(! est_connecte()){
        header('Location: admin_connexion.php');
        exit();
        }
    }

if (est_connecte()){
    header('Location: admin_client.php');
    exit();
}
?>
<div class="cnx_admin" align="center">
<h2>accédez à votre espace</h2>
<br>
<div class='erreur'>
     <?php echo $erreur ?>
  </div>
  
  <br>
<form action="" method="post">
<table>
<tr>
<td><label>Nom administrateur:</label></td>
<td><input type="text" name="pseudo" placeholder="entrez votre pseudo"><br><br></td>
</tr>
<tr>
<td><label>Mot de passe:</label></td>
<td><input type="password" name="password" placeholder="entrez votre mot de passe"><br><br></td>
</tr>
</table>
    <button type="submit" class="bouton">Se connecter</button>

</form>
</div>

</body>
</html>