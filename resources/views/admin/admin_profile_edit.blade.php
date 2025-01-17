@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Pofile Page</h4>
                        
                        <form>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{ $editData->name }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="text" value="{{ $editData->email }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input name="profile_image" class="form-control" type="file"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{ asset('backend/assets/images/dee.jpg') }}" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        </form>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
    </div>
@endsection