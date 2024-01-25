<!-- style de l'icon contact après la connexio -->
<style>

 #myInfos {
  display: none;
  background: black;
  width: 100%;
  position: absolute;
  right: 0px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  background-color: #f1f1f1;
}
#myInfos h2,h3,h4{
  border: none;
  text-align: center;
  margin: 0px;
  font-weight: lighter;
  font-style: italic;
}
#myInfos a{
  border: none;
  background: none;
}
.modif{
  width: 100px;
  margin: auto;
  display: flex;
  flex-direction: row;
}
a.log {
  border: none;
  padding-top: 7px;
  background: rgb(170, 0, 0);
  position: absolute;
  right: 0px;
  top: 0px;
  
 }

a.log:hover{
  background-color: ;
}


</style>
<style>
.topnav {
  
  background-color: #333;
  position: relative;
}

.topnav #myLinks {
  display: none;
  padding: 14px 16px;
}

.topnav a {

  color: white;
  padding: 7px 16px;
  
  height:20px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  padding: 14px 16px;
  border: none;
  width: 20px;
  height: 20px;
}

.active {
  height: 48px;
  background-color: rgb(170,0,0);
  color: white;
}
#drop{
  display: none;
  padding-left: 50px;
}
</style>
<!-- Simulate a smartphone / tablet -->
<!-- Top Navigation Menu -->
<div class="topnav">
  <div  class="active"></div>
  <div id="myLinks">
    <a href="index.php">Accueil</a>
    <?php 
      if(isset($_SESSION['email'])){
        // Lien pour le telechargement
        switch($_SESSION['filiere']){
          case 'git':
            echo "<a href='git.php'>Télécharger</a>";
            break;
          case 'geea':
            echo "<a href='geea.php'>Télécharger</a>";
            break;
          case 'gme':
            echo "<a href='gme.php'>Télécharger</a>";
            break;
          case 'geo':
            echo "<a href='geo.php'>Télécharger</a>";
            break;
          case 'gc':
            echo "<a href='gc.php'>Télécharger</a>";
            break;
          case 'topo':
            echo "<a href='topo.php'>Télécharger</a>";
            break;
          default:
            //on insert ici la page erreur
            break;
        }
      
     ?>




     <div class="dropdown">
      <a href="javascript:void(0);" onclick="myDrop()" class="">SF</a>
      <div id="drop">
        <a href="download/load-math.php" class="accordion">Mathématique</a>
          
        <a href="download/load-phy.php" class="accordion">Physique</a>
          
        <a href="download/load-chi.php" class="accordion">Chimie</a>
          

            <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script type="text/javascript">
  function myDrop(){
    drop = document.getElementById("drop");
  if(drop.style.display === "block"){
    drop.style.display = "none";
  }
  else{
    drop.style.display = "block";
  }
  }
</script>


      </div>
  </div>
<?php
        //Lien pour le partage 
        switch($_SESSION['filiere']){
          case 'git':
            echo "<a href='partage-git.php'>Partage</a>";
            break;
          case 'geea':
            echo "<a href='partage-geea.php'>Partage</a>";
            break;
          case 'gme':
            echo "<a href='partage-gme.php'>Partage</a>";
            break;
          case 'geo':
            echo "<a href='partage-geo.php'>Partage</a>";
            break;
          case 'gc':
            echo "<a href='partage-gc.php'>Partage</a>";
            break;
          case 'topo':
            echo "<a href='partage-topo.php'>Partage</a>";
            break;
          default:
            // on insert ici la page erreur
            break;

        }
        ?>
    <a href="about.php">A propros</a>
<?php 
}
    if(!isset($_SESSION['email'])){
      echo '<a href="connexion.php">SE CONNECTER</a>';
      echo "<a href='inscrire.php'>S'INSCRIRE</a>";
    } 
?>
    
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <?php 
  if(isset($_SESSION['email'])){
            echo '<a href="javascript:void(0);" class="log" onclick="myIcon()">';
              echo '<i class="fa fa-user-circle-o" style="font-size:36px"></i>';
            echo '</a>';
    }
   ?>
</div>
<!-- End smartphone / tablet look -->

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<script>
function myIcon() {
  var x = document.getElementById("myInfos");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<div class="topnav">
<div id="myInfos">
    <h2><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h2>
    <h4 ><?= $_SESSION['email'] ?></h4>
    <h4><?= $_SESSION['naissance'] ?></h4>
    <h4><?= $_SESSION['filiere'] ?></h4><br>
    <h3><a href="deconnexion.php" style="color:rgb(170, 0, 0);">DECONNEXION</a></h3><br>
    <div class="modif">
      <i class="fa fa-edit" style="font-size:20px; padding-top: 10px;"></i>
      <a href="modif.php" style="color:black;">modifier</a>
    </div>
  </div>
  </div>
