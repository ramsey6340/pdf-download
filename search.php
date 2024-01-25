<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<?php 
		try{
			$bdd = new PDO('mysql:host=localhost; dbname=eniac; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('ERREUR: '.$e->getMessage()); 
		}
	 ?>
		<input list="nom_matiere" name="search" placeholder="nom de la matière" required>
		<datalist id="nom_matiere">
		<?php 
			$req = $db->prepare('SELECT licence1, licence2, licence3 FROM nom_matiere_git');
			$req->execute(array('table'=>$tab_matiere));
			while($data = $req->fetch()){
				echo '<option value="'.$data['licence1'].'">';
				echo '<option value="'.$data['licence2'].'">';
				echo '<option value="'.$data['licence3'].'">';
			}
		?>
		</datalist>
</body>
</html>