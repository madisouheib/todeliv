@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5> <i class="fas fa-file-alt"></i> Facturation  </h5>
                     




</div>

                    <div class="card-block table-border-style">


<compta-facturation :user_id='@json( Auth::user()->id )'  >   </compta-facturation>


                        
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

        </div>
    
        
            @endsection