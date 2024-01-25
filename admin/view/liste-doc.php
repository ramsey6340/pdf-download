<?php 
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die('ERROR: '.$e->getMessage());
	}

	// Le code à executer si le document a été accepter par l'administrateur
	if(isset($_GET['accepter']) AND isset($_GET['fil'])){
		$id_doc = (int)$_GET['accepter'];
		$filiere = htmlspecialchars($_GET['fil']);
		if($id_doc != 0 AND $filiere !=""){
			$req = $db->prepare('SELECT * FROM verify WHERE id = :id_doc');
			$req->execute(array('id_doc'=>$id_doc));
			$data = $req->fetch();
			$existence = false;

			// Pour la filiere git
			if($filiere == 'git'){
				$req1 = $db->query('SELECT path_doc FROM document_git');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_git(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/git/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'git'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/git/'.$data['name']);
					}
			}
			// Pour la filiere gme
			if($filiere == 'gme'){
				$req1 = $db->query('SELECT path_doc FROM document_gme');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_gme(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/gme/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'gme'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/gme/'.$data['name']);
					}
			}
			// Pour la filiere geea
			if($filiere == 'geea'){
				$req1 = $db->query('SELECT path_doc FROM document_geea');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_geea(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/geea/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'geea'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/geea/'.$data['name']);
					}
			}
			// Pour la filiere gc
			if($filiere == 'gc'){
				$req1 = $db->query('SELECT path_doc FROM document_gc');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_gc(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/gc/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'gc'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/gc/'.$data['name']);
					}
			}
			// Pour la filiere geologie
			if($filiere == 'geo'){
				$req1 = $db->query('SELECT path_doc FROM document_geo');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_geo(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/geo/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'geo'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/geo/'.$data['name']);
					}
			}
			// Pour la filiere topographie
			if($filiere == 'topo'){
				$req1 = $db->query('SELECT path_doc FROM document_topo');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_topo(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/topo/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'nom_matiere'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'topo'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/topo/'.$data['name']);
					}
			}
			// Pour la science fondamental mathematique
			if($filiere == 'SF-M'){
				$req1 = $db->query('SELECT path_doc FROM document_math');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_math(name,path_doc,size,type,classe,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:classe,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/math/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'classe'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'SF-M'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/math/'.$data['name']);
					}
			}
			// Pour la science fondamentale physique
			if($filiere == 'SF-P'){
				$req1 = $db->query('SELECT path_doc FROM document_phy');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_phy(name,path_doc,size,type,classe,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:classe,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/physique/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'classe'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'SF-P'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/physique/'.$data['name']);
					}
			}
			// Pour la science fondamentale chimie
			if($filiere == 'SF-C'){
				$req1 = $db->query('SELECT path_doc FROM document_chi');
					while(($data1 = $req1->fetch()) AND $existence == false){
						if($data['path_doc'] == $data1['path_doc']){
							$existence = true;
						}
					}
					if($existence == true){
					?>
						<script type="text/javascript">alert("Le fichier existe déjàs");</script>
					<?php
					}
					else{
						$req = $db->prepare('INSERT INTO document_chi(name,path_doc,size,type,classe,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:classe,:var_matiere,:filiere)');
						$req->execute(array('name'=>$data['name'],'path_doc'=>'admin/upload/chimie/'.$data['name'],'size'=>$data['size'],'type'=>$data['type'], 'classe'=>$data['nom_matiere'],'var_matiere'=>$data['var_matiere'],'filiere'=>'SF-C'));
						$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc');
						$req->execute(array('id_doc'=>$id_doc));
						rename('.././upload/tmp/'.$data['name'],'.././upload/chimie/'.$data['name']);
					}
			}
		}
	}
	// Fin du code d'acceptation du document

	// Le code à executer si le document a été refuser par l'administrateur
	if(isset($_GET['refuser']) AND isset($_GET['fil'])){
		$id_doc = (int)$_GET['refuser'];
		$filiere = htmlspecialchars($_GET['fil']);
		$req = $db->prepare('SELECT * FROM verify WHERE id = :id_doc');
		$req->execute(array('id_doc'=>$id_doc));
		$data = $req->fetch();
		if($id_doc != 0 AND $filiere != ""){
			$req = $db->prepare('DELETE FROM verify WHERE id = :id_doc AND filiere = :filiere');
			$req->execute(array('id_doc'=>$id_doc, 'filiere'=>$filiere));
			unlink('.././upload/tmp/'.$data['name']);			
		}
	}
	// Fin du code de refut du document

	// On recupère les données dans chaque table pour pouvoir les afficher
	$req = $db->query('SELECT * FROM verify ORDER BY id DESC');
	

	// On affiche le contenue de chaque table

	while($data = $req->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td><a href=../../'.$data['path_doc'].'>'.$data['name'].'</a></td>';
			echo '<td>'.$data['size'].'</>';
			echo '<td>'.$data['filiere'].'</td>';
			echo '<td>'.$data['nom_matiere'].'</td>';
			echo '<td>'.$data['type'].'</td>';

			echo '<td>';
				echo '<div class="form-row">';

					echo "<a href=doc.php?accepter=".$data['id']."&fil=".$data['filiere'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Accepter';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";
            		echo '&nbsp;';
            		echo "<a href=doc.php?refuser=".$data['id']."&fil=".$data['filiere'].">";
						echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              				echo '<span class="text">';
              					echo 'Refuser';
              				echo '</span>';
            			echo '</button>';
            		echo "</a>";

            	echo '</div>';
			echo'</td>';

		echo '</tr>';
	}

 ?>