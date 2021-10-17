<?php
session_start();
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
 <style type="text/css">
   .login-box{
    display: <?php if(isset($_SESSION['connecté'])){ echo "none"; } ?>
   }
 </style>

 <!--boody-->
  <body>

    <header role="header">
      <nav class="menu" role="navigation">
          <div class="inner">
              <div class="m-left">
                  <h3 class="logo">InfoAddict<span>Shop</span></h3>
 
              </div>
             





              <div class="m-right">


       
<?php if(isset($_SESSION['connecté'])){
?>
<a href="votre_panier.php" class="c-link"><i class="fas fa-shopping-cart"></i>Panier</a>
<a href="client.php" class="c-link"><i class="far fa-user"></i>Compte</a>

<a href="deconnexion.php" class="c-link"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>

<?php
} else{?>


<a href="#" class="c-link" onClick="alert('veuillez vous connecter');"><i class="fas fa-shopping-cart"></i> Panier</a>
<a href="#" class="c-link" id="conn"><i class="far fa-user"></i> connexion</a>
<?php } ?>


              
                 </div>
              
             
                 <div class="header-searchbar">
             <form method="POST">
                  <input  type="text" name="p_nom" class="searchbar" placeholder="Recherche d'un produit..">
                  <button class="btn" name="rechercher"><i class="fas fa-search"></i></button> 
           </form>
         </div>

          </div>
      </nav>

      <div class="navbar"> 
              
        <nav class="navmenu">
              <ul>
              
                <li><a class="n-link" href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
                <li> <a class="n-link" href="#"><i class="fas fa-stream"></i>  Catégories <i class="fas fa-caret-down"></i></a>
                     <ul>
                      <?php 

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

$Catg=$bdd->prepare('SELECT * from categorie');
                      $Catg->execute();
while($cat=$Catg->fetch()){
  ?>
<li><a class="n-link"> <?php echo $cat['designation'];?> <i class="fas fa-caret-right"></i></a>
 <ul><?php  $ctt=$cat['id_categorie'];
 $souscat=$bdd->prepare("SELECT * FROM sous_categorie where id_categorie=$ctt");
  $souscat->execute();

  while($sc=$souscat->fetch()){
?><li><a class="n-link" href="catalogue.php?sous=<?php echo $sc['id_sous_categorie'];?>"> <?php echo $sc['designation'];?> </a></li>
<?php

} ?>
 </ul>
  <?php

}
                      ?>
            

                     
                       </li></ul>
                </li>
                
                <li><a class="n-link" href="#"><i class="far fa-registered"></i>  Marque <i class="fas fa-caret-down"></i></a>
                <ul>
               <?php $marque=$bdd->prepare("SELECT * FROM marque");
               $marque->execute();
               while($mq=$marque->fetch()){
                ?>
<li><a class="n-link" href="catalogue.php?marque=<?php echo $mq['id_marque'];?>">  <?php echo $mq['designation'];?></a></li>

                <?php
               } ?>
                </ul>
                
                </li>
                <?php if(isset($_SESSION['connecté'])){ ?><li><a class="n-link" href="minichat_client.php"><i class="fas fa-user-edit"></i>  Contact</a></li><?php } ?>



              </ul>      
        </nav>

  </header>
  <script src="site.js" charset="utf-8"></script>
<!----------------------CONNEXION------------------------------>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

//code de recherche
if(isset($_POST['rechercher'])){
  $nomp=$_POST['p_nom'];
  $nomp1=strtoupper($nomp);
  $recherche=$bdd->prepare("SELECT id,nom FROM produits where nom='$nomp' or nom='$nomp1'");
  $recherche->execute();
  if($recherche->rowCount()>0){
  $r=$recherche->fetch();
      $id_rech=$r['id'];
      ?>

<script type="text/javascript">
  window.location.href='details.php?id=<?php echo $id_rech;?>';
</script>


      <?php
    
  }else{
    ?>
<script type="text/javascript">
  alert('aucun resultat');
</script>


    <?php
  }
}












if(isset($_POST['formconnexion'])){
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1( $_POST['mdpconnect']);

    if (!empty($mailconnect) AND !empty($mdpconnect)){
     
        $requser = $bdd -> prepare("SELECT * FROM clients WHERE mail = ? AND motdepasse = ?");
        $requser -> execute(array($mailconnect, $mdpconnect));
        $userexist = $requser -> rowCount();
        if ($userexist == 1){
             session_start();
              $userinfo = $requser -> fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['mail'] = $userinfo['mail'];
$_SESSION['connecté']=true;
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
        <a href="inscription.php" class="textc" >Créer un compte</a><br>
        <a href="admin_connexion.php" class="textc" style="color:#fff;">Espace administrateur</a>
    </form>
</div>
<script src="form.js" charset="utf-8"></script>
<!--------------------------------------------------------------->