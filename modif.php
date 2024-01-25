<?php 
session_start();
try{
	$db = new PDO('mysql:host=localhost;dbname=eniac2;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
	die('Error: '.$e->getMessage());
}
$req = $db->prepare('SELECT * FROM members WHERE id=:id');
$req->execute(array('id'=>$_SESSION['id']));


if(isset($_POST['prenom']) AND isset($_POST['nom']) AND isset($_POST['email']) AND isset($_POST['naissance']) AND isset($_POST['password']) AND isset($_POST['filiere'])){
		$id=$_SESSION['id'];
		$nom=htmlspecialchars($_POST['nom']);
		$prenom=htmlspecialchars($_POST['prenom']);
		$email=htmlspecialchars($_POST['email']);
		$naissance=$_POST['naissance'];
		$password=htmlspecialchars($_POST['password']);
		$pass_hache=password_hash($password, PASSWORD_DEFAULT);
		$filiere=htmlspecialchars($_POST['filiere']);
		if($_POST['prenom']!="" AND $_POST['nom']!="" AND $_POST['email']!="" AND $_POST['naissance']!="" AND $_POST['password']!="" AND $_POST['filiere']!=""){
			$me_loguer = false;
			if($password != $_SESSION['password'] || $_POST['email'] != $_SESSION['email']){
				$me_loguer=true;
			}
			$req = $db->prepare('UPDATE members SET nom=:nom,prenom=:prenom,email=:email,date_naissance=:naissance,password=:password,filiere=:filiere WHERE id=:id');
			$req->execute(array('id'=>$id,'nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'naissance'=>$naissance,'password'=>$pass_hache,'filiere'=>$filiere));
			// creation des nouvelles variable de session
			$req = $db->prepare('SELECT * FROM members WHERE id=:id');
			$req->execute(array('id'=>$id));
			$data = $req->fetch();
			$_SESSION['nom'] = $data['nom'];
			$_SESSION['prenom'] = $data['prenom'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['naissance'] = $data['date_naissance'];
			$_SESSION['password'] = $password;
			$_SESSION['filiere'] = $data['filiere'];
			if(isset($_COOKIE['nom_pd'])){
				setcookie('nom_pd',$_SESSION['nom'],'time()+30*24*60*60');
				setcookie('prenom_pd',$_SESSION['prenom'],'time()+30*24*60*60');
				setcookie('email_pd',$_SESSION['email'],'time()+30*24*60*60');
				setcookie('naissance_pd',$_SESSION['naissance'],'time()+30*24*60*60');
				setcookie('password_pd',$_SESSION['password'],'time()+30*24*60*60');
				setcookie('id_pd',$_SESSION['id'],'time()+30*24*60*60');
				setcookie('filiere_pd',$_SESSION['filiere'],'time()+30*24*60*60');
			}
			if(isset($me_loguer)){
				header('Location: deconnexion.php');
			}
			header('Location: modif.php');
		}
		else{
			?>
				<script type="text/javascript">
					alert('Une des informations fournie est incorrecte');
				</script>
			<?php
			header('Location: modif.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modification</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Reinitialisation du mot de passe</h2>
	<section>
		<form method="post" action="modif.php" id="inscrire-form">
			<?php 
				while($data = $req->fetch()){
					?>
			<div>	
				 <label for="nom">Nom</label>
				 <input type="text" name="nom" id="nom" value="<?= $_SESSION['nom'] ?>">
			</div>
			<div>	
				 <label for="prenom">Prenom</label>
				 <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['prenom'] ?>">
			</div>
			<div>
				 <label for="mail">Adresse mail</label>
				 <input type="email" name="email" id="mail" value="<?= $_SESSION['email'] ?>">
			</div>
			<div>
				<label for="naissance">Date de naissance</label>
				<input type="date" name="naissance" id="naissance" value="<?= $_SESSION['naissance'] ?>">
			</div>
			<div>
				 <label for="passe">Mot de passe</label>
				 <input type="password" name="password" id="passe" value="<?= $_SESSION['password'] ?>"><br>
				 <input type="checkbox" onclick="showPass()">voir le mot de passe
                    <script>
                    function showPass(){
                      var x = document.getElementById("passe");
                      if (x.type === "password") {
                        x.type = "text";
                      }
                      else{
                        x.type = "password";
                      }
                    }
                    </script>
			</div>
			<div>
				<label>Filière</label>
				<select name="filiere">
					<option value="gme" <?php if($_SESSION['filiere']=='gme'){echo "selected";} ?>>GME</option>
					<option value="geea" <?php if($_SESSION['filiere']=='geea'){echo "selected";} ?>>GEEA</option>
					<option value="git" <?php if($_SESSION['filiere']=='git'){echo "selected";} ?>>GIT</option>
					<option value="gc" <?php if($_SESSION['filiere']=='gc'){echo "selected";} ?>>GC</option>
					<option value="geo" <?php if($_SESSION['filiere']=='geo'){echo "selected";} ?>>GEOLOGIE</option>
					<option value="topo" <?php if($_SESSION['filiere']=='topo'){echo "selected";} ?>>TOPOGRAPHIE</option>
				</select>
			</div>

			<div>
				<input type="submit" value="Envoyer">
			</div>
			<?php
				}
			 ?>
			</form>
	</section>

	<?php include("footer.php"); ?>

	<!-- Traitement des donnees et leurs modificaton dans la base de donnees -->
</body>
</html>