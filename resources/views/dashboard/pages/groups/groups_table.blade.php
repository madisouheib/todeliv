@extends('dashboard.lay.app')

@section('content-admin')

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Profiles </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des profiles </span>
                    <a href="{{ url('/admin/permission') }}" class="btn btn-square btn-danger"  style="float:right;"> <i class="fas fa-lock"></i> Permissions </a>
                        <button class="btn btn-square btn-success" data-toggle="modal" data-target="#Modalprofileadd"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>

                    </div>
                  <profiles-table></profiles-table>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    

@include('dashboard.pages.groups.groups_edit')
@include('dashboard.pages.groups.groups_delete')

    
        
            @endsection