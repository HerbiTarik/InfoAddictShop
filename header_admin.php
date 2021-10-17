<?php
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
forcer_utilisateur_connecte();
?>
<!DOCTYPE html>
<html lang="en">
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
<script src="form.js" charset="utf-8"></script>
    <title>Admin</title>
</head>
<style type="text/css">


</style>
<body>
<header role="header">
      <nav class="menu" role="navigation">
          <div class="inner">
              <div class="m-left">
                  <h3 class="logo">InfoAddict<span>Shop</span></h3>
              </div>
              <div class="m-right">
                  <?php if (est_connecte()): ?>
                  <a href="admin_deconnexion.php" class="c-link"><i class="far fa-user"></i> Déconnexion</a>
                  <?php endif ?>
              </div>
            </div>
            
      </nav>
      <div class="navbar">
        <nav class="navmenu">
              <ul>
                <li><a class="n-link" href="gestion_client_admin.php">Client</a></li>
               





                       
                <li><a class="n-link" href="#">Produit</a> 
                <ul>
                <li><a class="n-link" href="admin_ajouter_produit.php">ajouter un produit</a>
                <li><a class="n-link" href="#">Modifier/Supprimer</a>
                <ul>
                <li><a class="n-link" href="#"></i>Depuis marque</a>
                <ul>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
                $marque=$bdd->prepare("SELECT * FROM marque");
               $marque->execute();
               while($mq=$marque->fetch()){
                ?>
                <li><a class="n-link" href="admin_gestion_produit.php?marque=<?php echo $mq['id_marque'];?>"><i class="fas fa-user-edit"></i>  <?php echo $mq['designation'];?></a></li>

                <?php
               } ?>
                </ul>
                
                </li>   
                
                <li> <a class="n-link" href="#">Depuis catégories </a>
                <ul>
                      <?php 



$Catg=$bdd->prepare('SELECT * from categorie');
                      $Catg->execute();
while($cat=$Catg->fetch()){
  ?>
<li><a class="n-link"> <?php echo $cat['designation'];?> <i class="fas fa-caret-right"></i></a>
 <ul><?php  $ctt=$cat['id_categorie'];
 $souscat=$bdd->prepare("SELECT * FROM sous_categorie where id_categorie=$ctt");
  $souscat->execute();

  while($sc=$souscat->fetch()){
?><li><a class="n-link" href="admin_gestion_produit.php?sous=<?php echo $sc['id_sous_categorie'];?>"> <?php echo $sc['designation'];?> </a></li>
<?php

} ?>
                </ul>
  <?php

}
?>
</li>  </ul>

                </ul>
                </li>
                </ul>
                </li> 


                <li><a class="n-link" href="gestion_commandes.php">Commandes</a></li>  
                    <li><a class="n-link" href="gestion_categorie.php">Categorie</a>
<ul>
         <li><a class="n-link" href="gestion_categorie.php">voir les categorie</a></li>  
         <li><a class="n-link" href="ajouter_categorie.php">ajouter une categorie</a></li>  
</ul>

                    </li>        
                <li><a class="n-link" href="admin_message.php">Messages</a></li>


              </ul>      
        </nav>

</header>