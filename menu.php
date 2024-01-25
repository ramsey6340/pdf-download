<?php 
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die('Error: '.$e->getMessage());
		}
		if(isset($_SESSION['id'])){
			$requete = $db->prepare('SELECT etat FROM members WHERE id=:id');
			$requete->execute(array('id'=>$_SESSION['id']));
			$data = $requete->fetch();
			if($data['etat'] == 0){
				$_SESSION = array();
				session_destroy();

				setcookie('email','');
				setcookie('password','');
				setcookie('id','');
			}
		}
 ?>
 <header>
	<h1 style="color:rgb(170,0,0);text-decoration: none;">PDF-download</h1>
</header>
 <?php
include('script_mobile.php');
if($isPhone || $isMobile) {
	include("nav_mobile.php");
}
else{
  ?>
<!-- le menu de la page -->
<style>

 #myLinks {
  display: none;
  background: black;
  width: 20%;
  position: absolute;
  right: 0px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  background-color: #f1f1f1;
}
#myLinks h2,h3,h4{
	border: none;
	text-align: center;
	margin: 0px;
	font-weight: lighter;
	font-style: italic;	
}
#myLinks a{
	border: none;
	background: none;
}
.modif{
	width: 100px;
  margin: auto;
  display: flex;
  flex-direction: row;
}
a.icon {
  border: none;

 }



.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}





</style>
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

<style>
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  border-bottom: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

</style>
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  text-align: right;
  background-color: #f1f1f1;
  overflow: hidden;
}
</style>
<nav>
	<ul class="menu">
		<li class="sous-item1"><a href="index.php">Acceuil</a></li>
		
		<?php 
			if(isset($_SESSION['email'])){
				// Lien pour le telechargement
				switch($_SESSION['filiere']){
					case 'git':
						echo "<li class='sous-item1'><a href='git.php'>Télécharger</a></li>";
						break;
					case 'geea':
						echo "<li class='sous-item1'><a href='geea.php'>Télécharger</a></li>";
						break;
					case 'gme':
						echo "<li class='sous-item1'><a href='gme.php'>Télécharger</a></li>";
						break;
					case 'geo':
						echo "<li class='sous-item1'><a href='geo.php'>Télécharger</a></li>";
						break;
					case 'gc':
						echo "<li class='sous-item1'><a href='gc.php'>Télécharger</a></li>";
						break;
					case 'topo':
						echo "<li class='sous-item1'><a href='topo.php'>Télécharger</a></li>";
						break;
					default:
						//on insert ici la page erreur
						break;


				}
				?>
				<!-- code pour la science fondamentale (SF) -->
	<li>
	<div class="dropdown">
  		<a class="dropbtn">SF</a>
  		<div class="dropdown-content">
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
  		</div>
	</div>
	</li>
  			
				<?php
				//Lien pour le partage 
				switch($_SESSION['filiere']){
					case 'git':
						echo "<li class='sous-item1'><a href='partage-git.php'>Partage</a></li>";
						break;
					case 'geea':
						echo "<li class='sous-item1'><a href='partage-geea.php'>Partage</a></li>";
						break;
					case 'gme':
						echo "<li class='sous-item1'><a href='partage-gme.php'>Partage</a></li>";
						break;
					case 'geo':
						echo "<li class='sous-item1'><a href='partage-geo.php'>Partage</a></li>";
						break;
					case 'gc':
						echo "<li class='sous-item1'><a href='partage-gc.php'>Partage</a></li>";
						break;
					case 'topo':
						echo "<li class='sous-item1'><a href='partage-topo.php'>Partage</a></li>";
						break;
					default:
						// on insert ici la page erreur
						break;

				}
				?>				
				<li class="sous-item1"><a href="about.php">A propros</a></li>
				<?php
			}
		 ?>
		
	</ul>
	<ul  class="ul2">
		<?php 
				if(isset($_SESSION['email'])){
					echo '<li class="sous-item1">';
						echo '<a href="javascript:void(0);" class="icon" onclick="myFunction()">';
    					echo '<i class="fa fa-user-circle-o" style="font-size:36px"></i>';
  					echo '</a>';
					echo'</li>';
				}
				?>
				</ul>
			
				<?php

				if(!isset($_SESSION['email'])){
					echo '<ul class="menu">';
					echo '<li class="sous-item2">';
						echo '<a href="connexion.php">SE CONNECTER</a>';
					echo '</li>';
					echo '<li class="sous-item2">';
						echo "<a href='inscrire.php'>S'INSCRIRE</a>";
					echo '</li>';
					echo '</ul>';
				}
		 ?>
	
</nav>
<div class="topnav">
<div id="myLinks">
    <h2><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h2>
    <h4 ><?= $_SESSION['email'] ?></h4>
    <h4><?= $_SESSION['naissance'] ?></h4>
    <h4><?= $_SESSION['filiere'] ?></h4><br>
    <h3><a href="deconnexion.php" style="color:rgb(170, 0, 0); padding: 0px; height: 20px;">DECONNEXION</a></h3><br>
   <div class="modif">
      <i class="fa fa-edit" style="font-size:20px; padding-top: 16px;"></i>
      <a href="modif.php" style="color:black;">modifier</a>
    </div>
  </div>
</div>
<?php 
}
 ?>
 