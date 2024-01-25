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

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-2 text-gray-800">Ajouter de nouveau document</h1><br>
          <!-- Debut des nouvelle insertion -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-git.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GIT</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
                        
           
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-gme.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GME</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-geea.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GEEA</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-gc.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GC</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          </div>



           <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-geo.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GEOLOGIE</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
                        
           
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-topo.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOPOGRAPHIE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-math.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MATHEMATIQUE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-phy.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PHYSIQUE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          </div>


           <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="share/share-chi.php">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CHIMIE</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          </div>





      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("footer.php"); ?> 
    </div>
  </div>

</body>

</html>

    <?php
  }
  else{
    header('Location: ../identify.php');
  }
 ?>
