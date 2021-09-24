@extends('dashboard.lay.app')

@section('content-admin')

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>listes des wilayas par HUB  </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des wilayas de hub  {{ $data->nom_hub}} </span>

                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                           <list-hubwilaya  :url_id='@json( Request::segment(3) )' :user_id='@json( Auth::user()->id )' >    </list-hubwilaya>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    


@include('dashboard.pages.hub.hub_delete')

    
        
            @endsection