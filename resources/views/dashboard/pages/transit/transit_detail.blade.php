@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="margin-bottom:3%;"><span class="pcoded-badge label label-info">#transit-0438340   <i class="fas fa-list"></i> </span> </h5>
                        <h4 style="color:#4A4747;margin:5px;"> Destination : <b> HUB Alger </b> </h4>   




</div>


                    <div class="card-block ">




@include('dashboard.partials.filtrenavs.navfiltre_transit')
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

                                        <th class="text-center"><i class="fas fa-align-left"></i> Etat </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center" >#send-0438340</th>
                                        
                                        <th class="text-center" > <button data-toggle="modal" data-target="#Moodalcolisinfo"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-plus"></i></button></td>
                                      <th class="text-center"   > 35000 DA   </th>
                                        <th class="text-center" >Alger : belcourt </th>
                                        <th class="text-center" >Sarl X </th>
                                        <td class="text-center" ><span class="pcoded-badge label label-warning">en attente   <i class="fas fa-user-clock"></i> </span></td>

                                     
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-center" >#send-0438340</th>
                                        
                                        <th class="text-center" > <button data-toggle="modal" data-target="#Moodalcolisinfo"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-plus"></i></button></td>
                                      <th class="text-center"   > 35000 DA   </th>
                                        <th class="text-center" >Alger : belcourt </th>
                                        <th class="text-center" >Sarl X </th>
                                        <td class="text-center" ><span class="pcoded-badge label label-success">transferer  <i class="fas fa-check-circle"></i> </span></td>

                                     
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