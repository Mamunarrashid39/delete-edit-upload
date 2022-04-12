@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">{{ __('Product add') }}</h1>
               <div class="card mb-3 p-2">
                   <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">

                       @csrf
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Product Name</label>
                           <div class="col-md-8">
                               <input type="text" name="name" class="form-control" value=""/>
                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Category Name</label>
                           <div class="col-md-8">
                               <input type="text" name="category_name" class="form-control" value=" " />
                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Brand Name</label>
                           <div class="col-md-8">
                               <input type="text" name="brand_name" class="form-control" value="" />
                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Product Description</label>
                           <div class="col-md-8">
                               <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Product Image</label>
                           <div class="col-md-8">
                               <input type="file" name="image" class="form-control-file" />

                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4">Product Status</label>
                           <div class="col-md-8">
                               <label for=""><input type="radio" name="status" value="1" > Published</label>
                               <label for=""><input type="radio" name="status" value="0" > Unpublished</label>
                           </div>
                       </div>
                       <div class=" mt-2 row">
                           <label for="" class="col-md-4"></label>
                           <div class="col-md-8">
                               <input type="submit" class="form-control btn btn-outline-success" value="Add Product"/>
                           </div>
                       </div>
                   </form>
               </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Catagory</th>
                                        <th>Brand name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->catagory_name }}</td>
                                            <td>{{ $product->brand_name }}</td>
                                            <td>{{ $product->description}}</td>
                                            <td><img class="img-thumbnail w-50 h-50" src="{{$product->image}}"/></td>
                                            <td>{{$product->status}}</td>
                                            <td>
                                                <a href="{{url('product/'.$product->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{route('product.delete',$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
