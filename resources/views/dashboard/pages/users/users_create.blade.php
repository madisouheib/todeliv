    
  
                <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="usern">Nom d'utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tie"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="usern" placeholder="Nom d'utilisateur " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomprenom">Nom & prenom  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-address-card"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="nomprenom" placeholder="Nom d'utilisateur " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailing">Email : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-envelope"></i> </span>
                                        </div>
                                        <input type="email" class="form-control" id="emailing" placeholder="Email " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passw">Mot de passe : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input type="password" class="form-control" id="passw" placeholder="Mot de passe " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ntel">N-tel : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" id="ntel" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="typeuser">Type de utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="typeuser"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
  <select class="custom-select" required>
    <option value="">Selectionner le type </option>
    <option value="1">Client</option>
    <option value="2">Cordinateur </option>
    <option value="3">Livreur </option>
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomUsername">Hub : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-sitemap"></i> </span>
                                        </div>
  <select class="custom-select" required>
    <option value="">Selectionner le Hub</option>
    <option value="1">HUB Ouest </option>
    <option value="2">HUB Est  </option>
    <option value="3">HUB Centre  </option>
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Adresse " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a adresse.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success">Sauvgarder <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>