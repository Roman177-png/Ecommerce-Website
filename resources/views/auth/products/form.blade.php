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
                        @include('auth.layouts.error',['fieldName' => 'code'])
                        {{--
                        @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
--}}
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{--{{old('code', isset($category)?$category->code:null)}}--}}@isset($product){{$product->code}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName' => 'name'])

                        {{--                        @error('name')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror--}}
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{--{{old('name', isset($category)?$category->name:null)}}--}}@isset($product){{$product->name}}@endisset">
                    </div>
                </div>

                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName' => 'category_id'])
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
                        @include('auth.layouts.error',['fieldName' => 'description'])
                        {{--                        @error('description')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror--}}
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product){{$product->description}}@endisset</textarea>
                        @include('auth.layouts.error',['fieldName' => 'price'])
{{--                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror--}}


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
                    <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName' => 'price'])
                        {{--                        @error('description')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror--}}
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{--{{old('name', isset($category)?$category->name:null)}}--}}@isset($product){{$product->price}}@endisset">
                    </div>
                </div>
                <br>
                    @foreach([
                    'hit' => 'hits',
                    'new' => 'news',
                    'recommend' => 'recommends',
                    ] as $field=> $title)
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">{{$title}} </label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="form-control" name="{{$field}}" id="{{$field}}"
                                    @if(isset($product) && $product->$field === 1)
                                        checked = "checked"
                                    @endif
                                >
                            </div>
                        </div>
                        <br>
                    @endforeach
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection