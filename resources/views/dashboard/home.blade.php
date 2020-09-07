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


   @role('admin')

<stats-admin> </stats-admin>
 @endrole
 @role('client pro')

 <stats-client :user_id='@json( Auth::user()->id )'  >   </stats-client>
  @endrole







                                    
                                </div>
                                <!-- [ mini-menu ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                  
@endsection

<script src="{{ asset('dash/assets/plugins/amchart/js/pie.min.js') }}"></script>
