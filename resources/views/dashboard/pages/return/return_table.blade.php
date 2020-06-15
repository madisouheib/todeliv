@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5> Les retours   </h5>
                     




</div>

                    <div class="card-block table-border-style">

<
@include('dashboard.partials.filtrenavs.navfiltre_failed')
@include('dashboard.partials.colis_exportation')




                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ># Tracking-id </th>
                                     
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> partenaire </th>
                                    
                               

              
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center" ><span class="pcoded-badge label label-info">#send-0438340    <i class="fas fa-eye"></i> </span> </th>
                                        
                                        
                                      <th class="text-center"   > 35000 DA   </th>
                                        <th class="text-center" >Alger : belcourt </th>
                                        <th class="text-center" >Sarl X </th>
                                  
                                      
                        
                                          
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