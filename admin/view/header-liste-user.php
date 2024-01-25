<div class="form-row">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalModifier">
        <span class="text">Modifier</span>
    </button>
    &nbsp;
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalSupprimer" >
        <span class="text">Supprime</span>
    </button>
</div>

<!-- Code pour le boutton "Modifier" -->
<!-- Modal -->
<div class="modal fade" id="exampleModalModifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification des informations</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <h6>&nbsp;&nbsp;Veuillez renseigner l'ID que vous souhaitez modifier</h6>
            <div class="modal-body"> 
                <form class="user" action="user.php" method="post">  
                            <div class="modal-header">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="id_modif"><b>Identifiant à modifier</b></label>
                                    <input class="form-control" id="id_modif" name="id_modif" type="number" placeholder="ID à modifier" required/>
                                </div>
                            </div>
                            <h6>Les nouvelles valeurs</h6>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="nom"><b>Nom</b></label>
                                 <input class="form-control" id="nom" name="nom_modif" type="text" placeholder="Nouveau nom"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="prenom"><b>Prenom</b></label>
                                 <input class="form-control" id="prenom" name="prenom_modif" type="text" placeholder="Nouveau prenom"/>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="email"><b>Email</b></label>
                                <input class="form-control" id="email" name="email_modif" type="email" placeholder="Nouveau email"  />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="dateBirth"><b>Date de naissance</b></label>
                                <input class="form-control" id="dateBirth" name="date_naissance_modif" type="date" />
                            </div>
                        	
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="password"><b>Mot de passe</b></label>
                                <input class="form-control" id="password" type="password" name="password_modif" placeholder="Nouveau mot de passe"/>
                            </div>
                            <div class="form-group col-md-6">
                               	<label class="small mb-1" for="confirmePasse"><b>Confirmation du mot de passe</b></label>
                                <input class="form-control" id="confirmePasse" name="confirme_passe_modif" type="password" placeholder="Nouveau mot de passe"/>
                            </div>
                        </div>
            		<div class="modal-footer">
            			<button class="btn btn-danger" type="button" data-dismiss="modal">Fermer</button>
            			<input type="submit" value="Enregistrer" class="btn btn-primary" >
                	</div>
                </form>  
            </div>
        </div>
    </div>
</div>        
<!-- Fin du code pour le boutton "Modifier" -->

<!-- Code pour le boutton supprimer -->
<!-- Modal -->
<div class="modal fade" id="exampleModalSupprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression d'un utilisateur</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <h6>&nbsp;&nbsp;Veuillez renseigner l'ID que vous souhaitez supprimer</h6>
            <div class="modal-body"> 
                <form class="user" action="user.php" method="post">
                    <div class="modal-header">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="id_supprimer"><b>Identifiant à supprimer</b></label>
                                    <input class="form-control" id="id_supprimer" name="id_supprimer" type="number" placeholder="ID à supprimer" required/>
                                </div>
                            </div>
                	<h6>Si vous ête sûr de vouloir supprimer definitivement cet utilisateur cliquer sur "Supprimer"<h6/>
                    <div class="form-row">
                        <div class="modal-footer">
            				<button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
            				<input type="submit" value="Supprimer" class="btn btn-primary" >
            			</div>
                    </div>
            	</form>  
            </div>
        </div>
    </div>
</div>