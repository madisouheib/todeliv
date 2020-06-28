@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>la liste des colis </h5>
                     




</div>

                    <div class="card-block table-border-style">

                       




<colis-table :url_id='@json( Request::segment(3) )' :user_id='@json( Auth::user()->id )' ></colis-table>


                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection