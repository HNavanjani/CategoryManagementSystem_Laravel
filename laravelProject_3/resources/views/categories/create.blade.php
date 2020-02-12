@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<!--Add Category Form-->
<div style="margin: 20px;" >
<h1><span class="badge badge-secondary">Add New Category</span></h1>
</div>
<div class="card uper">
  <div class="card-header">
  Create Category
  </div>
  <div class="card-body">
<div style="margin: 20px;" >

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif


<form  method="post" action="{{ route('categories.store') }}">
  <div class="form-group">
  @csrf
   <label for="description">Category Description :</label>
    <input type="text" class="form-control" name="description" placeholder="Enter description">
  </div>
  <div class="form-group">
  <label for="sequence">Category Sequence :</label>
    <input type="number" class="form-control" name="sequence" placeholder="Enter Sequence">
  </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
</div>
@endsection