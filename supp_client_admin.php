<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

$client=$_GET['id'];
$reponse = $bdd->prepare("SELECT * FROM commande  where id_client= $client " );
$reponse->execute();
while($r=$reponse->fetch()){
	$comd=$r['id_commande'];

	$deletee=$bdd->prepare("DELETE FROM produits_commandes where id_commande=$comd");
	$deletee->execute();
		$reponse4=$bdd->prepare("DELETE FROM commande where id_commande=$comd");
$reponse4->execute();
}

$reponse2 = $bdd->prepare("DELETE FROM contacts WHERE id_client=$client ");
$reponse3 = $bdd->prepare("DELETE FROM clients WHERE id= $client" );

$reponse2 -> execute();
$reponse3 -> execute();
header('Location: gestion_client_admin.php');
?>