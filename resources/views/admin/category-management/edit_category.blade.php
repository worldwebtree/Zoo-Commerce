@extends('admin.layout.master')
@section('tittle','Edit User')
@section('page_heading','Edit User Form')
@section('content')


<div class="container">
    <div class="col-lg-10 ml-5">
        <div class="card p-5">
    <form  action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label >Category Name</label>
          <input type="text" value="{{$category->name}}" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update" class="btn btn-success btn-block mt-4" class="form-control">
        </div>         
      </form>
        </div>
    </div>
</div>

@endsection