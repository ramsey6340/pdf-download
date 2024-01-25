<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Partage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Partager des documents de Genie Informatique et Télécommunication (GIT)</h2>
	<section id="sec-partage">
		
		<p>Envoyer des documents de vos propre repertoire pour que d'aute personne puisse en profiter.</p>
		<p>Dans le monde actuel, le partage est essentiel pour l'evolution du savoir.</p>
		<p>Et vos document vont permettre, à nous et d'autre personne d'evoluer et d'avoir plus de ressource.</p><br>

		<h1 style="text-align: center; font-weight: lighter;">Partager vos fichiers</h1>
	<?php 
		if(isset($_SESSION['email'])){
				try{
					$db = new PDO('mysql:host=localhost; dbname=eniac; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					$db2 = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}catch(Exception $e){
					die('ERREUR: '.$e->getMessage()); 
				}
				$req = $db->query('SELECT licence1, licence2, licence3 FROM nom_matiere_git');
				?>
				
			<div class="input-file-contrainer">
				<form method="post" action="partage-git.php" enctype="multipart/form-data">
					<input list="nom_matiere" name="search" placeholder="nom de la matière" required><br>
					<datalist id="nom_matiere">
				<?php 	
					while($data = $req->fetch()){
						echo '<option >'.$data['licence1'].'</option>';
						echo '<option >'.$data['licence2'].'</option>';
						echo '<option >'.$data['licence3'].'</option>';
						/*echo '<option value='.$data['licence2'].'>';
						echo '<option value='.$data['licence3'].'>';*/
					}	
				?>
					</datalist>
					<input type="file" id="my-file" name="fichier" class="input-file" multiple>
					<label for="my-file" class="input-file-trigger" tabindex="0">&emsp;&emsp;&emsp;Selectionner vos fichier</label>
					<input type="submit" value="Partager">
				</form>			
			</div>
			<p class="file-return"></p>

	<script type="text/javascript">
		//ajout de la class JS à HTML
		document.querySelector("html").classList.add('js');
		//initialisation des variable
		var fileInput = document.querySelector(".input-file"), button = document.querySelector(".input-file-trigger"), the_return  = document.querySelector(".file-return");
		//action lorsque la "barre d'espace" ou "Entrée" est pressée
		button.addEventListener("keydown", function(event){
			if(event.keyCode == 13 || event.keyCode == 32){
				fileInput.focus();
			}
		});
		//action lorsque le label est cliqué
		button.addEventListener("click", function(event){
			fileInput.focus();
			return false;
		});
		//affiche un retour visuel des que input:file change
		fileInput.addEventListener("change", function(event){
			the_return.innerHTML = this.value;
		});
	</script>
	</section>
	<?php include("footer.php"); ?>

<!-- ==================Traitements des fichier partagé================= -->
		<?php 
  
    if(isset($_FILES['fichier']) AND $_POST['search'] AND $_FILES['fichier']['error']==0){
    	$nom_matiere = $_POST['search'];
    	$var_matiere='Inconnue';
    	//Script pour recuperer la variable correspondant à la matière $nom_matiere
    	$champ1 = $db->prepare('SELECT ID FROM nom_matiere_git WHERE licence1=:search');
    	$champ2 = $db->prepare('SELECT ID FROM nom_matiere_git WHERE licence2=:search');
    	$champ3 = $db->prepare('SELECT ID FROM nom_matiere_git WHERE licence3=:search');
    	while(($data = $champ1->fetch())){
    		$id_var = $data['ID'];
    		$var = $db->prepare('SELECT licence1 FROM nom_matiere_git WHERE ID = :id_var');
    		$var->execute(array('id_var'=>$id_var));
    		$var_matiere = $var;
    	}
    	while(($data = $champ2->fetch())){
    		$id_var = $data['ID'];
    		$var = $db->prepare('SELECT licence2 FROM nom_matiere_git WHERE ID = :id_var');
    		$var->execute(array('id_var'=>$id_var));
    		$var_matiere = $var;
    		    	}
    	while(($data = $champ3->fetch())){
    		$id_var = $data['ID'];
    		$var = $db->prepare('SELECT licence3 FROM nom_matiere_git WHERE ID = :id_var');
    		$var->execute(array('id_var'=>$id_var));
    		$var_matiere = $var;
    	}
    	//Fin du script de recherche de la variable 

      if(($size = (double)$_FILES['fichier']['size'])<=100000000){
        $infosfichier = pathinfo($_FILES['fichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extension_autoriser = array('pdf','doc','docx','xlsx','ppt','pptx','txt');
        $path_doc = basename($_FILES['fichier']['name']);
        $path_doc = preg_replace('#[ ]#','_', $path_doc);
        if(in_array($extension_upload,$extension_autoriser)){
          $reponse = $db2->query('SELECT path_doc FROM document_git');
          $existance = false;
          while ($donnees = $reponse->fetch()){
            if('admin/upload/git/'.$path_doc == $donnees['path_doc']){
              $existance = true;
            }
          }
          
          if($existance){
            ?>
              <script type="text/javascript">
                alert("Ce fichier existe déjà");
              </script>
            <?php
          }
          else{
            $name = basename($_FILES['fichier']['name']);
            $name = preg_replace('#[ ]#','_', $name);
            move_uploaded_file($_FILES['fichier']['tmp_name'],'admin/upload/tmp/'.$name);
            $insertion = $db2->prepare('INSERT INTO verify(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
            $insertion->execute(array('name'=>$name,'path_doc'=>'admin/upload/tmp/'.$name,'size'=>($size/1000000.0),'type'=>'admin','nom_matiere'=>$nom_matiere,'var_matiere'=>$var_matiere,'filiere'=>'git'));
            ?>
            <script type="text/javascript">
              alert("Le fichier a bien été envoyé");
            </script>
            <?php
          }
          $reponse->closeCursor();	
				}
				else{?>
				<script type="text/javascript">
					alert("Ce type de fichier n'est pas accepter")
				</script>
				<?php 
				} 
			}
			else{
			?>
			<script type="text/javascript">
				alert("Votre fichier est trop lourd");
			</script>
			<?php
		}
		}
		if(isset($_FILES['fichier']) AND $_FILES['fichier']['error']!=0){
			?>
				<script type="text/javascript">
					alert("ERREUR: ENVOIE IMPOSSIBLE");
				</script>
			<?php
		}

//==========================Fin du traitement=======================

}
?>
	
</body>
</html>