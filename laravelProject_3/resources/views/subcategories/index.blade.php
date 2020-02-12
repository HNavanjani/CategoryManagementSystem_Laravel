@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div style="margin: 20px;" >
<h1><span class="badge badge-secondary">View Subcategories</span></h1>
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Subcategory Description</td>
          <td>Subcategory Sequence</td>
          <td>Subcategory Category ID</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($subcategories as $subcategory)
        <tr>
            <td>{{$subcategory->id}}</td>
            <td>{{$subcategory->description}}</td>
            <td>{{$subcategory->sequence}}</td>
            <td>{{$subcategory->category_id}}</td>
            <td><a href="{{ route('subcategories.edit',$subcategory->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('subcategories.destroy', $subcategory->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection