@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Archive des commmandes </h5>
                     




</div>

                    <div class="card-block table-border-style">

                       
<h3>  </h3>






<coms-archive :id_user='@json(Auth::user()->id)' ></coms-archive>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection