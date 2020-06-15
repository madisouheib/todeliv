@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Livraison </h5>
                     
                        


</div>

                    <div class="card-block table-border-style">

<div class="row">
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Etat  </option>
<option value="1">Valider</option>
<option value="1">Non Valider</option>
<option value="1">archiver</option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-shipping-fast"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Livreur  </option>
<option value="1">Bilal</option>
<option value="1">Moustapha</option>
<option value="1">Djamel </option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">HUB  </option>
<option value="1">Bilal</option>
<option value="1">Moustapha</option>
<option value="1">Djamel </option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
    <div class="form-group">
             
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-calendar-alt"></i> </span>
            </div>
            <input type="text" id="date" class="form-control" placeholder="Date">
            <div class="invalid-feedback">
                Please choose a date.
            </div>
        </div>
    </div>
</div>


  
</div>








                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ><i class="fas fa-shipping-fast"></i> Livreur </th>
                                       
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Sortie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Cloture  </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre </th>
                   
                                        <th class="text-center" ># Froute-id </th>
                                  

                                        <th class="text-center"><i class="fas fa-align-left"></i> Statut </th>
                                        <th class="text-center"><i class="fas fa-edit"></i> Validation </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Exportation </th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr>
                                        <th scope="row" class="text-center" style="width:100px;"   ><span  class="pcoded-badge label label-success">Mestapha   <i class="fas fa-shipping-fast"></i> </th>
                                        
                                        <th class="text-center" > 2020-06-01 </td>
                                            <th class="text-center" > <i class="fas fa-clock"></i> </td>
                                      <th class="text-center"   > 3600000 DA   </th>
                                      <th class="text-center"   > 30/30 </th>
                                        <th class="text-center" > 2   </th>
                                
                                        <td class="text-center" ><span class="pcoded-badge label label-warning">En instance   <i class="fas fa-clock"></i> </span></td>
                                        <th class="text-center" ><button class="btn btn-square btn-success btn-sm"> valider <i class="fas fa-check-circle"></i></button></th>
                                        <th class="text-center" > <button class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </button> <button class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </button>  </th>
                                     
                                    </tr>
                                    <tr>
                                        <th class="text-center" ><span  style="width:100px;" class="pcoded-badge label label-success">Bilal   <i class="fas fa-shipping-fast"></i> </th>
                                        
                                        <th class="text-center" > 2020-06-01 </td>
                                            <th class="text-center" > <i class="fas fa-clock"></i> </td>
                                      <th class="text-center"   > 3600000 DA   </th>
                                      <th class="text-center"   > 30/30 </th>
                                        <th class="text-center" > 1   </th>
                                
                                        <td class="text-center" ><span class="pcoded-badge label label-warning">En instance   <i class="fas fa-clock"></i> </span></td>
                                        <th class="text-center" ><button class="btn btn-square btn-success btn-sm"> valider <i class="fas fa-check-circle"></i></button></th>
                                        <th class="text-center" > <button class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </button> <button class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </button>  </th>
                                     
                                    </tr>
                                 
                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.pages.ondelivery.ondelivery_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection