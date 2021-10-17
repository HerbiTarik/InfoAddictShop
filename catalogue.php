
<?php require('header.php');?>
<div class="pc_bureau">
<h2>Catégories</h2>
<hr>
<div class="row">
<?php 

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

if(isset($_GET['sous'])){ 
$identifiant_sous=$_GET['sous'];

$requete1=$bdd->prepare("SELECT * FROM produits WHERE id_sous_categorie=$identifiant_sous");}
if(isset($_GET['marque'])){
$identifiant_sous=$_GET['marque'];

$requete1=$bdd->prepare("SELECT * FROM produits WHERE marque=$identifiant_sous");

}
$requete1->execute();
if($requete1->rowCount()>0) {
	while($tab=$requete1->fetch()){

?>
 
 <div class="column" >
    <div class="content" >
      <img src="<?php echo $tab['photo']; ?>" alt="PC" style="width:100%">
      <h3><?php echo $tab['nom'];?></h3>
      <p>Prix <?php echo $tab['prix'];?>DA </p>

      <center><a href="details.php?id=<?php echo $tab['id'];?>" class="consulter">Consulter</button></a></center>
     
    
   
      
       
      </div>
      </div>
      

<?php
	}
}






?>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      
      <script type="text/js" src="main.js"></script>
      </div>
     </div>
</body>
    
<?php require 'footer.php'; ?>
      
</html>