@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>En livraison : Détail  </h5>
                     




</div>

                    <div class="card-block table-border-style">

<h5><i class="fas fa-shipping-fast"></i> Livreur :  <strong style="color:#696969;font-weight:bold;"> Bilal </strong>  </h5>
<h5> <i class="fas fa-list-alt"></i> F-routes  :  <span class="badge badge-info label label-info"> F-Route:3224899  </span> <span class="badge badge-info label label-info"> F-Route:3224894  </span> </h5> 


@include('dashboard.partials.filtrenavs.navfiltre_inhouse')
@include('dashboard.partials.colis_exportation')




                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> partenaire </th>
                                    
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center" >#send-0438340</th>
                                        
                                        <th class="text-center" > <button data-toggle="modal" data-target="#Moodalcolisinfo"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-plus"></i></button></td>
                                      <th class="text-center"   > 35000 DA   </th>
                                        <th class="text-center" >Alger : belcourt </th>
                                        <th class="text-center" >Sarl X </th>
                                  
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" class="btn btn-square  btn-success " ><i style="margin:0px;"  class=" fas fa-list-ul"></i></button>          <div class="col-2">
                        
                                          
                                        </td>
                                     
<td>

    <div class="input-group" style="padding:0px;">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-hand-pointer"></i> </span>
        </div>
<select class="custom-select" required>
<option value="">Action </option>
<option value="1"> Retour  </option>
<option value="1">Livraison  </option>

</select>

      
        <div class="invalid-feedback">
            Please choose a type.
        </div>
    </div>

                                        </td>

                                     
                                    </tr>
                                 
                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection