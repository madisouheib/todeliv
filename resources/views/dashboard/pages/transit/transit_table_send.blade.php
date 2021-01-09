@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Transit Envoie </h5>
                     
                        


</div>

                <transit-send :user_id='@json( Auth::user()->id )' ></transit-send>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
        
            @endsection