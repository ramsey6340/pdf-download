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
		$rep = $db->prepare('UPDATE members SET etat=0 WHERE id=:id');
		$rep->execute(array('id'=>$id));
	}
	else{
		$rep = $db->prepare('UPDATE members SET etat=1 WHERE id=:id');
		$rep->execute(array('id'=>$id));
	}
}

// Code de mise à jour des information de l'utilisateur
if(isset($_POST['id_modif'])){
	$id_modif=(int)$_POST['id_modif'];
    if($id_modif != ""){
        if($id_modif != 0){

            if(isset($_POST['nom_modif'])){
                $nom_modif = htmlspecialchars($_POST['nom_modif']);
                if($nom_modif != ""){
                    $rep = $db->prepare('UPDATE members SET nom=:nom_modif WHERE id=:id_modif');
                    $rep->execute(array('nom_modif'=>$nom_modif, 'id_modif'=>$id_modif));
                }
            }
            if(isset($_POST['prenom_modif'])){
                $prenom_modif = htmlspecialchars($_POST['prenom_modif']);
                if($prenom_modif != ""){
                    $rep = $db->prepare('UPDATE members SET prenom=:prenom_modif WHERE id=:id_modif');
                    $rep->execute(array('prenom_modif'=>$prenom_modif, 'id_modif'=>$id_modif));
                }
            }

            if(isset($_POST['email_modif'])){
                $email_modif = $_POST['email_modif'];
                if($email_modif != ""){
                    $rep = $db->prepare('UPDATE members SET email=:email_modif WHERE id=:id_modif');
                    $rep->execute(array('email_modif'=>$email_modif, 'id_modif'=>$id_modif));
                }
            }

            if(isset($_POST['date_naissance_modif'])){
            $date_naissance_modif = $_POST['date_naissance_modif'];
                if($date_naissance_modif != ""){
                    $rep = $db->prepare('UPDATE members SET date_naissance=:date_naissance_modif WHERE id=:id_modif');
                    $rep->execute(array('date_naissance_modif'=>$date_naissance_modif, 'id_modif'=>$id_modif));
                }
            }

            if(isset($_POST['password_modif']) AND $_POST['confirme_passe_modif']){
                $password_modif = $_POST['password_modif'];
                $confirme_passe_modif = $_POST['confirme_passe_modif'];
                if($password_modif != "" AND $confirme_passe_modif != ""){
                    if($password_modif == $confirme_passe_modif){
                        $password_modif = password_hash($password_modif, PASSWORD_DEFAULT);
                        $rep = $db->prepare('UPDATE members SET password=:password_modif WHERE id=:id_modif');
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
            $req = $db->prepare('DELETE FROM members WHERE id=:id_supprimer');
            $req->execute(array('id_supprimer'=>$id_supprimer));
        }
    }
}
// Code d'affichage des informations
	$req = $db->query('SELECT * FROM members ORDER BY members.id DESC');
	while($data = $req->fetch()){
		echo '<tr>';
			echo '<td>'.$data['id'].'</td>';
			echo '<td>'.$data['prenom'].' '.$data['nom'].'</td>';
			echo '<td>'.$data['date_naissance'].'</>';
			echo '<td>'.$data['email'].'</td>';
            echo '<td>'.$data['filiere'].'</>';
			echo '<td>';
                if($data['statut']==1){
                    echo 'connecté';
                }
                else{
                    echo 'deconnecté';
                }
            echo '</td>';

			

			echo '<td>';
				echo "<a href=user.php?id=".$data['id']."&etat=".$data['etat']." >";
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