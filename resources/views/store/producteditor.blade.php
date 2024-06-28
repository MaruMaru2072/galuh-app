@extends('layouts.app')
@section('content')
    <form method="post" enctype="multipart/form-data" @if ($items) action="/updateProduct/{{ $items->id }}"
          @else action="/addProductPage" @endif>
        @csrf
        <div class="d-flex mt-2 ms-5">
            <a href="/manageProductPage">
                <button type="button" class="btn btn-secondary">
                    <- Back
                </button>
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="text-center" style="width: 70%;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><b>Name</b></label>
                    <input name="name" type="text" class="form-control" aria-describedby="emailHelp"
                           @if ($items) value="{{ $items->name }}" @endif>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category"><b>Category</b></label><br>
                    <select name="category" style="width: 100%;">
                        <option disabled selected>Choose a category</option>
                        @foreach ($categories as $category)
                            @if ($items && $items->category_id == $category->id)
                                <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                            @else
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><b>Detail</b></label>
                    <div>
                        <textarea name="detail" style="width: 100%">@if ($items)
                                {{ $items->detail }}
                            @endif</textarea>
                    </div>
                    @error('detail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><b>Price</b></label>
                    <input name="price" class="form-control" id="exampleInputPassword1"
                           @if ($items) value="{{ $items->price }}" @endif>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label"><b>Photo</b></label>
                    <input class="form-control" type="file" @if($items) value="{{ $items->photourl }}" @endif>
                    @error('imageFile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if ($items && $items->photourl)
                        <div class="mt-2">
                            <img src="{{ $items->photourl }}" style="max-height:35vh; max-width:15vw;"
                                 alt="Product Image">
                        </div>
                    @endif
                </div>
                <div class="mb-3 d-flex justify-content-start">
                    <button class="btn btn-primary" type="submit">
                        @if ($items)
                            Update Product
                        @else
                            Add Product
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
