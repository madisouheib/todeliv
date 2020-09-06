@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>En livraison : Détail  </h5>
                     




</div>

                    <div class="card-block table-border-style">

<h5><i class="fas fa-shipping-fast"></i> Livreur :  <strong style="color:#696969;font-weight:bold;"> {{ $namelivreur }} </strong>  </h5>
<h5> <i class="fas fa-list-alt"></i> F-routes  :  
    
    @foreach ($listfiche as $itemfiche)
    <span class="badge badge-info label label-info"> F-Route: {{ $itemfiche}}  </span>
    @endforeach
    
 </h5> 






<delivery-colislist :user_id='@json( Auth::user()->id )'  :url_id='@json( Request::segment(3) )' >   </delivery-colislist>




                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            @include('dashboard.partials.colis_information')
            @include('dashboard.partials.colis_suivi')
    
        
            @endsection