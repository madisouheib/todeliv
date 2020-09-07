@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Livraison échouée   </h5>
                     




</div>

                    <div class="card-block table-border-style">



<undelivred-list :user_id='@json( Auth::user()->id )'  >  </undelivred-list>

                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
        
            @endsection