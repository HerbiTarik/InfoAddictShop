<?php
require('header.php');
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

if(isset($_POST['forminscription'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    $tel=$_POST['tel'];
    $adrs=$_POST['adrs'];


    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])){
        
       

        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 30){
            $nomlength = strlen($nom);
        if ($nomlength <= 30){
            $prenomlength = strlen($prenom);
            if ($prenomlength <= 30){
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)){

                  $reqmail = $bdd-> prepare("SELECT * FROM clients WHERE mail=?");
                  $reqmail -> execute (array($mail));
                  $mailexist = $reqmail -> rowCount();

                  if ($mailexist == 0){
$reqp = $bdd-> prepare("SELECT * FROM clients WHERE pseudo=?");
                  $reqp -> execute (array($pseudo));
                  $pseudoexist = $reqp -> rowCount();
if($pseudoexist==0){


$reqtel = $bdd-> prepare("SELECT * FROM clients WHERE tel=?");
                  $reqtel -> execute (array($tel));
                  $telexist = $reqtel -> rowCount();
if($telexist == 0)
{

                     if ($mdp == $mdp2){
                     
                        $req = $bdd->prepare("INSERT INTO clients(pseudo, nom, prenom, mail, motdepasse, adresse, telephone) VALUES(?,?,?,?,?,?,?)");
                        $req -> execute(array($pseudo,$nom,$prenom,$mail,$mdp,$adrs,$tel));
                                     $requser = $bdd -> prepare("SELECT * FROM clients WHERE pseudo = ? AND motdepasse = ?");
        $requser -> execute(array($pseudo, $mdp));
        $userexist = $requser -> rowCount();
           $userinfo = $requser -> fetch();
                        $_SESSION['id'] = $userinfo['id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['mail'] = $userinfo['mail'];
$_SESSION['connecté']=true;
?>
<script type="text/javascript">
  window.location.href='client.php';
</script>
<?php
                        
                     }else{
                       $erreur = '<i class="fas fa-exclamation-triangle"></i> Vos mots de passes ne correspondent pas!';
                     }
}else{
     $erreur = '<i class="fas fa-exclamation-triangle"></i> le nummero de telephone existe deja!';
}
}else{
  $erreur = '<i class="fas fa-exclamation-triangle"></i>le pseudo existe deja!';
}







                    }else{
                        $erreur = '<i class="fas fa-exclamation-triangle"></i> l email existe deja';
                    }

                }else{
                    $erreur = '<i class="fas fa-exclamation-triangle"></i> Votre adresse mail n\'est pas valide';
                }
        }else{
            $erreur = '<i class="fas fa-exclamation-triangle"></i> Votre prénom ne doit pas dépasser 30 caractères';
        }
        }else{
            $erreur = '<i class="fas fa-exclamation-triangle"></i> Votre nom ne doit pas dépasser 30 caractères';
        }
        }else{
            $erreur = '<i class="fas fa-exclamation-triangle"></i> Votre pseudo ne doit pas dépasser 30 caractères';
        }

    }else{
        $erreur = '<i class="fas fa-exclamation-triangle"></i> Tous les champs doivent etre complétés';
    }
}
?>
<!DOCTYPE html>
<html>

 <!--head--> 
 <head>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> mon site</title>
	  <!--css-->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="main.php">
    <!--css--> 
    <link rel="stylesheet" type="text/js" href="src/js/main.js">
	  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css"> 
	  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>
  </head>
 

 <!--boody-->
  <body style="background: #ecf0f1;">

   
  <script src="site.js" charset="utf-8"></script>
<!----------------------CONNEXION------------------------------>
<?php


if(isset($_POST['formconnexion'])){
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1( $_POST['mdpconnect']);

    if (!empty($mailconnect) AND !empty($mdpconnect)){
     
        $requser = $bdd -> prepare("SELECT * FROM clients WHERE mail = ? AND motdepasse = ?");
        $requser -> execute(array($mailconnect, $mdpconnect));
        $userexist = $requser -> rowCount();
        if ($userexist == 1){
             
              $userinfo = $requser -> fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['mail'] = $userinfo['mail'];

              header('Location: client.php?id=' .$_SESSION['id']);


        }else{
            $text ='<i class="fas fa-exclamation-triangle"></i> Compte non existant!';
            ?>
            <script>
                alert ('Compte non existant!');
            </script>
            <?php
        }

}else{
        $text ='<i class="fas fa-exclamation-triangle"></i> Tous les champs doivent <br> etre complétés!';
        ?>
        <script>
                alert ('Tous les champs doivent etre complétés!');
        </script>
        <?php
    }
}
?>
<div class="login-box">
    <div class="hide-login-btn"><i class="fas fa-times"></i></div>

    <form class="login-form" action="" method="post" >
        <h2>CONNEXION</h2>
        <div id="error_message">
        <?php
             if (isset($text)){
              echo $text;
            }
        ?> 
        </div>
        <input class="textb" type="email" name="mailconnect" placeholder="Mail" id="mail">
        <input class="textb" type="password" name="mdpconnect" placeholder="Mot de passe" id="password">
        <a href="#" ><input class="login-btn" type="submit" name="formconnexion" value="Login"></a><br>
        <a href="inscription.php" class="textc" >Créer un compte</a>
    </form>
</div>
<script src="form.js" charset="utf-8"></script>
<!--------------------------------------------------------------->

      <div align='center' class="inscription">
          <h2>Inscription</h2>
          <?php
           if (isset($erreur)){
           echo '<br>'.$erreur;
           }
           ?>
           
           <br> 
          <br>
      <form action="" method="post">
          <table>
          <tr>
            <td><label for="pseudo">Pseudo:</label></td>
              <td class="case"><input type="text" placeholder="Tapez votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>"required></td>
          </tr>
          <tr>
            <td><label for="pseudo">Nom:</label></td>
              <td class="case"><input type="text" placeholder="Tapez votre nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;} ?>"required></td>
          </tr>
          <tr>
            <td><label for="pseudo">Prénom:</label></td>
              <td class="case"><input type="text" placeholder="Tapez votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>"required></td>
          </tr>
          <tr>
              <td ><label for="adrs">Adresse: </label></td>
              <td class="case"><input type="text" placeholder="votre adresse..." id="addrs" name="adrs" value="<?php if(isset($adrs)) {echo $adrs;} ?>"required></td>
          </tr>
          <tr>
              <td ><label for="tel">Téléphone: </label></td>
              <td class="case"><input type="number"  id="telephone" name="tel" value="<?php if(isset($tel)) {echo $tel;} ?>"required></td>
          </tr>
          <tr>
              <td ><label for="mail">Mail:</label></td>
              <td class="case"><input type="mail" placeholder="Tapez votre mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;} ?>"required></td>
          </tr>
           
         
           
           <tr>
              <td><label for="mdp">Mot de passe:</label></td>
              <td class="case"><input type="password" placeholder="Tapez votre mot de passe" id="mdp" name="mdp"required></td>
          </tr>
          <tr>
              <td ><label for="mdp2">Confirmation du mot de passe:</label></td>
              <td class="case"><input type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2"required></td>
          </tr>
          
        </table>
          
            
              <td><br><input class='bouton' type="submit" name="forminscription" value="Je m'inscris"></td>
            
          
      </form>
    
</div>
    
</body>
<?php require 'footer.php'; ?>
</html>