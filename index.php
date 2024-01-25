<?php 
session_start(); 
if(!isset($_SESSION['email'])){
	header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php include("menu.php"); ?>
	 <h2>Accueil</h2>
	 <section id="sec-accueil">
	 	<div class="div-accueil">
	 		<h2 class="h2-bottom" style="color: white">Bienvenu sur</h2>
	 		<h2 class="h2-width" style="color: white">ENI-dowload</h2>
	 		<p>Télecharger facilement et rapidement.</p>
	 		<p>Decouvrez tout vos documents sur tous les matiers de vos filieres préférer.</p>
	 	</div>
	 </section>
	
	 <?php 
	 	include("footer.php");
	  ?>
	  
	 <?php 
	if(isset($_GET['inscrit'])){
		?>
			<script type="text/javascript">
				alert("votre inscription a bien été validé");
			</script>
		<?php
	}

 ?>
</body>
</html>