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
	<h2>Partager des documents de Physique</h2>
	<section id="sec-partage">
		
		<p>Envoyer des documents de vos propre repertoire pour que d'aute personne puisse en profiter.</p>
		<p>Dans le monde actuel, le partage est essentiel pour l'evolution du savoir.</p>
		<p>Et vos document vont permettre, à nous et d'autre personne d'evoluer et d'avoir plus de ressource.</p><br>

		<h1 style="text-align: center; font-weight: lighter;">Partager vos fichiers</h1>
	<?php 
		if(isset($_SESSION['email'])){
				try{
					$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}catch(Exception $e){
					die('ERREUR: '.$e->getMessage()); 
				}
				?>
			<div class="input-file-contrainer">
				<form method="post" action="partage-phy.php" enctype="multipart/form-data">
					<select name="classe">
							<option value="licence1">Licence 1</option>
							<option value="licence2">Licence 2</option>
							<option value="licence3">Licence 3</option>
							<option value="master1">Master 1</option>
							<option value="master2">Master 2</option>
					</select>
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
  
    if(isset($_FILES['fichier']) AND isset($_POST['classe']) AND $_FILES['fichier']['error']==0){
    	$classe = $_POST['classe'];
      if(($size = (double)$_FILES['fichier']['size'])<=5000000){
        $infosfichier = pathinfo($_FILES['fichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extension_autoriser = array('pdf','doc','docx','xlsx','ppt','pptx','txt');
        $path_doc = basename($_FILES['fichier']['name']);
        $path_doc = preg_replace('#[ ]#','_', $path_doc);
        if(in_array($extension_upload,$extension_autoriser)){
          $reponse = $db->query('SELECT path_doc FROM document_phy');
          $existance = false;
          while ($donnees = $reponse->fetch()){
            if('admin/upload/physique/'.$path_doc == $donnees['path_doc']){
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
            $insertion = $db->prepare('INSERT INTO verify(name,path_doc,size,type,nom_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:classe,:filiere)');
            $insertion->execute(array('name'=>$name,'path_doc'=>'admin/upload/tmp/'.$name,'size'=>($size/1000000.0),'type'=>'admin','classe'=>$classe,'filiere'=>'SF-P'));
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