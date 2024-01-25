<?php 
session_start();
try{
	$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
	die('Error: '.$e->getMessage());
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include("menu.php"); ?>
	<h2>Inscription</h2>
	<section>
		<form method="post" action="inscrire.php" id="inscrire-form">
			<div>	
				 <label for="nom">Nom</label>
				 <input type="text" name="nom" id="nom" required="required" autofocus="autofocus">
			</div>
			<div>	
				 <label for="nom">Prenom</label>
				 <input type="text" name="prenom" id="prenom" required="required" autofocus="autofocus">
			</div>
			<div>
				 <label for="mail">Adresse mail</label>
				 <input type="email" name="email" id="mail" required="required">
			</div>
			<div>
				<label for="naissance">Date de naissance</label>
				<input type="date" name="naissance" id="naissance" required="required">
			</div>
			<div>
				 <label for="passe">Mot de passe</label>
				 <input type="password" name="password" id="passe" required="required">
			</div>
			<div>
				 <label for="confirme_passe">Confirmation du mot de passe</label>
				 <input type="password" name="confirme_pass" id="confirme_passe" required="required">
			</div>
			<div>
				<label>Filière</label>
				<select name="filiere" required="required">
					<option value="git">GIT</option>
					<option value="gme">GME</option>
					<option value="geea">GEEA</option>
					<option value="gc">GC</option>
					<option value="geo">GEOLOGIE</option>
					<option value="topo">TOPOGRAPHIE</option>
				</select>
			</div>
			
			<div>
				 <input type="checkbox" name="condition" id="condition" style="margin-left: 100px;" required="required">
				 <label for="condition" style="width: 380px;">J'ai lu et j'accepte <a href="about.php" style="background: rgb(250,250,240); color: blue; text-decoration: underline; border: none;">les conditions général d'utilisation</a></label><br>
			</div>

			<div>
				<input type="submit" value="Envoyer">
			</div>

			</form>
	</section>
<?php include("footer.php"); ?>

	<!-- Traitement des donnees et leurs envoie dans la base de donnees -->

<?php
	$inscrit=false; 
	if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['naissance']) AND isset($_POST['password']) AND isset($_POST['confirme_pass']) AND isset($_POST['filiere'])){
		$_POST['email']=htmlspecialchars($_POST['email']);
		if(!preg_match('#^[a-z0-9._-]{1,30}@{1}[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$_POST['email']))
			{?>
				<script type="text/javascript">
					alert("L'adresse email est incorrecte");
				</script>
<?php
		}
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$mail = htmlspecialchars($_POST['email']);
		$naissance = htmlspecialchars($_POST['naissance']);
		$password = htmlspecialchars($_POST['password']);
		$confirme_pass = htmlspecialchars($_POST['confirme_pass']);
		$filiere = $_POST['filiere'];
		$req = $db->query('SELECT email FROM members');
		$email_existe = false;
		while($data = $req->fetch()){
			if($data['email']==$mail){
				$email_existe=true;
				break;
			}
		}
		if($email_existe){
			?>
				<script type="text/javascript">
					var email_existe = '<?= $mail ?>';
					alert('L\'email '+ email_existe +' est déjà inscrit sur PDF-download !');
				</script><?php
		}
		else{
			if($password != $confirme_pass){
			?>
			<script type="text/javascript">
				alert("Les mots de passe ne correspondent pas");
			</script><?php
		}

		$clef = "0123456789";
     	$clef = rand();

		if($password == $confirme_pass){
			$pass_hache = password_hash($password, PASSWORD_DEFAULT);
			$reponse = $db->prepare('INSERT INTO members (nom, prenom, email,date_naissance,password,filiere,etat,date_inscription, statut) VALUES (:nom,:prenom,:email,:date_naissance,:password,:filiere,:etat,NOW(),1)')  or die(print_r($db->errorInfo()));
		$reponse->execute(array(
			'nom'=>$nom,
			'prenom'=>$prenom,
			'email'=>$mail,
			'date_naissance'=>$naissance,
			'password'=>$pass_hache,
			'etat'=>1,
			'filiere'=>$filiere,
			));
		$reponse->closecursor();
		$inscrit=true;
		if ($inscrit) {
			?>
			<script type="text/javascript">
				alert("Votre inscription a bien été validée.\nVous pouvez vous connecter et acceder à votre compte.");
				window.location.href = "connexion.php";
			</script>
			<?php
		}
		// header('Location: connexion.php');
		// $my_mail = "eniac5@project.com";
		// $subject = "Validation de l'inscription" ;
		// $message = "Salamou aleykoum ".$prenom ." ".$nom. "pour finir votre inscription sur PDF-download veuillez cliquer sur le lien ci-dessous, cela nous permettra de verifier qu'il s'agit bien de vous\n<a href='http://127.0.0.1/MyProjet/ENIAC/pdf-download/inscrire.php?clef=$clef'>valider mon compte</a>" ;
		// $head = "De:".$my_mail ; 
		// mail($mail, $subject, $message,$head);
	}
	}
	if($inscrit){
		?>
			<script type="text/javascript">
				alert("Votre inscription a bien été validé\nvous allez recevoir un email permetent de confirmer votre identité");
			</script>
		<?php
	}
		}
		
?>


</body>
</html>