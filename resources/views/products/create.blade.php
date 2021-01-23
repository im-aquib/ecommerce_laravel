@extends('layouts.app')


@section('content')
<div class="card card-default">
    <div class="card-header">
    Create Product
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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
            <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
            <label for="description">Description</label>
                {{-- <textarea name="description" id="description" cols="20" rows="10" class="form-control" >{{ old('description') }}</textarea> --}}
                <input id="description" type="hidden" name="description">
                <trix-editor input="description"></trix-editor>
    
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                {{ $category->name }}
                </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="form-control btn btn-success">Publish Product</button>
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

