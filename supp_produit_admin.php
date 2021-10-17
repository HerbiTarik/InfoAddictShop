<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
$prod=$_GET['id'];
$rep = $bdd->prepare("DELETE FROM produits_commandes WHERE id_produit =$prod" );
$rep->execute();
$reponse = $bdd->prepare("DELETE FROM produits WHERE id =$prod" );
$reponse -> execute();


?>
<script type="text/javascript">
	alert('produit supprimé!');
	window.location.href="admin_gestion_produit.php?<?php if(isset($_GET['marque'])){ echo 'marque='.$_GET['marque'];}else{ echo 'sous='.$_GET['sous'];}?>";
</script>

<?php

?>