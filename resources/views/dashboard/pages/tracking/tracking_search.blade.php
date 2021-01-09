@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
      
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5> Tracking Section   </h5>
                     
                        


</div>

                    <div class="card-block table-border-style">


            <tracking-search  > </tracking-search>

                </div>
            </div>
            </div>

            <!-- [ basic-table ] end -->

           
            @include('dashboard.pages.ondelivery.ondelivery_alert_add')
        
    
        
            @endsection