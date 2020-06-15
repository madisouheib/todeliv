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
                        <div class="text-center" style="margin:10px;">  <i class="fas fa-search text-center" style="font-size:2.4em"></i>  </div>
                       
<input class="form-control input-g" value="" type="text" placeholder="Recherche numero de tracking ... "> 
<div class="row">

<div class="col-6">
<div class="card-header">
    <h4>   Partenaire   </h4>
</div>
<div class="card-block">


</div>
</div>
<div class="col-6">
    <div class="card-header">
    <h4>   Client     </h4>
    </div>
    <div class="card-block">


    </div>

</div>
</div>



                </div>
            </div>
            </div>

            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.pages.ondelivery.ondelivery_alert_add')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection