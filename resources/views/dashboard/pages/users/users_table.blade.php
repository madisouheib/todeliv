@extends('dashboard.lay.app')

@section('content-admin')


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Utilisateurs </h5>
                        <span class="d-block m-t-5">la  <code>liste</code> des utilisateurs </span>
                        <div class="form-group col-3" >
                       
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tag"></i> </span>
                                </div>
                    <select class="custom-select" required>
                    <option value="">Type d'utlisateurs </option>
            
                    <option value="1"> Profile 1  </option>
                    <option value="1">Profile 2 </option>
                    <option value="1">Profile 3</option>
                    </select>
                                 <div class="invalid-feedback">
                                    Please choose a type.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-square btn-success" data-toggle="modal" data-target="#exampleModalCenter"  style="float:right;"> <i class="fas fa-plus"></i> AJOUTER </button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            
<users-table></users-table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

    

@include('dashboard.pages.users.users_edit')
@include('dashboard.pages.users.users_delete')
@include('dashboard.pages.users.users_infos')
    
        
            @endsection