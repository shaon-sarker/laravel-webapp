@extends('layouts.backend.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <a href="{{ route('product_export') }}" class="btn btn-info">Export</a>
      <a href="{{ route('product.create') }}" class="btn btn-dark">Create</a>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($product_info as $key=>$data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>
                            <a href="{{ url('/product/product-purchase') }}/{{ $data->id }}" class="btn btn-info">Purchase</a>
                            <a href="{{ route('product.edit',$data->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('product.destroy',$data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger show_confirm" href="" type="submit">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center">There are no products.</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
              {!! $product_info->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
</section>
</div><!-- /.card -->
@endsection