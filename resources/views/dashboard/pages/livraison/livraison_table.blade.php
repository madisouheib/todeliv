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





<delivery-list :user_id='@json( Auth::user()->id )' >   </delivery-list>




                   
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.pages.ondelivery.ondelivery_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection