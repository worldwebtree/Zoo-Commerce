@extends('admin.layout.master')
@section('tittle','Edit Brands')
@section('page_heading','Edit Brand')
@section('content')


<div class="container">
    <div class="col-lg-10 ml-5">
        <div class="card p-5">
    <form  action="{{route('brands.update',$brand->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label >Brand Name</label>
          <input type="text" value="{{$brand->name}}" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update" class="btn btn-success btn-block mt-4" class="form-control">
        </div>         
      </form>
        </div>
    </div>
</div>

@endsection