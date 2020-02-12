@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div style="margin: 20px;" >
<h1><span class="badge badge-secondary">Edit Category</span></h1>
</div>
<div class="card uper">
  <div class="card-header">
    Edit Category
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Category Description:</label>
          <input type="text" class="form-control" name="description" value={{ $category->description }} />
        </div>
        <div class="form-group">
          <label for="price">Category Sequence:</label>
          <input type="text" class="form-control" name="sequence" value={{ $category->sequence }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection