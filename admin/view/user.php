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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <?php include("nav.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <br><br>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Les utilisateurs</h1>

            <?php include("header-liste-user.php"); ?>

           </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste des utilisateurs inscritent sur PDF-download</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom complet</th>
                      <th>Date de naissance</th>
                      <th>E-mail</th>
                      <th>Filière</th>
                      <th>Statut</th>
                      <th>Etat</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Identifiant</th>
                      <th>Nom complet</th>
                      <th>Date de naissance</th>
                      <th>E-mail</th>
                      <th>Filière</th>
                      <th>Statut</th>
                      <th>Etat</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php include("liste-user.php"); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <?php include("footer.php"); ?>

</body>

</html>
 <?php
}
else{
  header('Location: ../identify.php');
}
?>

