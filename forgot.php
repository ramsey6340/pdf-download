<?php
 session_start(); 

 //Traitement du cas où l'utilisateur oublie son mot de passe 
		try{
			$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_POST['email']) AND isset($_POST['passe'])){
			if($_SESSION['forgot']==$_POST['email']){
				$new_pass=password_hash($_POST['passe'],PASSWORD_DEFAULT);
				$req = $db->prepare('UPDATE members SET password=:password WHERE email=:email');
				$req->execute(array('email'=>$_POST['email'],'password'=>$new_pass));
				header('Location: connexion.php');
			}
			else{
				?>
					<script type="text/javascript">
						alert('Email incorrecte');
					</script>
				<?php
			}
		}
		else if(isset($_POST['email'])){
			$req = $db->prepare('SELECT email FROM members WHERE email=:email');
			$req->execute(array('email'=>$_POST['email']));
			$data = $req->fetch();
			if($_POST['email']==$data['email']){
				$_SESSION['forgot']=$_POST['email'];
			}
			else{
				?>
					<script type="text/javascript">
						alert('Email incorrecte');
					</script>
				<?php
			}
		}
		
	 ?>

<!DOCTYPE html>
<html>
<head>
	<title>PDF-download</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Reinitialiser mon mot de passe</h2>
	<div class="conteneur-connexion">
	<section id="sec-connexion">
		<form method="post" action="forgot.php" class="connexion-form">
			<div>
				<label for="email">Votre email</label><br>
				<input type="email" name="email" id="email" required="required"><br>
			</div>
			<?php 
				if(isset($_SESSION['forgot'])){
			?>
			<div>
				<label for="passe">Nouveau mot de passe</label><br>
				<input type="password" name="passe" id="passe-connexion" required="required">
			</div>
			<?php
 				}
			 ?>	
			 <div>
				<input type="submit" value="Envoyer">
			</div>
		</form>
	</section>
	<br><br>
	</div>
	<?php include("footer.php"); ?>
	