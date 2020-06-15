@extends('dashboard.lay.app')

@section('content-admin')

<div class="toast toast-danger hide toast-1s" role="alert" style="position: absolute; top: 0; right: 8px;"  aria-live="assertive" data-delay="3000" aria-atomic="true">
    <div class="toast-header" style="background-color:#ff4c4c; color:#fff;margin-bottom:0px;">
  
        <strong class="mr-auto" style="font-family: 'Baloo Bhaina 2', cursive;"> <i class="fas fa-trash-alt"></i> Suppression</strong>

        <button type="button" class="ml-2 mb-1 close"  style="color:#fff;" data-dismiss="toast" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
    <div class="toast-body" style="background-color:#ed1c24;color:#fff;opacity:0.7;font-style:italic;font-family: 'Baloo Bhaina 2', cursive;margin-top:0px;padding:15px;">
        la wilaya de blida  a été bien supprimer
    </div>
</div>

<div class="toast toast-success hide toast-1s" role="alert" style="position: absolute; top: 0; right: 15px;" data-animation="true"  aria-live="assertive" data-delay="3000" aria-atomic="true">
    <div class="toast-header" style="background-color:#2dde98; color:#fff;margin-bottom:0px;">
  
        <strong class="mr-auto" style="font-family: 'Baloo Bhaina 2', cursive;"> <i class="fas fa-check"></i> Modification </strong>

        <button type="button" class="ml-2 mb-1 close"  style="color:#fff;" data-dismiss="toast" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
    <div class="toast-body" style="background-color:#2dde98;color:#fff;opacity:0.7;font-style:italic;font-family: 'Baloo Bhaina 2', cursive;margin-top:0px;padding:15px;">
        la wilaya de blida  a été bien Modifier
    </div>
</div>




        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Wilaya </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des wilayas </span>
                        <button class="btn btn-square btn-success" data-toggle="modal" data-target="#Modaladdwilaya"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                         <wilaya-table></wilaya-table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    



    
        
            @endsection