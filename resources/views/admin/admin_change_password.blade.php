@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password Page</h4><br<br

                        @if(count($errors) > 0)
                           
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger aler-dismissible fade show">
                            {{ $error }} </p>
                             @endforeach        
                                  
                        @endif
                        
                        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf
                        
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input name="newpassword" class="form-control" type="password" id="newpassword">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input name="confirm_password" class="form-control" type="password" id="confirm_password">
                            </div>
                        </div>

                      

                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password"></input>
                        
                    </form>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
    </div>



@endsection