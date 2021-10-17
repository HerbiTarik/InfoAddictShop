<?php
require "header.php";
?>
<div class="banner">
  </div>
     <br>   
     <br>
<div class="main">

<h1>Nouveauté</h1>
<hr>
<div class="row">
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
$reponse = $bdd->query('SELECT * FROM produits  ORDER BY id DESC LIMIT 4 ');  
if($reponse ->rowCount() > 0){
while($donnees= $reponse-> fetch()){
?>
  <div class="column">
    
    <div class="content">
      
      
      
      
      


      <img src="<?php echo $donnees['photo']; ?>" alt="PC" style="width:100%">
      <h3><?php echo $donnees['nom'];?></h3>
      <p>Prix <?php echo $donnees['prix'];?>DA </p>

      <center><a href="details.php?id=<?php echo  $donnees['id'];?>"><button class="consulter">Consulter</button></a></center>
     
     
      
       
      </div>
      </div>
      
  <?php }} ?> 
 
</div>


</div>




</div>


   

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      
      <script type="text/js" src="main.js"></script>

      <?php require 'footer.php'; ?>

  