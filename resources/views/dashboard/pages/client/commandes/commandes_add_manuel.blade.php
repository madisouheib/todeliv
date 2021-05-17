@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ajouter votre Commande  </h5>
                     




</div>

                    <div class="card-block table-border-style">

                       
                        @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert"> </button>	
                          <strong>{{ $message }}</strong>
                        </div>
                        @endif



<form method="post" action="{{ url('admin/manaddcom') }}" enctype="multipart/form-data"  >
@csrf
                        <div class="table-responsive">

<div class="row" style="margin: 5%;">

<div class="col-8">
<input type="text" placeholder="veuillez saisir votre titre de commande .. " name="raisonsocial" class="form-control" required>

</div>
<div class="col-4">
<button class="btn btn-success shadow-1" name="add" type="submit" > Ajouter <i class="fas fa-plus"></i> </button>

</div>

</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- [ basic-table ] end -->

  
        
            @endsection