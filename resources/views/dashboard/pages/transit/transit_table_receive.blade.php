@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Transit Reception  </h5>
                     
                        


</div>

                

<transit-receive :user_id='@json( Auth::user()->id )'   >    </transit-receive>


                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.pages.transit.transit_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection