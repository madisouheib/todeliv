@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Reception </h5>
                     




</div>

                    <div class="card-block table-border-style">



<client-retour :user_id='@json( Auth::user()->id )' >   </client-retour>




                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->


      
    
        
            @endsection