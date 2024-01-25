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

	
	<h2>Telechargement des documents de chimie</h2>
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
			$reponse = $bdd->query('SELECT path_doc,name,classe,ROUND(size,2) AS round_size FROM document_chi');
			while($donnees = $reponse->fetch()){

				echo '<tr>';
						echo '<td>'.$donnees['name'].'('.$donnees['classe'].')</td>';
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