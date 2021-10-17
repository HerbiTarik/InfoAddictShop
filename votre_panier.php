<div style="position: fixed;"><?php require('header.php');?></div><?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

$clientt=$_SESSION['id'];
if(isset($_POST['modifier_qt'])){
$quantite1=$_POST['quantite_mod'];
$id_modif=$_POST['id_modifier'];

if($quantite1==0){
  $supp_prod=$bdd->prepare("DELETE  FROM produits_panier where id_produit=$id_modif and id_client=$clientt");
$supp_prod->execute();

}
$update=$bdd->prepare("UPDATE produits_panier set quantite=$quantite1 where id_produit=$id_modif and id_client=$clientt");
$update->execute();

}


if(isset($_POST['supprimer_bouton'])){
  $id_supp=$_POST['id_supprimer'];
  $delete=$bdd->prepare("DELETE FROM produits_panier where id_produit=$id_supp and id_client=$clientt");
  $delete->execute();
}
if(isset($_POST['acheter'])){
  $adresse=$_POST['adresse'];
  $numero=$_POST['numero'];
$montant=$_GET['montant']; $erreur="";
if(strlen($numero)<10 || strlen($numero)>10){
  $erreur="le numero de telephone doit avoir exactement 10 chiffres";
}else{
date_default_timezone_set("Europe/London");
  $jour=date('Y-m-d H:i:s');
  $inserer_commande=$bdd->prepare("INSERT INTO commande(etat,id_client,adresse,montant,numero,date)VALUES('non confirmeée',$clientt,'$adresse',$montant,$numero,'$jour')");
  try
{
$inserer_commande->execute();}
  catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
  }

  $recuper_son_id=$bdd->prepare("SELECT * FROM commande where id_client=$clientt ORDER BY id_commande DESC LIMIT 1");
  $recuper_son_id->execute();
  $recu=$recuper_son_id->fetch();
  $idcmd=$recu['id_commande'];
  $monpanier1=$bdd->prepare("SELECT * FROM produits_panier where id_client=$clientt");
$monpanier1->execute();


  while($tabb=$monpanier1->fetch()){
$prd=$tabb['id_produit'];
$qtee=$tabb['quantite'];
$transferer=$bdd->prepare("INSERT INTO produits_commandes(id_produit,quantite,id_commande) VALUES($prd,$qtee,$idcmd)");
$transferer->execute();
$delet=$bdd->prepare("DELETE FROM produits_panier where id_produit=$prd");
$delet->execute();



  }
  ?>
<script type="text/javascript">
  alert('commande faite !');
</script>



  <?php
}


}




?>


<div class='panier'>
<h2>Panier</h2>
<hr>


<?php 

$client=$_SESSION['id'];
$monpanier=$bdd->prepare("SELECT * FROM produits_panier where id_client=$client");
$monpanier->execute();
$total=0;
if($monpanier->rowCount()>0){
?>      
    <table border="1" width="100%">
       <tr>
         <td><strong>Nom</strong></td>
         <td><strong>Prix</strong></td>
         <td><strong>Quantité</strong></td>
         <td><strong>Total</strong></td>
         <td><strong>modifier</strong></td>
         <td><strong>supprimer</strong></td>
       </tr><?php





  while($tab1=$monpanier->fetch()){

    $id_produit=$tab1['id_produit'];
    $details=$bdd->prepare("SELECT * FROM produits where id=$id_produit");
    $details->execute();
    if($details->rowCount()>0){
while($dt=$details->fetch()){
  $total=$total+$tab1['quantite']*$dt['prix'];
?>
 <tr>
         <td><?php echo $dt['nom'];?> </td>
         <td> <?php echo $dt['prix'];?> </td>
         <td><?php echo $tab1['quantite'];?>  </td>
         <td><?php  echo $dt['prix']*$tab1['quantite'];?> DZA.</td>
         <td> <form method="POST">
   <input type="hidden" value="<?php echo $dt['id'];?>" name="id_modifier">       
<input class="mod_pan" type="input" name="quantite_mod">
<input class="mod_pan_btn" type="submit" name="modifier_qt" value="modifier la quantite">
         </form></td>
         <td>
           <form method="POST">
            <input type="hidden" value="<?php echo $dt['id'];?>" name="id_supprimer">  
            <input class="mod_pan_btn" type="submit" name="supprimer_bouton" value="supprimer le produit">
           </form>
         </td>
       </tr>
<?php 
}} }?>
 <tr>
          <td colspan="3" align="3"><strong>Total</strong></td>
          <td><?php echo $total;?>DA</td>
        </tr>
        <tr><th colspan="3"> total plus livraison</th><td><?php echo $total+600;?> DA.</td></tr>

       </tr>
       
    </table>
    <center><button  class="mod_pan_btn" style="width: 140px;font-size: 19px;"><a style="color:#fff;" href="votre_panier.php?acheter1&montant=<?php echo $total;?>">acheter</a></button></center>
<br><br>

<?php

    





  

?>
<?php if(isset($_GET['acheter1'])){ ?><div class="commande">
  <h3><strong><center style="font-size:24px;">Formulaire de commande</center></strong></h3>
  <hr>
  <form method="POST" style="margin-left: 40%;">
    <h3><?php if(isset($_POST['acheter'])){echo $erreur;}?></h3><br>
    <label><strong>numero de telephone: </strong></label><input class="mod_pan" type="number" name="numero" required><br><br>
    <label><strong>adresse de livraison: </strong></label><input class="mod_pan" type="text" name="adresse" required><br><br>
    <input class="mod_pan_btn" style="width: 140px;font-size: 19px;" type="submit" name="acheter" value="acheter"><br>
  </form>
</div>
<?php } ?>



<?php




}else{
  ?>
<center><b>votre panier est vide</b></center>

  <?php
}



?>
       
     
      
   
    </div>
    <div class="position:fixed-bottom"style="margin-top: 300px;"><?php require 'footer.php'; ?></div>