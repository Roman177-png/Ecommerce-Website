@extends('auth.layouts.master')
@section('title', 'Edit Product ')
@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Edit category <b>{{$product->name}}</b></h1>
        @else
            <h1>Add category </h1>
        @endisset

        <h1>Add category</h1>
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update',$product) }}"
              @else
              action="{{ route('products.store') }}"
                @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code </label>
                    <div class="col-sm-6">
                        <div class="alert alert-danger"></div>
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{$product->code}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name </label>
                    <div class="col-sm-6">
                        <div class="alert alert-danger"></div>
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{$product->name}}@endisset">
                    </div>
                </div>

                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <div class="alert alert-danger"></div>
                        <input type="text" class="form-control" name="category_id" id="category_id"
                               value="@isset($product){{$product->category_id}}@endisset">
                    </div>
                </div>

                <br>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description: </label>
                    <div class="col-sm-6">
                        <div class="alert alert-danger"></div>
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product){{$product->description}}@endisset</textarea>
                    </div>
                </div>
                <br>
                <br>

                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Upload <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection