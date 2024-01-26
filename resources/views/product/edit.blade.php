@extends('layouts.backend.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Product</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row d-flex align-items-center justify-content-center">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Product Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('product.update',$product_info->id) }}">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" name="name" value="{{ $product_info->name }}" class="form-control" placeholder="Product Name" required autofocus autocomplete="name">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" name="price" value="{{ $product_info->price }}"  class="form-control" placeholder="Product Price" required autofocus autocomplete="name">
                        </div>
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Quantity</label>
                            <input type="text" name="quantity" value="{{ $product_info->quantity }}"  class="form-control" placeholder="Product Quantity" required autofocus autocomplete="name">
                          </div>
                          @error('quantity')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                          @enderror
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update</button>
              </div>
            </form>
          </div>
        </div>
</section>
</div>
@endsection