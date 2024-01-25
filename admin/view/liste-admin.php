<?php 
	try{
		$db = new PDO('mysql:host=localhost; dbname=eniac2; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die('ERROR: '.$e->getMessage());
	}

// Code pour le boutton "Bloquer" et "Debloquer"
	if(isset($_GET['id']) AND isset($_GET['etat'])){
	$etat = (int)$_GET['etat'];
	$id = (int)$_GET['id'];
	if($etat == 1){
		$rep = $db->prepare('UPDATE admin SET etat=0 WHERE id=:id');
		$rep->execute(array('id'=>$id));
	}
	else{
		$rep = $db->prepare('UPDATE admin SET etat=1 WHERE id=:id');
		$rep->execute(array('id'=>$id));
	}
}

// Code de mise à jour des information de l'utilisateur
if(isset($_POST['id_modif'])){
	$id_modif=(int)$_POST['id_modif'];
    if($id_modif != ""){
        if($id_modif != 0){

            if(isset($_POST['login_modif'])){
                $login_modif = htmlspecialchars($_POST['login_modif']);
                if($login_modif != ""){
                    $rep = $db->prepare('UPDATE admin SET login=:login_modif WHERE id=:id_modif');
                    $rep->execute(array('login_modif'=>$login_modif, 'id_modif'=>$id_modif));
                }
            }

            if(isset($_POST['power_modif'])){
                $power_modif = $_POST['power_modif'];
                if($power_modif != ""){
                    $rep = $db->prepare('UPDATE admin SET power=:power_modif WHERE id=:id_modif');
                    $rep->execute(array('power_modif'=>$power_modif, 'id_modif'=>$id_modif));
                }
            }

            if(isset($_POST['password_modif']) AND $_POST['confirme_passe_modif']){
                $password_modif = $_POST['password_modif'];
                $confirme_passe_modif = $_POST['confirme_passe_modif'];
                if($password_modif != "" AND $confirme_passe_modif != ""){
                    if($password_modif == $confirme_passe_modif){
                        $password_modif = password_hash($password_modif, PASSWORD_DEFAULT);
                        $rep = $db->prepare('UPDATE admin SET password=:password_modif WHERE id=:id_modif');
                        $rep->execute(array('password_modif'=>$password_modif, 'id_modif'=>$id_modif));
                    }
                }
            }
        }
    }
}

// Code de suppression d'un utilisateur
if(isset($_POST['id_supprimer'])){
    $id_supprimer = (int)$_POST['id_supprimer'];
    if($id_supprimer != ""){
        if($id_supprimer != 0){
            $req = $db->prepare('DELETE FROM admin WHERE id=:id_supprimer');
            $req->execute(array('id_supprimer'=>$id_supprimer));
        }
    }
}
// Code d'affichage des informations
	$req = $db->query('SELECT * FROM admin ORDER BY id DESC');
	while($data = $req->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td>'.$data['login'].'</td>';
			echo '<td>'.$data['power'].'</td>';
			echo '<td>';
                if($data['statut']==1){
                    echo 'connecté';
                }
                else{
                    echo 'deconnecté';
                }
            echo '</td>';
			
			echo '<td>';
				echo "<a href=admin.php?id=".$data['id']."&etat=".$data['etat']." >";
					echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >';
              			echo '<span class="text">';
              				if($data['etat'] == 1){
              					echo 'Bloquer';
              				}
              				else{
              					echo 'Debloquer';
              				}
              			echo '</span>';
            		echo '</button>';
            	echo "</a>";
			echo'</td>';
		echo '</tr>';
	}
 ?>