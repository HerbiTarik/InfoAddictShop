
<?php
require('header.php');
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

$clt=$_SESSION['id'];

$requser = $bdd -> prepare ('SELECT * FROM clients');
$userinfo = $requser->fetch();
//code modification du nom
if(isset($_POST['nom_bt'])){
  $new_nom=$_POST['nom'];
  $update_nom=$bdd->prepare("UPDATE clients set nom='$new_nom' where id=$clt");
  $update_nom->execute();
}

//code modification du prenom
if(isset($_POST['prenom_bt'])){
  $new_prenom=$_POST['prenom'];
  $update_nom=$bdd->prepare("UPDATE clients set prenom='$new_prenom' where id=$clt");
  $update_nom->execute();
}

//code modification du mail
if(isset($_POST['mail_bt'])){
  
  $new_mail=$_POST['mail'];
  $update_nom=$bdd->prepare("UPDATE clients set mail='$new_mail' where id=$clt");
  $update_nom->execute();
}

//code modification du mot de passe
if(isset($_POST['mdp_bt'])){
  $mdp=sha1($_POST['mdp']);
  $new_mdp=$mdp;
  $update_nom=$bdd->prepare("UPDATE clients set motdepasse='$new_mdp' where id=$clt");
  $update_nom->execute();
}


//code annuler la commande
if(isset($_POST['annuler'])){

$id_sup=$_POST['id_com_sup'];
$date_sup=$_POST['date_com_sup'];


date_default_timezone_set("Europe/London");
  $jour=date('Y-m-d H:i:s');
  $datetime1 = new DateTime($jour);//start time
  $datetime2 = new DateTime($date_sup);//end time
  $interval = $datetime1->diff($datetime2);
  $dd=$interval->format('%h');
  $minute=$interval->format('%i');
  
  
  if($dd >= 1  || $dd=1 && $minute > 60){
?>
<script type="text/javascript">
  
  alert('vous ne pouvez pas annuler , 60 minute se sont écoulées');

</script>

<?php

   }else{
$supprimer=$bdd->prepare("DELETE FROM produits_commandes where id_commande=$id_sup");
$supprimer->execute();
$supprimer_produits=$bdd->prepare("DELETE FROM commande where id_commande=$id_sup");
$supprimer_produits->execute();

   }

  


}



?>


  <div class="banner" style="height: 550px;">
    <p>bienvenue <?php echo $_SESSION['pseudo']; ?>!<br> <br></p>
  </div>
     <br>   
  <center>   
<div class="kat">
  <a href="client.php?mesinfos"><button>Voir mes coordonnées </button></a>
  <a href="client.php?mescommandes"><button>Voir mes commandes</button></a>
  <a href="client.php?messagerie"><button> Voir mes messages</button></a>
  <br><br>
</div>
<br>
</center>
<div class="cnt">
  <?php if(isset($_GET['mesinfos'])){

$mesinfos=$bdd->prepare("SELECT * FROM clients where id=$clt");
$mesinfos->execute();
$infos=$mesinfos->fetch();

  ?>
<center><div class="coor">
<h2>Mes coordonnées </h2>
<hr>
  <table>
    <tr>
    <td><strong> Nom : </strong></td><td>
    <form method="POST">
      <input type="text" name="nom" value="<?php echo $infos['nom'];?>"><br>
      <input type="submit" name="nom_bt" value="modifier votre nom"><br>
</form>
    </td>


    </tr>
    <td><strong> Prénom : </strong></td><td>
    <form method="POST">
      <input type="text" name="prenom" value="<?php echo $infos['prenom'];?>"><br>
      <input type="submit" name="prenom_bt" value="modifier votre prenom"><br>
</form>
    </td></tr>

    </tr>
    <td><strong> Mail : </strong></td><td>
    <form method="POST">
      <input type="text" name="mail" value="<?php echo $infos['mail'];?>"><br>
      <input type="submit" name="mail_bt" value="modifier votre mail"><br>
</form>
    </td></tr>


    </tr>
    <td><strong> Mot de passe : </strong></td><td>
    <form method="POST">
      <input type="password" name="mdp" placeholder="saisissez votre mot de passe"><br>
      <input type="submit" name="mdp_bt" value="modifier votre mot de passe"><br>
</form>
    </td></tr>
  </table>
  </div></center>

<?php } ?>

<!--------------------- içi affichage commande------------------------->

<?php 
if(isset($_GET['mescommandes'])){
  $commandes=$bdd->prepare("SELECT * FROM commande where id_client=$clt");
  $commandes->execute();?>
  <div class="voir_commande">
<center><h2><strong style="font-size:25px;">Mes commandes</strong></h2></center>
<hr>
  <?php if($commandes->rowCount()>0){
    while($com=$commandes->fetch()){

?>

<table border="1px" width="100%">
  <tr style="background: gray;">
<td><strong>numéro de la commande</strong></td>
<td><strong>adresse de livraison</strong></td>
<td><strong>montant</strong></td>
<td><strong>etat</strong></td>
<td><strong>date</strong></td>
  </tr>
  <tr><td><?php echo $com['id_commande'];?></td>

<td><?php echo $com['adresse'];?></td>
<td><?php echo $com['montant'];?></td>
<td><?php echo $com['etat'];?></td>
<td><?php echo $com['date'];?></td>
<td><form method="POST">
<input type="hidden" name="id_com_sup" value="<?php echo $com['id_commande'];?>">
<input type="hidden" name="date_com_sup" value="<?php echo $com['date'];?>">
<input class="btn_voir_commande" type="submit" name="annuler" value="annuler cette commande">

</form>
</td>
</tr>
</table>
<table border="1px" width="50%">
<?php //code affichage des produits commandés
$id_commande=$com['id_commande'];
$produit_com=$bdd->prepare("SELECT * FROM produits_commandes where id_commande=$id_commande");
$produit_com->execute();?>
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



<?php

    }
  }else{
    echo "<center>aucune commande effectuée</center>";
  }
  ?></div><?php
}


//code voir mes message
if(isset($_GET['messagerie'])){
?><div class='voir_msg' >
<h2 ><center>Les Messages envoyés</center></h2>
     <hr>
         <?php
            $bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

        $message = $bdd->query("SELECT * FROM contacts where id_client=$clt ORDER BY date DESC");
       if($message->rowCount()>0){
        
        while($donnees= $message ->fetch()){
                echo '<p> <strong style="float:right; margin:0; padding:0;">'.$donnees['date']. '</strong><br><div class="message">'.htmlspecialchars($donnees['message']).'</div></p>';
            } }else{
              echo "<center>aucun message envoyé.</center>";
            }

        $message->closeCursor();
    
        ?>
        
</div>
<div class='voir_msg' >
<h2><center>Les Messages reçus</center></h2>
     <hr>
         <?php
            $bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

        $reponse = $bdd->query("SELECT * FROM `reponse` R,contacts C where C.id=R.id_message and id_client=$clt");
       
        if($reponse->rowCount()>0){

        while($donnees= $reponse ->fetch()){
                echo '<p> <strong style="float:right; margin:0; padding:0;">'.$donnees['date']. '</strong><br><div class="message">'.htmlspecialchars($donnees['reponse']).'</div></p>';
            } 

          }else{
            echo "<center>aucun message reçu</center>";
          }
        $reponse->closeCursor();
    
        ?>
        
</div>





<?php

}

?>

</div>
</body>
<?php require 'footer.php'; ?>
</html>
