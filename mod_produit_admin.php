<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
$prod=$_GET['id'];
if(isset($_POST['boutonproduit'])){
   
    



    if(!empty($_POST['produit'])){  $nom=$_POST['produit']; 
    	$updatenom=$bdd->prepare("UPDATE produits set nom='$nom' where id=$prod");
    	$updatenom->execute();

    }
     if(!empty($_POST['prix'])){ $prix=$_POST['prix'];
    	$updateprix=$bdd->prepare("UPDATE produits set prix=$prix where id=$prod");
    	$updateprix->execute();

    }
     if(!empty($_POST['qt'])){ 
    $qt=$_POST['qt'];
    	$updateqt=$bdd->prepare("UPDATE produits set quantite_dispo=$qt where id=$prod");
    	$updateqt->execute();

    }

?>
<script type="text/javascript">
	alert('modification faite !');
	window.location.href="admin_gestion_produit.php?<?php if(isset($_GET['marque'])){ echo 'marque='.$_GET['marque'];}else{ echo 'sous='.$_GET['sous'];}?>";
</script>

<?php


}
require "header_admin.php"; 

?>
<div class='ajouter_panier'>
<h2>Modifier un produit</h2>
<hr>

<div class="formajouter" align="center">
<?php
           if (isset($erreur)){
           echo '<br>'.$erreur.'<br>';
           }
           ?><br>
<form action="" method="post" style="margin-top: 100px;">
<table>

<tr>
<td><label for="produit">Nom du produit:</label></td>
<td><input type="text" id="produit" name="produit" placeholder="Entrez le nom du produit" ></td>
</tr>

<tr>
<td><label for="prix">Prix du produit:</label></td>
<td><input type="text" id="prix" name="prix" placeholder="Entrez le prix du produit" ></td>
</tr>
<tr>
<td><label for="quantite">quantite</label></td>
<td><input type="number" id="qt" name="qt"></td>
</tr>




</table>
<br>
<input type="submit" name="boutonproduit" value="Modifier le produit">
</form>
</div>
</div>
</body>
</html>
