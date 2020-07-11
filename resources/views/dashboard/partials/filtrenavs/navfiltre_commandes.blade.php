      
    
    <div class="row"> 
     
                                                   
                          
                     
    
    
                        
                            
                      
                            
                            <div class="col-3">
                            
                                <div class="form-group">
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-box"></i> </span>
                                        </div>
                            <select class="custom-select" required>
                            <option value="">Selectionner l'etat </option>
                            <option value="1">Valider</option>
                            <option value="1">Non Valider</option>
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a one.
                                        </div>
                                    </div>
                                </div>
                            </div>


<div class="col-3">

<a href="{{ url('/admin/archoms')}}" class="btn btn-dark btn-square">  Archive <i class="fas fa-archive"></i> </a>

</div>
<div class="col-3"></div>
<div class="col-3">

<a class="btn btn-info btn-square" href="{{ url('admin/addcoms')}}"   > IMPORTER  <i class="fas fa-plus"></i></a>
</div>

                            
                                                </div>