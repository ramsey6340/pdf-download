<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Filiere</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initiale-scrale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>Filieres</h2>
	
	<section id="sec-content">
		<div class="div1">
			<div class="div2">
				<div class="div3">
					<img usemap="#git" src="img/git1.png">
					<map name="git">
						<area shape="rect" coords="8,8,720,406" href="git.php" alt="">
						
					</map>
					<a href="git.php">Genie informatique-telecommunication</a>
				</div>
				<div class="div3">
					<img usemap="#gme" src="img/gme2.png">
					<map name="gme">
						<area shape="rect" coords="0,0,659,647" href="gme.php" alt="">
					</map>
					<a href="gme.php">Genie mecanique et electronique</a>
				</div>
				<div class="div3">
					<img usemap="#geea" src="img/geea2.png">
					<map name="geea">
						<area shape="rect" coords="0,0,720,530" href="geea.php" alt="">
					</map>
					<a href="geea.php">Genie electrique electronique et automatique</a>
				</div>
			</div>
			<div class="div2">
				<div class="div3">
					<img usemap="#math1" src="img/math.png">
					<map name="math1">
						<area shape="rect" coords="0,0,720,797" href="#" alt="">
					</map>
					<a href="#">Mathematique</a>
				</div>
				<div class="div3">
					<img usemap="#phy1" src="img/phy1.png">
					<map name="phy1">
						<area shape="rect" coords="0,0,720,721" href="#" alt="">
					</map>
					<a href="#">Physique</a>
				</div>
				<div class="div3">
					<img usemap="#chi1" src="img/chimie2.png">
					<map name="chi1">
						<area shape="rect" coords="0,0,720,486" href="#" alt="">
					</map>
					<a href="#">Chimie</a>	
				</div>
			</div>
		</div>
		<div class="hr"></div>
		<div class="div11">
			<div class="div2">
				<div class="div3">
					<img usemap="#gc" src="img/gc.png">
					<map name="gc">
						<area shape="rect" coords="0,0,720,319" href="civil.php" alt="">
					</map>
					<a href="civil.php">Genie civile</a>
				</div>
				<div class="div3">
					<img usemap="#geologie" src="img/geo1.png">
					<map name="geologie">
						<area shape="rect" coords="0,0,720,400" href="geo.php" alt="">
					</map>
					<a href="geo.php">Geologie</a>	
				</div>
				<div class="div3">
					<img usemap="#topo" src="img/topo.png">
					<map name="topo">
						<area shape="rect" coords="0,0,681,531" href="topo.php" alt="">
					</map>
					<a href="topo.php">Topographie</a>
				</div>
			</div>
			<div class="div2">
				<div class="div3">
					<img usemap="#math2" src="img/math.png">
					<map name="math2">
						<area shape="rect" coords="0,0,720,797" href="#" alt="">
					</map>
					<a href="#">Mathematique</a>
				</div>
				<div class="div3">
					<img usemap="#phy2" src="img/phy2.png">
					<map name="phy2">
						<area shape="rect" coords="0,0,720,595" href="#" alt="">
					</map>
					<a href="#">Physique</a>
				</div>
				<div class="div3">
					<img usemap="#chi2" src="img/chimie1.png">
					<map name="chi2">
						<area shape="rect" coords="0,0,720,595" href="#" alt="">
					</map>
					<a href="#">Chimie</a>	
				</div>
				
			</div>	
		</div>		
	</section>

	<?php include("footer.php"); ?>
</body>
</html>