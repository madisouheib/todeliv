@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
      
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tracking Section   </h5>
                     
                        


</div>

                    <div class="card-block table-border-style">


            <tracking-detail :url_id='@json( Request::segment(3) )' > </tracking-detail>

                </div>
            </div>
            </div>

            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.pages.ondelivery.ondelivery_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection