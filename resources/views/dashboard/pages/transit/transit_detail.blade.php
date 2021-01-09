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


     <transdetail-send :url_id='@json( Request::segment(3) )'  >  </transdetail-send>



                
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection