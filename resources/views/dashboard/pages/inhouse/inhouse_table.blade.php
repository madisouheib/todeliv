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



<inhouse-table :user_id='@json( Auth::user()->id )' >   </inhouse-table>




                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
      
    
        
            @endsection