@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div style="margin: 20px;" >
<h1><span class="badge badge-secondary">Edit Subcategory</span></h1>
</div>
<div class="card uper">
  <div class="card-header">
    Edit Subcategory
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
      <form method="post" action="{{ route('subcategories.update', $subcategory->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Subcategory Description:</label>
          <input type="text" class="form-control" name="description" value={{ $subcategory->description }} />
        </div>
        <div class="form-group">
          <label for="price">Subcategory Sequence:</label>
          <input type="text" class="form-control" name="sequence" value={{ $subcategory->sequence }} />
        </div>

        <div class="form-group">
  <label for="category_id">Category :</label>
  <select name="category_id" class="form-control">
  @foreach($categories as $category)
  <option value='{{$category->id}}'>{{$category->id}}</option>
  @endforeach
</select>
</div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection