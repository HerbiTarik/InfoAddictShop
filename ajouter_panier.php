<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
$reponse = $bdd->query('SELECT * FROM produits WHERE id = '.$_POST['id']);
$produit = $reponse -> fetch();

require_once 'panier.php';

$panier = new Panier('produits');

$valeurs = array(
    'nom' => $produit['nom'],
    'prix' => $produit['prix'],
    'qte' => $_POST['qte'],
    'id' => $produit['id']
);

$panier->set($_POST['id'], $valeurs);

header('Location: votre_panier.php');
?>