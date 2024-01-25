<?php 
session_start();
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die('Error: '.$e->getMessage());
	}
	$id=$_SESSION['id'];
	$req = $db->prepare('UPDATE admin SET statut=:statut WHERE id=:id');
	$req->execute(array('id'=>$id, 'statut'=>0));
	session_start();
	$_SESSION = array();
	session_destroy();

	header('Location: ../identify.php');
 ?>