@extends('dashboard.lay.app')

@section('content-admin')

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Wilaya </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des hubs </span>
                        <button class="btn btn-square btn-success" data-toggle="modal" data-target="#Modaladdhub"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                           <hub-table></hub-table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    


@include('dashboard.pages.hub.hub_delete')

    
        
            @endsection