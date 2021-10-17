<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

if(isset($_POST['boutonproduit'])){
  
         
$existe="";
$idous=$_POST['liste'];
$idmarque=$_POST['liste2'];
$photo=$_POST['image'];
$prix=$_POST['prix'];
$nom=$_POST['produit'];
$processeur=$_POST['processeur'];
$ram=$_POST['ram'];
$os=$_POST['os'];
$ecran=$_POST['ecran'];
$disque=$_POST['disque'];
$err_vide="";
$qt=$_POST['qt'];
if(!empty($prix) and !empty($nom) and !empty($qt)){

$verifie=$bdd->prepare("SELECT * FROM produits where nom='$nom'");
$verifie->execute();
if($verifie->rowCount()>0){
	$existe="ce produit existe deja";
}else{


     try{   $req = $bdd->prepare("INSERT INTO produits(id_sous_categorie, marque, quantite_dispo,photo, nom, prix, processeur, ram, disque, os, ecran) VALUES('$idous','$idmarque','$qt','$photo','$nom',$prix,'$processeur','$ram','$disque','$os','$ecran')");

       if( $req -> execute()){
?>
<script type="text/javascript">
/*  alert('produit ajouté!');*/
 
</script>

<?php }


    }catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
}
}

   }else{
   	$err_vide="veuillez au moins remplir les champs designation,prix,quantite";
   } 
}
    ?>

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


<div class='ajouter_panier'>
<h2>Ajouter des produits</h2>
<hr>

<div class="formajouter" align="center">
<?php
           if (isset($erreur)){
           echo '<br>'.$erreur.'<br>';
           }
           ?><br>
           <h3><center><?php if(isset($_POST['boutonproduit'])){ echo $err_vide; echo $existe;}?></center></h3>
<form  method="post">
<table>
<tr>
<td><label for="image">URL de l'image:</label></td>
<td><input type="text" id="image" name="image" placeholder="Entrez l'URL de l'image"></td>
</tr>

<tr>
<td><label for="produit">Nom du produit:</label></td>
<td><input type="text" id="produit" name="produit" placeholder="Entrez le nom du produit"></td>
</tr>

<tr>
<td><label for="prix">Prix du produit:</label></td>
<td><input type="number" id="prix" name="prix" placeholder="Entrez le prix du produit"></td>
</tr>

<tr>
<td><label for="liste">type</label></td>
<td><select name="liste">
<?php $souscat=$bdd->prepare("SELECT * FROM sous_categorie");
$souscat->execute();
while($sous=$souscat->fetch()){

?><option value="<?php echo $sous['id_sous_categorie'];?>"><?php echo $sous['designation'];?></option><?php


}
?>

</select></td>
</tr>

<tr>
<td><label for="liste">Marque du produit:</label></td>
<td><select name="liste2">
<?php $marque=$bdd->prepare("SELECT * FROM marque");
$marque->execute();
while($mq=$marque->fetch()){

?><option value="<?php echo $mq['id_marque'];?>"><?php echo $mq['designation'];?></option><?php


}
?>
</select></td>
</tr>
<tr>
<td><label for="qt">quantite:</label></td>
<td><input type="number" id="qt" name="qt"></td>
</tr>
<tr>
<td><label for="processeur">Processeur:</label></td>
<td><input type="text" id="processeur" name="processeur" placeholder="Entrez le nom du processeur"></td>
</tr>
<tr>
<td><label for="ram">Mémoire vive (RAM):</label></td>
<td><input type="text" id="ram" name="ram" placeholder="Entrez la capcité de la mémoire vive"></td>
</tr>
<tr>
<td><label for="disque">Disque dur:</label></td>
<td><input type="text" id="disque" name="disque" placeholder="Entrez le nom du disque dur"></td>
</tr>
<tr>
<td><label for="os">OS installé:</label></td>
<td><input type="text" id="os" name="os" placeholder="Entrez le OS installé"></td>
</tr>
<tr>
<td><label for="ecran">Écran:</label></td>
<td><input type="text" id="ecran" name="ecran" placeholder="Entrez la taille de l'écran"></td>
</tr>

</table>

<br>
<input type="submit" name="boutonproduit" value="Ajouter le produit">
</form>
</div>
</div>
</body>
<?php require 'footer.php'; ?>
</html>