<?php 
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die('ERROR: '.$e->getMessage());
	}

	// La supprimer des documents

	if(isset($_GET['sup']) AND isset($_GET['fil']) AND isset($_GET['name'])){
		$id_doc = (int)$_GET['sup'];
		$filiere = htmlspecialchars($_GET['fil']);
		$file_name = htmlspecialchars($_GET['name']);
		switch($filiere){
			case 'git';
				$req = $db->prepare('DELETE FROM document_git WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/git/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'gme';
				$req = $db->prepare('DELETE FROM document_gme WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/gme/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'geea';
				$req = $db->prepare('DELETE FROM document_geea WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/geea/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'geo';
				$req = $db->prepare('DELETE FROM document_geo WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/geo/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'gc';
				$req = $db->prepare('DELETE FROM document_gc WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/gc/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'topo';
				$req = $db->prepare('DELETE FROM document_topo WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/topo/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'SF-M';
				$req = $db->prepare('DELETE FROM document_math WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/math/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'SF-P';
				$req = $db->prepare('DELETE FROM document_phy WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/physique/'.$file_name);
				header('Location: mydoc.php');
				break;
			case 'SF-C';
				$req = $db->prepare('DELETE FROM document_chi WHERE id = :id_doc');
				$req->execute(array('id_doc'=>$id_doc));
				unlink('.././upload/chimie/'.$file_name);
				header('Location: mydoc.php');
				break;
			default:

				break;
		}			
	}


	// Fin de la suppression des documents

	// On recupère les données dans chaque table pour pouvoir les afficher
	$req1 = $db->query('SELECT * FROM document_gc ORDER BY id DESC');
	$req2 = $db->query('SELECT * FROM document_gme ORDER BY id DESC');
	$req3 = $db->query('SELECT * FROM document_geea ORDER BY id DESC');
	$req4 = $db->query('SELECT * FROM document_git ORDER BY id DESC');
	$req5 = $db->query('SELECT * FROM document_geo ORDER BY id DESC');
	$req6 = $db->query('SELECT * FROM document_topo ORDER BY id DESC');
	$req7 = $db->query('SELECT * FROM document_math ORDER BY id DESC');
	$req8 = $db->query('SELECT * FROM document_phy ORDER BY id DESC');
	$req9 = $db->query('SELECT * FROM document_chi ORDER BY id DESC');
	
	// On affiche le contenue de chaque table

	// pour GC
	while($data = $req1->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';
            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";
            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	// pour GME
	while($data = $req2->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	//pour GEEA
	while($data = $req3->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	//pour GIT
	while($data = $req4->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	//pour GEOLOGIE
	while($data = $req5->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	//pour TOPOGRAPHIE
	while($data = $req6->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}
	//pour la mathematique
	while($data = $req7->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['classe'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	// pour la physique
	while($data = $req8->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['classe'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

	// pour la chimie
	while($data = $req9->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['var_matiere'].'</td>';
			echo '<td>'.$data['size'].'</td>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['classe'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

            		echo "<a href=mydoc.php?sup=".$data['id']."&fil=".$data['filiere']."&name=".$data['name'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Supprimer';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

 ?>