@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5> <i class="fas fa-file-alt"></i> Facturation Detail  #Compta-{{ Request::segment(3)  }}   </h5>
                     




</div>

                    <div class="card-block table-border-style">


<compta-facturation-detail :url_id='@json( Request::segment(3) )' >   </compta-facturation-detail>


                        
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

        </div>
    
        
            @endsection