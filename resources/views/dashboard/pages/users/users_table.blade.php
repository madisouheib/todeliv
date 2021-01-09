@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">

    @role('delivery')
    I am a writeeeeer!


@endrole



            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Utilisateurs </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des utilisateurs </span>
 
                        <button class="btn btn-square btn-success" data-toggle="modal" data-target="#exampleModalCenter"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            
<users-table></users-table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
    
        
            @endsection