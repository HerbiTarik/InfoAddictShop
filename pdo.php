<?php 
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');//connexion bdd




$requete_clients=$bdd->prepare("SELECT * FROM clients");//preparer la requete
               $requete_clients->execute();//executer la requte
               if($requete_clients->rowCount()>0){ //verifier le resultat 
               while($mq=$requete_clients->fetch()){
echo $mq['nom'];//afficher le resultat

echo "<br>";//retour à la ligne



           }

       }else{
       echo "aucun resultat";
   }
   ?>