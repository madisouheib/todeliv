@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                    <h5 style="margin-bottom:3%;"><span class="pcoded-badge label label-info">#manifest-{{  $datamanif->id_coms  }}  <i class="fas fa-list"></i> </span> </h5>
                     




</div>

                    <div class="card-block table-border-style">

<manif-detail :url_id='@json( Request::segment(3) )' :user_id='@json( Auth::user()->id )'      >       </manif-detail>







                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    

   
        
            @endsection