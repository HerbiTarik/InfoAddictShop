<?php
require "header_admin.php";
?>
<div class='minichat'>
<h2>Messages reçus</h2>
     <hr>
         <?php
            $bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

        $reponse = $bdd->query('SELECT * FROM contacts ORDER BY date DESC');
       
        if($reponse->rowCount()>0){
        while($donnees= $reponse ->fetch()){
        	$ids=$donnees['id_client'];
        	$details=$bdd->prepare("SELECT * FROM clients where id=$ids");
        	$details->execute();
        	$dts=$details->fetch();
                ?><p><strong style="float:left; margin-right:20px; padding:0;"> nom du client : <?php echo $dts['nom'];?></strong><strong style="float:right; margin:0; padding:0;"><?php echo $donnees['date'];?></strong><br><div class="message"><?php echo htmlspecialchars($donnees['message']);?></div>
<div class="btn_msg">
<a  href="repondre_message.php?id=<?php echo $donnees['id'];?>"><button >Répondre</button></a>
</div><br><br><br>

                	</p><?php

            }}else{
            	echo "<center>aucun message reçu </center>";
            }
        $reponse->closeCursor();
    
        ?>
        
<br><br>
<h2>Messages envoyés</h2>
     <hr>
         <?php
            $bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');

        $reponse1 = $bdd->query('SELECT * FROM reponse ORDER BY date DESC');
       
        if($reponse1->rowCount()>0){
        while($donnees1= $reponse1 ->fetch()){
        
                ?><p><strong style="float:right; margin:0; padding:0;"><?php echo $donnees1['date'];?></strong><br><div class="message"><?php echo  htmlspecialchars($donnees1['reponse']);?></div>



                	</p><?php

            }}
else{
	echo "<center>aucune réponse envoyée.</center>";
}


        $reponse1->closeCursor();
    
        ?>
        






</div>
</body>
<?php require 'footer.php'; ?>
</html>