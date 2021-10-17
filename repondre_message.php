<?php 









$bdd= new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root');
  date_default_timezone_set("Europe/London");
  $jour=date('Y-m-d H:i:s');
  $idms=$_GET['id'];
if(isset($_POST['repondre'])){
	$rep=$_POST['reponse'];
	$envoi=$bdd->prepare("INSERT INTO `reponse`(`id_message`, `reponse`, `date`) VALUES ($idms,'$rep','$jour')");
	$envoi->execute();
	?>
<script type="text/javascript">
	alert('message envoyé!');
	window.location.href="admin_message.php";
</script>

	<?php
}
?>
	<?php require "header_admin.php"; ?>
	<div class="rpns">
	<h2>Réponse</h2>
	<hr>
<center><form method="POST" >
	<textarea name="reponse"  >
		
	</textarea><br>
	<input type="submit" name="repondre" value="envoyer la réponse">
</form></center>
</div>
</body>
<?php require 'footer.php'; ?>
</html>
