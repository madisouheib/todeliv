@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">




            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Clients </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des Clients </span>
 
                            
<clients-table :hub_id='@json( Auth::user()->hub_id )' ></clients-table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
    
        
            @endsection