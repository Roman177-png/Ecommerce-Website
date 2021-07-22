@extends('auth.layouts.master')
@section('title', 'Edit Product ')
@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Edit<b>{{$product->name}}</b></h1>
        @else
            <h1>Add category </h1>
        @endisset
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
                        @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{--{{old('code', isset($category)?$category->code:null)}}--}}@isset($product){{$product->code}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name </label>
                    <div class="col-sm-6">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{--{{old('name', isset($category)?$category->name:null)}}--}}@isset($product){{$product->name}}@endisset">
                    </div>
                </div>

                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                @isset($product)
                                    @if($product->category_id == $category->id )
                                        selected
                                        @endif
                                @endisset
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description: </label>
                    <div class="col-sm-6">
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
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