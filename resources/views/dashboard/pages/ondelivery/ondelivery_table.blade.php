@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Feuille de route </h5>
                     
                        


</div>

                    <div class="card-block table-border-style">



<froute-list :user_id='@json( Auth::user()->id )'  > </froute-list>





           
                </div>
            </div>
            <!-- [ basic-table ] end -->

 
    
        
            @endsection