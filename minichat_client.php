
<?php 

require "header.php";
try{
    $bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');

}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}
$confi="";
if(isset($_POST['valider'])){
	date_default_timezone_set("Europe/London");
  $jour=date('Y-m-d H:i:s');
  $client=$_SESSION['id'];
  $message=$_POST['message'];
$reponse=$bdd->prepare("INSERT INTO contacts(id_client,message,date) VALUES($client,'$message','$jour')");
$reponse->execute();
$confi="votre message a été envoyé ! ";
}
?>

  <div class='minichat' >
    <h2>Contact</h2>
    <hr>
    <div class='minichatform' align='center'>
    <form  method='post' >
    <table width="80%">
     <?php if($confi!=""){ ?>   <h4><?php echo $confi ;?></h4>      <?php } ?>
         <tr>
         <td><label><strong>Message:</strong></label></td><br>
         <td><textarea  name='message' id='message' placeholder='Entrez votre message' style="width:60%; border-radius:10px; outline:none;"required></textarea></td>
         </tr>
         </table>
         <br>
         <input type='submit' name="valider" value='envoyer le message'><br>
         </form>
    </div>
    </div>
    <?php require 'footer.php'; ?>
