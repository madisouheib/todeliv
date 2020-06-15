@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Transit Retour  </h5>
                     
                        


</div>

                    <div class="card-block ">

<div class="row">
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Etat transit </option>
<option value="1">Valider</option>
<option value="1">Non Valider</option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
    <div class="col">
        <div class="float-right">
        <button class="btn btn-square btn-success btn-sm"  data-toggle="modal" data-target="#Modaladdtransit"  > Ajouter un transit  <i class="fas fa-plus-square"></i> </button>
    </div>
</div>
</div>








                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ># Transit-id </th>
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Envoie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Reçu </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre </th>
                   

                                        <th class="text-center" ><i class="fas fa-road"></i> Destination </th>

                                        <th class="text-center"><i class="fas fa-align-left"></i> Statut </th>
                                        <th class="text-center"><i class="fas fa-edit"></i> Validation </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Exportation </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center" ><span class="pcoded-badge label label-danger">#transit-0438340   <i class="fas fa-list"></i> </span> </th>
                                        
                                        <th class="text-center" > 2020-06-01 </td>
                                            <th class="text-center" > 2020-06-03 </td>
                                      <th class="text-center"   > 35000 DA   </th>
                                      <th class="text-center"   > 30/30 </th>
                                        <th class="text-center" >Alger vers Oran </th>
                                
                                        <td class="text-center"  ><span class="pcoded-badge label label-success">transferer  <i class="fas fa-check-circle"></i> </span> </td>
                                        <th class="text-center" ><button class="btn btn-square btn-success btn-sm"> valider <i class="fas fa-check-circle"></i></button></th>
                                        <th class="text-center" > <button class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </button> <button class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </button>  </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-center" ><span class="pcoded-badge label label-info">#transit-0438340   <i class="fas fa-list"></i> </th>
                                        
                                        <th class="text-center" > 2020-06-01 </td>
                                            <th class="text-center" > <i class="fas fa-clock"></i> </td>
                                      <th class="text-center"   > 35000 DA   </th>
                                      <th class="text-center"   > 30/30 </th>
                                        <th class="text-center" >Alger vers Oran </th>
                                
                                        <td class="text-center" ><span class="pcoded-badge label label-warning">en attente   <i class="fas fa-user-clock"></i> </span></td>
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
            @include('dashboard.pages.transit.transit_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection