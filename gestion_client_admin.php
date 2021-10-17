<?php
require "header_admin.php";
?>
<div class='gestion_client'>
<h2>Gestion clients</h2>
<hr>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
$reponse = $bdd->query('SELECT * FROM clients ORDER BY pseudo'); 
?>


 <table border="1px" width="100%">
 <tr>
 <td><strong>Pseudo</strong></td>
 <td><strong>Nom</strong></td>
 <td><strong>Prénom</strong></td>
 <td><strong>Mail</strong></td>
 <td><strong>Action</strong></td>
 </tr>
 
 <?php while($donnees= $reponse ->fetch()){ 
     ?>
 <tr>
 <td ><?php echo $donnees['pseudo']; ?></td>
 <td ><?php echo $donnees['nom']; ?></td>
 <td ><?php echo $donnees['prenom']; ?></td>
 <td ><?php echo $donnees['mail'] ;?></td>
 <td><a href="supp_client_admin.php?id=<?php echo $donnees['id']; ?>">Supprimer</a></td>
 </tr>
 <?php 
} 
$reponse->closeCursor();

?>
 </table>   
</div>
</body>
<?php require 'footer.php'; ?>
</html>