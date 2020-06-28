@extends('dashboard.lay.app')

@section('content-admin')

    <!-- [ chat message ] end -->

    <!-- [ Main Content ] start -->
 
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ mini-menu ] start -->
                                <diPage Layoutv class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Tableau de Bord</h5>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                                 <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3">Reception</h5>
                                            <i class="fas  fa-box f-30 text-c-blue"></i>
                                            <h2 class="f-w-300 mt-3">800</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar progress-d-theme" role="progressbar" style="width: 75%; height:7px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>400</h4>
                                                    <span class="text-muted">Reçu</span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>300</h4>
                                                    <span class="text-muted">Non Reçu </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
   <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3"> Livraison </h5>
                                            <i class="fas fas fa-truck f-30 text-c-green"></i>
                                            <h2 class="f-w-300 mt-3">1,285</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar progress-c-theme " role="progressbar" style="width: 75%; height:7px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>400</h4>
                                                    <span class="text-muted">En Livraison </span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>300</h4>
                                                    <span class="text-muted"> Livrée </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>

   <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3">Retour</h5>
                                            <i class="fas  fa-undo f-30 text-c-red"></i>
                                            <h2 class="f-w-300 mt-3">1,285</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%; height:7px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>400</h4>
                                                    <span class="text-muted">Annulée </span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>300</h4>
                                                    <span class="text-muted"> Autres </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>

    

                         
                                
                                    </div>
                                    
                                </div>
                                <!-- [ mini-menu ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                  
@endsection

<script src="{{ asset('dash/assets/plugins/amchart/js/pie.min.js') }}"></script>
