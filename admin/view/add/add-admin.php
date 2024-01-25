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

          <h1 class="h3 mb-2 text-gray-800">Ajouter un nouveau administrateur</h1>
         <form class="user" action="add-admin.php" method="post">
                                           
                                            <!-- Form Row-->
                                            <div class="form-row">
                                                <!-- Form Group (first name)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="login"><b>Login</b></label>
                                                    <input class="form-control" id="login" name="login" type="text" placeholder="Entrer le login" required />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="power"><b>Power</b></label>
                                                    <select name="power" id="power" class="form-control">
                                                      <option value="all">All</option>
                                                      <option value="little">Little</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="form-row">
                                                <!-- Form Group (organization name)-->
                                                 
                                                <!-- Form Group (location)-->
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="password"><b>Mot de passe</b></label>
                                                    <input class="form-control" id="password" name="password" type="password" placeholder="Entrer le mot de passe" required  />
                                                </div>
                                                 <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="confirmPassword"><b>confirmer le mot de passe</b></label>
                                                    <input class="form-control" id="confirmPassword" name="confirme_passe" type="password" placeholder="Entrer la confirmation" required  />
                                                </div>
                                                <!-- Form Group (birthday)-->
                                                 
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
  if(isset($_POST['login']) AND isset($_POST['power']) AND isset($_POST['password']) AND isset($_POST['confirme_passe'])){
    $login = htmlspecialchars($_POST['login']);
    $power = $_POST['power'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirme_passe = password_hash($_POST['confirme_passe'],PASSWORD_DEFAULT);
    if($_POST['password'] == $_POST['confirme_passe']){
      $req=$db->prepare('INSERT INTO admin(login,password,power) VALUES(:login,:password,:power)');
      $retoure=$req->execute(array('login'=>$login,'password'=>$password,'power'=>$power));
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
        <script type="text/javascript">alert("Les mot de passe ne correspondent pas");</script>
      <?php
    }
  }
}
else{
  header('Location: ../../identify.php');
}
?>
