<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Filiere</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="partage.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Choisissez un lieu de partage</h2>
	
	<section id="sec-content1">
		<div class="div11">

			<div class="column">
			<div class="div2">

				<div class="div3">
					<img usemap="#git" src="img/git1.png">
					<map name="git">
						<area shape="rect" coords="8,8,720,406" href="partage-git.php" alt="un logo de devellopeur">
					</map>
					<a href="partage-git.php">Genie informatique-telecommunication</a>
				</div>

				<div class="div3">
					<img usemap="#gme" src="img/gme2.png">
					<map name="gme">
						<area shape="rect" coords="0,0,659,647" href="partage-gme.php" alt="un logo de moteur">
					</map>
					<a href="partage-gme.php?">Genie mecanique et electronique</a>
				</div>

				<div class="div3">
					<img usemap="#geea" src="img/geea2.png">
					<map name="geea">
						<area shape="rect" coords="0,0,720,530" href="partage-geea.php" alt="un logo de circuit electronique">
					</map>
					<a href="partage-geea.php?">Genie electrique electronique et automatique</a>
				</div>

			</div>

			<div class="div2">

				<div class="div3">
					<img usemap="#gc" src="img/gc.png">
					<map name="gc">
						<area shape="rect" coords="0,0,720,319" href="partage-gc.php" alt="un logo de batiment">
					</map>
					<a href="partage-gc.php">Genie civile</a>
				</div>

				<div class="div3">
					<img usemap="#geologie" src="img/geo1.png">
					<map name="geologie">
						<area shape="rect" coords="0,0,720,400" href="partage-geo.php" alt="un logo de lingo d'or">
					</map>
					<a href="partage-geo.php">Geologie</a>	
				</div>

				<div class="div3">
					<img usemap="#topo" src="img/topo.png">
					<map name="topo">
						<area shape="rect" coords="0,0,681,531" href="partage-topo.php" alt="un logo de plan de topographie">
					</map>
					<a href="partage-topo.php">Topographie</a>
				</div>

			</div>
			</div>

			<div class="div2">

				<div class="div3">
					<img usemap="#math2" src="img/math.png">
					<map name="math2">
						<area shape="rect" coords="0,0,720,797" href="partage-math.php" alt="">
					</map>
					<a href="partage-math.php">Mathematique</a>
				</div>

				<div class="div3">
					<img usemap="#phy2" src="img/phy2.png">
					<map name="phy2">
						<area shape="rect" coords="0,0,720,595" href="partage-phy.php" alt="">
					</map>
					<a href="partage-phy.php">Physique</a>
				</div>

				<div class="div3">
					<img usemap="#chi2" src="img/chimie1.png">
					<map name="chi2">
						<area shape="rect" coords="0,0,720,595" href="partage-chi.php" alt="">
					</map>
					<a href="partage-chi.php">Chimie</a>	
				</div>

			</div>	


		</div>		
	</section>
	<?php include("footer.php"); ?>
</body>
</html>