<?php 
require('header.php');
?>
<div class="pc_bureau">
<h2>Détails d'un produit</h2>
<hr>
<div class="row">
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

if(isset($_POST['ajouter_bouton'])){
if(!isset($_SESSION['connecté'])){
?>
<script type="text/javascript">
	alert('veuillez vous connecter');
</script>


<?php
}else{
$quantite_saisie=$_POST['quantite'];
$prod=$_GET['id'];
$verifier=$bdd->prepare("SELECT * FROM produits where quantite_dispo<$quantite_saisie and id=$prod");
$verifier->execute();
if($verifier->rowCount()>0){
	?>
<script type="text/javascript">
	alert('quantite indisponible');
</script>

	<?php
}else{
$client=$_SESSION['id'];
$produit=$_GET['id'];
$verifie=$bdd->prepare("SELECT * from produits_panier where id_produit=$produit and id_client=$client");
$verifie->execute();
if($verifie->rowCount()>0){
	$ajoute_qt=$bdd->prepare("UPDATE produits_panier set quantite=quantite+$quantite_saisie where id_produit=$produit and id_client=$client");
	$ajoute_qt->execute()
;}else{

$inserer=$bdd->prepare("INSERT INTO `produits_panier`(`id_produit`, `id_client`, `quantite`) VALUES ($produit,$client,$quantite_saisie)");
$inserer->execute(); }

?>
<script type="text/javascript">
	alert('produit ajouté au panier ');
</script>

<?php


}


}



}









if(isset($_GET['id'])){ 
$identifiant_sous=$_GET['id'];

$requete1=$bdd->prepare("SELECT * FROM produits WHERE id=$identifiant_sous");
$requete1->execute();
if($requete1->rowCount()>0) {
$tab=$requete1->fetch();
?>
<div class="column" >
    
    <div class="content">
      <img src="<?php echo $tab['photo']; ?>" alt="PC" style="width:100%">
      <h3><?php echo $tab['nom'];?></h3>
      <p>Prix <?php echo $tab['prix'];?>DA </p>

     <center><form method="POST">
	<input type="number" name="quantite" style="height: 30px; border-radius:10px; outline:none;"><br><br>
	<input class="btn_voir_commande" type="submit" name="ajouter_bouton" value="ajouter au panier" ><br><br>
</form></center>
<center><a href="#<?php echo  $tab['id'];?>"><button class="consulter">Détails</button></a></center>
       <div class="modele" id="<?php echo $tab['id'];?>">
        <div class="modele-container">
            <h3><?php echo $tab['nom'];?></h3>
            <img src="<?php echo $tab['photo']; ?>" alt="PC" style="width:50%; height:35%;">
            <center style="background-color:black"><h4 style="color:#fff;" >Caractéristiques</h4></center>
            <table>
            <tr>
            <td>Processeur:</td>
            <td><?php echo $tab['processeur'];?></td>
            </tr>

            <tr>
            <td>RAM:</td>
            <td><?php echo $tab['ram'];?></td>
            </tr>
            <tr>
            <td>Disque dur:</td>
            <td><?php echo $tab['disque'];?></td>
            </tr>
            <tr>
            <td>OS installé:</td>
            <td><?php echo $tab['os'];?></td>
            </tr>
            <tr>
            <td>Écran:</td>
            <td><?php echo $tab['ecran'];?></td>
            </tr>
            </table>
            <center><a href="#modele-close"><button class="consulter">Fermer</button></a></center>
        </div>
    </div>
      
      
    
     
      
       
      </div>

      </div>



<?php
 }} ?>

</div>

</div>
</body>
<?php require 'footer.php'; ?>
</html>