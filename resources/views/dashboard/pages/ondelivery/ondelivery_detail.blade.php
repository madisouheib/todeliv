@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                    <h5 style="margin-bottom:3%;"><a href="{{url('admin/ondelivery')}}"> <span class="pcoded-badge label label-info">  #Froute- {{ Request::segment(3) }}   <i class="fas fa-list"></i>    <i class="fas fa-reply"></i> </span>   </a>  </h5>
                     



</div>

                    <div class="card-block table-border-style">





<froute-colis :user_id='@json( Auth::user()->id )' :url_id='@json( Request::segment(3) )'  >     </froute-colis>


                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection