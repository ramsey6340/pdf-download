<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Contactez-nous</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Contactez-nous</h2>
	<div class="conteneur-connexion">
		<section id="sec-connexion">
		<form method="post" action="contacte.php" class="connexion-form">
			<div class="contacte">
				
				<div>
					 <label for="mail">Votre adresse mail</label><br>
				 	<input type="email" name="mail" id="mail" required="required">
				</div><br>
				<div>
					<label for="message">Votre message</label><br>
					<textarea id="message"></textarea>
				</div><br>
				<div>
					<input type="submit" value="Envoyer">
				</div>
			</div>
		</form>
	</section>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>