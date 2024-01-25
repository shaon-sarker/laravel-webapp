@extends('layouts.backend.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active">Profile Update</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Profile Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name"  class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $user->name }}" required autofocus autocomplete="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{ $user->email }}" required autocomplete="username">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Update Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <input name="current_password" type="password" class="form-control" id="exampleInputEmail1" placeholder="Current Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                  </div>
                
                </div>
                <!-- /.card-body -->
  
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

     
</section>
</div>
@endsection