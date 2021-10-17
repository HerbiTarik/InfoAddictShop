<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');


$reponse = $bdd -> query('SELECT * FROM produits WHERE id= '.$_GET['id']);
$produit = $reponse -> fetch();

require_once 'panier.php';
$panier = new Panier('produits');

$qte=1;
if($produitPanier = $panier -> get($_GET['id'])){
    $qte = $produitPanier['qte'];
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

    <header role="header">
      <nav class="menu" role="navigation">
          <div class="inner">
              <div class="m-left">
                  <h3 class="logo">InfoAddict<span>Shop</span></h3>
              </div>
              <div class="m-right">
                  <a href="deconnexion.php" class="c-link"><i class="far fa-user"></i> Déconnexion</a>
                  <a href="#" class="m-link"><i class="fas fa-shopping-cart"></i> Panier</a>
              </div>
              <div class="m-nav-toggle">
                  <span class="m-toggle-icon"></span>
              </div>
              <div class="header-searchbar">
                  <input  type="text" class="searchbar" placeholder="Recherche d'un produit..">
                  <button class="btn"><i class="fas fa-search"></i></button> 
              </div>
             

          </div>
      </nav>

      <div class="navbar">
        <nav class="navmenu">
              <ul>
                <li><a class="n-link" href="site.php"><i class="fas fa-home"></i>  Accueil</a></li>
                <li> <a class="n-link" href="#"><i class="fas fa-stream"></i>  Catégories <i class="fas fa-caret-down"></i></a>
                     <ul>
                      <li><a class="n-link" href="#"> Ordinateurs <i class="fas fa-caret-right"></i></a>
                        <ul>
                          <li><a class="n-link" href="#"> Bureau </a></li>
                          <li><a class="n-link" href="#"> Portable </a></li>
                          <li><a class="n-link" href="#"> Gamer </a></li>
                        </ul>
                        </li >
                      <li><a class="n-link" href="#">Accessoires <i class="fas fa-caret-right"></i></a></li>
                      <li><a class="n-link" href="#"> </a></li>
                    
                     </ul>
                </li>
                <li><a class="n-link" href="#"><i class="fas fa-user-edit"></i>  Contact</a></li>
                <li><a class="n-link" href="#"><i class="fas fa-pen"></i>  A propos</a></li>
              </ul>      
        </nav>

  </header>
  <script src="site.js" charset="utf-8"></script>
<div class='quantiteproduit'>
<h2>Quantité du produit</h2>
<hr>
<br><br>
<div align="center" class='quantite'>

<table>
<tr>
<td><p>Produit: </p></td>
<td><p><?php echo '<strong>'.$produit['nom'].'</strong>'; ?> </p></td>
</tr>
<tr>
<td><p>Prix du produit: </p></td>
<td><p><?php echo '<strong>'.$produit['prix'].'</strong>';?> <strong>DA</strong></p></td>
</tr>


<form class='formquantite' action="ajouter_panier.php" method="post"> 
<tr>
<td><p><label>Quantité: </label></p></td>
<td><p><input type="text" name="qte" value="<?php echo $qte ?>" /></p></td>
</tr>
</table>
<br><br>
<p>
<input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
<input type="submit" value="Ajouter au panier">
</p>
</form>
</div>
</div>
<?php require 'footer.php'; ?>
</body>
</html>
