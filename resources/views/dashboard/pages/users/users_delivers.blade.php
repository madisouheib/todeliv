@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">




            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Livreurs </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des livreurs </span>
 
                        <button class="btn shadow-1 btn-success" data-toggle="modal" data-target="#exampleModalCenter"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            
<delivers-table :hub_id='@json( Auth::user()->hub_id )' ></delivers-table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
    
        
            @endsection