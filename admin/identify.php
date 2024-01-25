<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" type="text/css" href="style/connexion.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="center">
		<div>
			<img src="style/img/login.png" alt="image-login">
		</div>
		<div class="form">
			<h3>Administrateur</h3>
			<form method="post" action="identify.php">
				<input type="text" name="login" id="login" placeholder="login" required><br>
				<input type="password" name="password" id="password" placeholder="password" required><br><br>
				<input type="submit" value="Envoyer">
			</form>
		</div>
	</div>


<?php 

		try{
			$bdd = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_POST['password']) AND isset($_POST['login'])){
			$reponse = $bdd->prepare('SELECT * FROM admin WHERE login=:login');
			$reponse->execute(array(
				'login'=>$_POST['login']));
			if($reponse){
				$donnees = $reponse->fetch();
				if($donnees['etat'] == 1){
					$isPasswordCorrect = password_verify($_POST['password'], $donnees['password']);
					if($isPasswordCorrect){
						session_start();
						$_SESSION['id'] = $donnees['id'];
						$_SESSION['login'] = $donnees['login'];
						$_SESSION['password'] = $donnees['password'];
						$_SESSION['power'] = $donnees['power'];
						$id = $_SESSION['id'];
						$req = $bdd->prepare('UPDATE admin SET statut=:statut WHERE id=:id');
						$req->execute(array('id'=>$id, 'statut'=>1));
						header('Location: view/user.php');
					}
					else{
						?>
							<script type="text/javascript">
								alert("Login ou password incorrecte");
							</script>
						<?php
					}
				}
				else{
					?>
						<script type="text/javascript">
							alert("Login ou password incorrecte");
						</script>
					<?php
				}
			}
			else{
				?>
					<script type="text/javascript">
						alert("Login ou password incorrecte");
					</script>
				<?php
			}
			
		}
	 ?>


</body>
</html>