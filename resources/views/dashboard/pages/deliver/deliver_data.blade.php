@extends('dashboard.lay.deliver')

@section('content-admin')
<div id="nav"></div>

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Mes livraions    </h5>
                     




</div>


                    <div class="card-block table-border-style">



<livreur-colis :user_id='@json( Auth::user()->id )'  >  </livreur-colis>

                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
        
            @endsection