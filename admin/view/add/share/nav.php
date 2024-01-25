 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">PDF-Download</div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Personnes
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="../../user.php">
          <span>Utilisateurs</span></a>
      </li>
      <?php 
        if($_SESSION['power'] == 'all'){
          ?>
            <li class="nav-item active">
        <a class="nav-link" href="../../admin.php">
          <span>Administrateurs</span></a>
      </li>
          <?php
        }
       ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Action
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="../../doc.php">
          <span>Les partages</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="../../mydoc.php">
          <span>Mes documents</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="../../add.php">
          <span>Ajouter</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../deconnexion.php">
          <span>Deconnexion</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     

    </ul>
    <!-- End of Sidebar -->