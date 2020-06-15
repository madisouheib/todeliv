    
  
                <div id="Modaledithub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le Hub</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="validationCustomUsername">Nom de hub : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-play"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Nom de hub " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a hub.
                                        </div>
                                    </div>
                                </div>
                  
                          
                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
  <select class="custom-select" required>
    <option value="">Selectionner la wilaya </option>
    <option value="1">Oran</option>
    <option value="2">Mosta </option>
    <option value="3">Tizi </option>
    <option value="3">Alger </option>
    <option value="3">Annaba </option>
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>
                       
<div class="form-group">
    <label for="validationCustomUsername"><i class="fas fa-map"></i> wilayas  : </label>
    <select multiple data-role="tagsinput">
        <option value="Alger">Alger</option>
        <option value="Oran">Oran</option>
        <option value="Blida">Blida</option>
        <option value="Batna">Batna</option>
        <option value="Mosta">Mosta</option>
    </select>


</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-primary">Modifier <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>