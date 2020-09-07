@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Charger votre Commande  </h5>
                     




</div>

                    <div class="card-block table-border-style">

                       
<h3>  </h3>



<form method="post" action="{{ url('admin/upload') }}" enctype="multipart/form-data"  >
@csrf
                        <div class="table-responsive">
              <h4 class="text-center"> Veuillez s'il vous plaît suivre le modele suivant  <a href="{{ url('admin/download')}}" class="btn btn-success"> Modele <i class=" fas fa-file-excel"></i></a> </h4>
<div class="row" style="margin: 5%;">
<input type="hidden" name="idcoms" value="{{ Request::segment(3) }}">
<div class="col-8">
<input type="file" name="colis" class="form-control" required>

</div>
<div class="col-4">
<button class="btn btn-success btn-square" name="upload" type="submit" > Uplader <i class="fas fa-upload"></i> </button>

</div>

</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- [ basic-table ] end -->

  
        
            @endsection