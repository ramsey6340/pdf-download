<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Telehargement</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href=".././style.css">
</head>
<body>

	<?php 
		try{
			$bdd = new PDO('mysql:host=localhost; dbname=eniac; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_GET['matiere'])){
			$variable_trouver = false;
			$id_variable;
			$champ;
			if($variable_trouver == false){
				$reponse = $bdd->query('SELECT ID,licence1 FROM variable_matiere_gme');
				$champ='l1';
				while ($donnees = $reponse->fetch()) {
				if($donnees['licence1']==$_GET['matiere']){
					$id_variable = $donnees['ID'];
					$variable_trouver = true; 
				}
			}

			}
			if($variable_trouver == false){
				$reponse = $bdd->query('SELECT ID,licence2 FROM variable_matiere_gme');
				$champ='l2';
				while ($donnees = $reponse->fetch()) {
				if($donnees['licence2']==$_GET['matiere']){
					$id_variable = $donnees['ID'];
					$variable_trouver = true; 
				}
			}
			}
			if($variable_trouver == false){
				$reponse = $bdd->query('SELECT ID,licence3 FROM variable_matiere_gme');
				$champ='l3';

				while ($donnees = $reponse->fetch()) {
				if($donnees['licence3']==$_GET['matiere']){
					$id_variable = $donnees['ID'];
					$variable_trouver = true; 
				}
			}
			}
			$matiere;
			if($variable_trouver == true){
				switch($champ){
					case 'l1': 
						$reponse = $bdd->prepare('SELECT ID,licence1 FROM nom_matiere_gme WHERE ID=:id_var');
						$reponse->execute(array('id_var'=>$id_variable));
						$donnees = $reponse->fetch();
						$matiere = $donnees['licence1'];
						break;
					case 'l2':
						$reponse = $bdd->prepare('SELECT ID,licence2 FROM nom_matiere_gme WHERE ID=:id_var');
						$reponse->execute(array('id_var'=>$id_variable));
						$donnees = $reponse->fetch();
						$matiere = $donnees['licence2'];
						break;
					case 'l3':
						$reponse = $bdd->prepare('SELECT ID,licence3 FROM nom_matiere_gme WHERE ID=:id_var');
						$reponse->execute(array('id_var'=>$id_variable));
						$donnees = $reponse->fetch();
						$matiere = $donnees['licence3'];
						break;
					default:
						echo 'Error';
				}
			}
			
		}
		else{
			header('Location: erreur.php');		
	}
	 ?>


	<h2>Telechargement des documents de <?php echo $matiere; ?></h2>
	<div class="telecharge">
		<table class="telecharge-table">
			<thead>	
				<tr>
					<th>Nom</th>
					<th>taille</th>
					<th>action</th>
				</tr>
			</thead>
			<tfoot>
				
			</tfoot>
			<tbody>
				<?php 
		try{
			$bdd = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_GET['matiere'])){
			$reponse = $bdd->prepare('SELECT path_doc,name,ROUND(size,2) AS round_size FROM document_gme WHERE nom_matiere=:nom_matiere');
			$reponse->execute(array('nom_matiere'=>$matiere));
			while($donnees = $reponse->fetch()){

				echo '<tr>';
						echo '<td>'.$donnees['name'].'</td>';
						echo '<td>'.$donnees['round_size'].'Mo</td>';
						if(!isset($_SESSION['email'])){
							echo '<td><a title="connectez-vous pour pouvoir télécharger">Télécharger</a></td>';
						}
						else{
							echo "<td><a href=../".$donnees['path_doc']." download=".$donnees['name'].">Télécharger</a></td>";
						}
				echo '</tr>';

			}
		}
	 ?>			
			</tbody>
		</table>
	</div>
</body>
</html>