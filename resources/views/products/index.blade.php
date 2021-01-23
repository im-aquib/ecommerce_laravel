@extends('layouts.app')


@section('content')
{{-- <div class="d d-flex justify-content-end mb-2">
<a href="{{ route('products.create') }}" class="btn btn-success float-right">Add Product</a>
</div> --}}
<div class="card card-default">
    <div class="card-header">Products</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
        
                <th> Category </th>
            
                <th> Edit </th>
                
                <th> Delete </th>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                           {{ $product->name }}
                        </td>

                        <td>
                        <a href="{{ route('categories.edit', $product->category->id )}}">
                          {{ $product->category->name }}
                         </a>
                        </td>

                         <td>
                         <a href="{{ route('products.edit', ['id' => $product->id ]) }}" class="btn btn-xs btn-info ">Edit</a>
                         </td>

                         <td>
                             
                             {{-- <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-xs btn-danger">Delete</button>
                            </form> --}}

                            <button class="btn btn-danger" onclick="handleDelete({{ $product->id }})">Delete</button>
                         </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="" method="post" id="deleteProductForm">
                @method('DELETE')
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center text-bold">
                      Are you sure you want to delete this Product?
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

    </div>
</div>
    
@endsection

@section('scripts')



<script>

function handleDelete (id) {

var form = document.getElementById('deleteProductForm')
form.action = '/products/' + id
//console.log('deleting.', form)
$('#deleteModal').modal('show')

}

</script>

    
@endsection

