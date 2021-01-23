@extends('layouts.app')


@section('content')
{{-- <div class="d d-flex justify-content-end mb-2">
<a href="{{ route('categories.create') }}" class="btn btn-success float-right">Add Category</a>
</div> --}}
<div class="card card-default">
    <div class="card-header">Categories</div> 
    <div class="card-body">
        <table class="table">
            <thead>
                <th>
                    Name
                </th>
                <th> Product Count </th>
                <th> Edit </th>
                
                <th> Delete </th>
                <th></th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                           {{ $category->name }}
                        </td>
                        <td>
                          {{ $category->products->count() }}
                        </td>
                        <td> 
                        <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-xs btn-info">Edit</a>
                        </td>
                        <td>
                           <button class="btn btn-danger" onclick="handleDelete({{ $category->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="" method="post" id="deleteCategoryForm">
        @method('DELETE')
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center text-bold">
              Are you sure you want to delete this category?
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

  var form = document.getElementById('deleteCategoryForm')
  form.action = '/categories/' + id
  //console.log('deleting.', form)
  $('#deleteModal').modal('show')

}

</script>
    
@endsection