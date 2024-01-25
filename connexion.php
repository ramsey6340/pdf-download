<?php
 session_start();
 if(isset($_COOKIE['email_pd'])){
 	$_SESSION['id'] = $_COOKIE['id_pd'];
 	$_SESSION['nom'] = $_COOKIE['nom_pd'];
 	$_SESSION['prenom'] = $_COOKIE['prenom_pd'];
 	$_SESSION['email'] = $_COOKIE['email_pd'];
 	$_SESSION['naissance'] = $_COOKIE['naissance_pd'];
 	$_SESSION['password'] = $_COOKIE['password_pd'];
 	$_SESSION['filiere'] = $_COOKIE['filiere_pd'];
 	header('Location: index.php');
 }
 else{
 	
		try{
			$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_POST['passe_connexion']) AND isset($_POST['email_connexion'])){
			$requete = $db->prepare('SELECT * FROM members WHERE email=:email');
			$requete->execute(array('email'=>$_POST['email_connexion']));
			if($requete){
				$data = $requete->fetch();
				if($data['etat'] == 1){
					$isPasswordCorrect = password_verify($_POST['passe_connexion'], $data['password']);
					if($isPasswordCorrect){
						
						$_SESSION['id'] = $data['id'];
						$_SESSION['nom'] = $data['nom'];
						$_SESSION['prenom'] = $data['prenom'];
						$_SESSION['email'] = $data['email'];
						$_SESSION['naissance'] = $data['date_naissance'];
						$_SESSION['password'] = $_POST['passe_connexion'];
						$_SESSION['pass_hash'] = $data['password'];
						$_SESSION['filiere'] = $data['filiere'];
						
						$id=$_SESSION['id'];
						$req = $db->prepare('UPDATE members SET statut=:statut WHERE id=:id');
						$req->execute(array('id'=>$id, 'statut'=>1));
						// =========Creation du cookie===============
						if(isset($_POST['souvenir'])){
							setcookie('nom_pd',$_SESSION['nom'],time()+30*24*60*60);
							setcookie('prenom_pd',$_SESSION['prenom'],time()+30*24*60*60);
							setcookie('email_pd',$_SESSION['email'],time()+30*24*60*60);
							setcookie('password_pd',$_SESSION['password'],time()+30*24*60*60);
							setcookie('pass_hash_pd',$_SESSION['pass_hash'],time()+30*24*60*60);
							setcookie('naissance_pd',$_SESSION['naissance'],time()+30*24*60*60);
							setcookie('id_pd',$_SESSION['id'],time()+30*24*60*60);
							setcookie('filiere_pd',$_SESSION['filiere'],time()+30*24*60*60);
						}
						header('Location: index.php');

					}
					else{
						?>
							<script type="text/javascript">
								alert("Email ou mot de passe incorrecte");
							</script>
						<?php
					}
				}
				else{
					?>
						<script type="text/javascript">
							alert("Email ou mot de passe incorrecte");
						</script>
					<?php
				}
			}
			
		}
 }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Connexion</h2>
	<div class="conteneur-connexion">
	<section id="sec-connexion">
		<form method="post" action="connexion.php" class="connexion-form">
			<div>
				<label for="email">Votre email</label><br>
				<input type="email" name="email_connexion" id="email" required="required"><br>
			</div>
			<div>
				<label for="passe-connexion">Mot de passe</label><br>
				<input type="password" name="passe_connexion" id="passe-connexion" required="required">
			</div>
			<div>
				<input type="checkbox" name="souvenir" id="souvenir">
				<label for="souvenir">Se souvenir de moi</label>

				&emsp;&emsp;<input type="submit" value="Envoyer">
			</div>
		</form>
	</section>
	
	<a href="forgot.php" style="color: blue; text-decoration: underline; border: none; background:none; margin-top:15px; height: 20px;">J'ai oublié mon mot passe</a>
	<a href="inscrire.php" style="color: blue; text-decoration: underline; border: none; background:none;height: 20px;margin-top:15px;">s'inscrire</a><br>
	</div>
	<?php include("footer.php"); ?>


	<!-- =======================Traitement de la page connexion======================== -->
	<?php 

	 ?>
</body>
</html>