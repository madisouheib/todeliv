@extends('dashboard.lay.app')

@section('content-admin')

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Permissions </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des profiles </span>
                    <a href="{{ url('/admin/profiles') }}" class="btn btn-square btn-danger"  style="float:right;"> <i class="fas fa-lock"></i> Profiles </a>
                    </div>
                  <permission-table></permission-table>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    
@include('dashboard.pages.groups.groups_create')
@include('dashboard.pages.groups.groups_edit')
@include('dashboard.pages.groups.groups_delete')

    
        
            @endsection