@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">{{ __('Product add') }}</h1>
            <div class="card mb-3 p-2">

                <form action="{{url('product/update', $product->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Product Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" value="{{$product->name}}" class="form-control"/>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" name="category_name" value="{{$product->category_name}}"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Brand Name</label>
                        <div class="col-md-8">
                            <input type="text" name="brand_name" value="{{$product->brand_name}}" class="form-control"/>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Product Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control" id="" cols="30"
                                      rows="10">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Product Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control-file"/>
                            <img src="{{$product->image}}"/>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4">Product Status</label>
                        <div class="col-md-8">
                            <label for=""><input type="radio" name="status" value="1"
                                                 @if($product->status===1) checked @endif > Published</label>
                            <label for=""><input type="radio" name="status" value="0"
                                                 @if($product->status===0) checked @endif> Unpublished</label>
                        </div>
                    </div>
                    <div class=" mt-2 row">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="form-control btn btn-outline-success" value="Edit Product"/>
                        </div>
                    </div>
                </form>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
