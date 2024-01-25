<?php 
session_start();
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die('Error: '.$e->getMessage());
	}
	$id=$_SESSION['id'];
	$req = $db->prepare('UPDATE members SET statut=:statut WHERE id=:id');
	$req->execute(array('id'=>$id, 'statut'=>0));
	$_SESSION = array();
	session_destroy();

	setcookie('nom_pd','');
	setcookie('prenom_pd','');
	setcookie('email_pd','');
	setcookie('naissance_pd','');
	setcookie('password_pd','');
	setcookie('id_pd','');
	setcookie('filiere_pd','');
	header('Location: index.php');
 ?>