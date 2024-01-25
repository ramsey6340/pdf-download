<?php 
session_start();
  if(isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php include("nav.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
        <br><br>
        <!-- End of Topbar -->
        <div class="container-fluid">      

          <!-- Content Row -->
          <h1 class="h3 mb-2 text-gray-800">Ajouter de nouveau document de GIT</h1><br>
          <!-- Debut des nouvelle insertion -->
          
          <section id="sec-partage">
  <?php 
        try{
          $db = new PDO('mysql:host=localhost; dbname=eniac; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $db2 = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
          die('ERREUR: '.$e->getMessage()); 
        }
        $req = $db->query('SELECT licence1, licence2, licence3 FROM nom_matiere_git');
  ?>
        
      <div class="input-file-contrainer">
        <form method="post" action="share-git.php" enctype="multipart/form-data">
          <input list="nom_matiere" name="search" placeholder="nom de la matière" required>
          <datalist id="nom_matiere">
  <?php   
          while($data = $req->fetch()){
            echo '<option >'.$data['licence1'].'</option>';
            echo '<option >'.$data['licence2'].'</option>';
            echo '<option >'.$data['licence3'].'</option>';

          } 
  ?>
          </datalist><br>
          <input hidden type="file" id="my-file" name="fichier[]" class="input-file" multiple>
          <label for="my-file" class="input-file-trigger" tabindex="0">&emsp;&emsp;&emsp;&emsp;FILE</label>
          <input type="submit" name="submit" value="Partager">
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

          <!-- End of Main Content -->

        <!-- Footer -->
        <?php include("../../footer.php"); ?> 
        </div>
  </div>

  <!-- ==================Traitements des fichier partagé================= -->
  
<?php
  if (isset($_FILES["fichier"]) AND $_POST['search']){
   
    $nom_matiere=$_POST['search'];
    foreach ($_FILES['fichier']['name'] as $key => $value){

      if($_FILES['fichier']['error'][$key] == 1){

        $file_error=$_FILES['fichier']['name'][$key];
        ?>
        <script type="text/javascript">
          var file_error = '<?= $file_error ?>';
          alert(file_error+' a provoquer une erreur !');
        </script>
        <?php
        exit();
      }
      $var_matiere='Inconnue';
      $file_size = (double)$_FILES['fichier']['size'][$key];
      $info_file = pathinfo($_FILES['fichier']['name'][$key]);
      $extension_upload = $info_file['extension'];
      $extension_autoriser = array('pdf','doc','docx','xlsx','ppt','pptx','txt');
      $file_name = basename($_FILES['fichier']['name'][$key]);
        $file_name = preg_replace('#[ ]#','_', $file_name);
        if(in_array($extension_upload,$extension_autoriser)){

          $reponse = $db2->query('SELECT path_doc FROM document_git');
            $existance = false;
            while($donnees = $reponse->fetch()){
              if('admin/upload/git/'.$file_name == $donnees['path_doc']){
                  $existance = true;

              }
            }
            if($existance){
            ?>
              <script type="text/javascript">
                var file_name='<?= $file_name ?>';
                alert("Le fichier "+ file_name +" existe déjà!");
              </script>
            <?php
            }
            else{
              move_uploaded_file($_FILES['fichier']['tmp_name'][$key],'../../../upload/git/'.$file_name);
              $insertion = $db2->prepare('INSERT INTO document_git(name,path_doc,size,type,nom_matiere,var_matiere,filiere) VALUES(:name,:path_doc,:size,:type,:nom_matiere,:var_matiere,:filiere)');
              $insertion->execute(array('name'=>$file_name,'path_doc'=>'admin/upload/git/'.$file_name,'size'=>($file_size/1000000.0),'type'=>'admin','nom_matiere'=>$nom_matiere,'var_matiere'=>$var_matiere,'filiere'=>'git'));
            ?>
            <script type="text/javascript">
              var file_name='<?= $file_name ?>';
              alert('UPLOADE  DE '+ file_name +' REUSSI !');
            </script>
            <?php
            }
            $reponse->closecursor();
        }
        else{
          ?>
          <script type="text/javascript">
            var file_name='<?= $file_name ?>';
            alert('Le fichier'+ file_name +' n\'est pas accepter !');
          </script>
          <?php
        }

    }               
  }
?>
</body>
</html>
<?php
}
else{
  header('Location: ../identify.php');
}

