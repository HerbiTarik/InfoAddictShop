<?php require('header_admin.php');
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
if(isset($_POST['confirmer']))
{
	$idocnf=$_POST['id_com_conf'];
	$etat=$bdd->prepare("UPDATE commande set etat='confirmée' where id_commande=$idocnf");
	$etat->execute();
	$confirmer=$bdd->prepare("SELECT * FROM produits_commandes where id_commande=$idocnf");
	$confirmer->execute();
	while($conf=$confirmer->fetch()){

		$conf_pr=$conf['id_produit'];
		$qte=$conf['quantite'];
		$decremente=$bdd->prepare("UPDATE produits set quantite_dispo=quantite_dispo-$qte where id=$conf_pr");
		$decremente->execute();
		?>

<script type="text/javascript">
	alert('commande confirmée ');
</script>

		<?php
	}

}
?><div style="margin-top: 200px">
<div class="gestion_commande">
<h2>Gestion commandes</h2>
<hr>
<?php
 $commandes=$bdd->prepare("SELECT * FROM commande");
  $commandes->execute();
  if($commandes->rowCount()>0){
    while($com=$commandes->fetch()){

?>


<table border="1px" width="100%" >
  <tr style="background: gray;">
<td><strong>numéro de la commande</strong></td>
<td><strong>adresse de livraison</strong></td>
<td><strong>montant</strong></td>
<td><strong>etat</strong></td>
<td><strong>date</strong></td>
  </tr>
  
  <tr>
<td><?php echo $com['id_commande'];?></td>
<td><?php echo $com['adresse'];?></td>
<td><?php echo $com['montant'];?></td>
<td><?php echo $com['etat'];?></td>
<td><?php echo $com['date'];?></td>
<td><form method="POST">
<input type="hidden" name="id_com_conf" value="<?php echo $com['id_commande'];?>">

<input class="btn_commande" type="submit" name="confirmer" value="confirmer cette commande">

</form>
</td>
</tr>
</table>
<?php //code affichage des produits commandés
$id_commande=$com['id_commande'];
$produit_com=$bdd->prepare("SELECT * FROM produits_commandes where id_commande=$id_commande");
$produit_com->execute();?>
<table border="1px" width="50%">
<tr><td colspan="4" style="background: gray;color:white;"><strong>les produits commandés</strong></td></tr>
<tr style="background: gray;" >
<td><strong>produit</strong></td>
<td><strong>quantite</strong></td>
</tr>


<?php
while($prod=$produit_com->fetch()){
?>
<tr>
<td>
  <?php //recuper infos du produits avec id_produit si la table produit_commandes 
$produit_id=$prod['id_produit'];
$infs=$bdd->prepare("SELECT * FROM produits where id=$produit_id");
$infs->execute();
$i=$infs->fetch();

echo $i['nom'];
?>
</td>
<td><?php echo $prod['quantite'];?></td>

<?php



}
?>



</table>

<br><br>

<?php

    }
  }else{
    echo "<center>aucune commande effectuée</center>";
  }

?>
</div>
</body>
<?php require 'footer.php'; ?>
</html>