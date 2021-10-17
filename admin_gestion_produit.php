<?php
require "header_admin.php"; 
?>
<div class='gestion_produit'>
<h2>Gestion produit</h2>
<hr>
<form action="admin_ajouter_produit.php" method="post">
<input type="submit" value="Ajouter un produit">
</form>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

?>
<br><br><br>
<table border="1px" width="100%">
 <tr>
 <td><strong>Image</strong></td>
 <td><strong>Produit</strong></td>
 <td><strong>Prix</strong></td>
 <td><strong>categorie  disponible</strong></td>

 <td><strong>Action</strong></td>
 <td><strong>Action</strong></td>
 

 
 </tr>
 
 <?php if(isset($_GET['sous'])){ 
$identifiant_sous=$_GET['sous'];

$requete1=$bdd->prepare("SELECT * FROM produits WHERE id_sous_categorie=$identifiant_sous"); }
if(isset($_GET['marque'])){
	$identifiant_sous=$_GET['marque'];

$requete1=$bdd->prepare("SELECT * FROM produits WHERE id_sous_categorie=$identifiant_sous");
}
$requete1->execute();
if($requete1->rowCount()>0) {
	while($donnees=$requete1->fetch()){
     ?>
 <tr>
 <td ><img src="<?php echo $donnees['photo']; ?>" style="width:20%; height:20%; padding:0;"></td>
 <td ><?php echo $donnees['nom']; ?></td>
 <td ><?php echo $donnees['prix']; ?>DA</td>
 <td><?php echo $donnees['quantite_dispo']; ?></td>

 <td><a href="supp_produit_admin.php?id=<?php echo $donnees['id']; ?>&<?php if(isset($_GET['marque'])){ echo 'marque='.$_GET['marque'];}else{ echo 'sous='.$_GET['sous'];}?>"><strong>Supprimer</strong></a></td>
 <td><a href="mod_produit_admin.php?id=<?php echo $donnees['id']; ?>&<?php if(isset($_GET['marque'])){ echo 'marque='.$_GET['marque'];}else{ echo 'sous='.$_GET['sous'];}?>"><strong>Modifier</strong></a></td>
 </tr>
 <?php 
}}


?>
</table>   
</div>
</body>
<?php require 'footer.php'; ?>
</html>