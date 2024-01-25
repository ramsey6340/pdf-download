<?php 
try{
    $bdd2 = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd = new PDO('mysql:host=localhost; dbname=eniac; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch(Exception $e){
        die('Error: '.$e->getMessage());
    }
    $req = $bdd->query('SELECT licence1, licence2, licence3 FROM nom_matiere_git');
 ?>
<br>
<div class="">
              <form method="post" action="add-doc.php" enctype="multipart/form-data">
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
          <label for="my-file" class="input-file-trigger" tabindex="0">&emsp;&emsp;&emsp;inserer vos fichier</label>
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

  <!-- ==================Traitements des fichier partagé================= -->
    <?php 
  
    if(isset($_FILES['fichier']) AND $_FILES['fichier']['error']==0){
      if(($size = (double)$_FILES['fichier']['size'])<=5000000){
        $infosfichier = pathinfo($_FILES['fichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extension_autoriser = array('pdf','doc','docx','xlsx','ppt','pptx','txt');
        $path_doc = basename($_FILES['fichier']['name']);
        $path_doc = preg_replace('#[ ]#','_', $path_doc);
        if(in_array($extension_upload,$extension_autoriser)){
          $reponse = $bdd->query('SELECT path_doc FROM documents');
          $existance = false;
          while ($donnees = $reponse->fetch()){
            if('admin/upload/'.$path_doc == $donnees['path_doc']){
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
            move_uploaded_file($_FILES['fichier']['tmp_name'],'../../upload/'.$name);
            $insertion = $bdd->prepare('INSERT INTO documents(name,path_doc,size,type,matiere) VALUES(:name,:path_doc,:size,:type,:matiere)');
            $insertion->execute(array('path_doc'=>'admin/upload/'.$name,'name'=>$name,'size'=>($size/1000000.0),'type'=>'admin','matiere'=>'Inconnue'));
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
      header('Location: add-doc.php');
    }
?>

<!-- ==========================Fin du traitement======================= -->

