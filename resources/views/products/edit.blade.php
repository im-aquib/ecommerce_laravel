@extends('layouts.app')


@section('content')
<div class="card card-default">
    <div class="card-header">
    Edit Product
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
       <ul class="list-group">
      @foreach ($errors->all() as $error)
        <li class="list-group-item text-danger">
          {{ $error }}
         </li>            
     @endforeach
     </ul>
     </div>
     @endif
     

    <form action="{{ route('products.update', ['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
            <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" value="{{ $product->description }}" type="hidden" name="description">
                <trix-editor input="description">{!! $product->description !!}</trix-editor>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control" name="Image" value="{{ $product->image }}">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                @if($category->id == $product->category->id)
                   selected 
                @endif
                >
                {{ $category->name }}
                </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <button class="form-control btn btn-success">Update Product</button>
            </div>
        </form>
    </div>
</div>
    
@endsection


@section('styles')

<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css" rel="stylesheet">

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>

    
@endsection
