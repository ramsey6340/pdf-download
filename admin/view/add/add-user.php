<?php 
session_start();
if(isset($_SESSION['login'])){
 ?>
  <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include("nav.php"); ?>
  <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <br><br>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800">Ajouter un nouveau utilisateur</h1>
         <form class="user" action="add-user.php" method="post">
                                           
                                            <!-- Form Row-->
                                            <div class="form-row">
                                                <!-- Form Group (first name)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="pseudonyme"><b>Pseudonyme</b></label>
                                                    <input class="form-control" id="pseudonyme" name="pseudo" type="text" placeholder="Entrer le pseudonyme" required />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="dateBirth"><b>Date de naissance</b></label>
                                                    <input class="form-control" id="dateBirth" name="date_naissance" type="date" placeholder="Enter la date de naissance" required />
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="form-row">
                                                <!-- Form Group (organization name)-->
                                                 
                                                <!-- Form Group (location)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputLocation"><b>Adresse mail</b></label>
                                                     <input class="form-control" id="jspactest" name="email" type="email" placeholder="Entrer l'adresse mail" required  />
                                    </div>
                                    <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="password"><b>Mot de passe</b></label>
                                                    <input class="form-control" id="password" type="password" name="password" placeholder="Entrer le mot de passe" required  />
                                                </div>
                                                <!-- Form Group (birthday)-->
                                                 
                                            </div>

                                            <div class="form-row">
                                                <!-- Form Group (first name)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="confirmPassword"><b>Confirmation du mot de passe</b></label>
                                                    <input class="form-control" id="confirmPassword" name="confirme_passe" type="password" placeholder="Entrer la confirmation" required />
                                                </div>
                                            </div>
            <div class="modal-footer">
              <input type="submit" value="Enregistrer" class="btn btn-primary" >
            </div></form>   


        </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php include("footer.php"); ?> 
    </div>
  </div>
</body>
</html>
<?php 
  try{
    $db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch(Exception $e){
    die('ERROR:'.$e->getMessage());
  }
  if(isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirme_passe']) AND isset($_POST['date_naissance'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirme_passe = password_hash($_POST['confirme_passe'],PASSWORD_DEFAULT);
    if($_POST['password'] == $_POST['confirme_passe']){
      $req=$db->prepare('INSERT INTO members(pseudo,email,date_naissance,password,etat,date_inscription) VALUES(:pseudo,:email,:date_naissance,:password,:etat,NOW())');
      $retoure=$req->execute(array('pseudo'=>$pseudo,'email'=>$email,'date_naissance'=>$date_naissance,'password'=>$password,'etat'=>1));
      if($retoure){
        ?>
          <script type="text/javascript">alert("L'ajout c'est bien passé");</script>
        <?php
      }
      else{
        ?>
          <script type="text/javascript">alert("Erreur l'or de l'ajout\nVeuillez ressayer");</script>
        <?php
      }
    }
    else{
      ?>
        <script type="text/javascript">alert("Les mots de passe ne correspondent pas");</script>
      <?php
    }
  }
}
else{
  header('Location: ../../identify.php');
}
?>
