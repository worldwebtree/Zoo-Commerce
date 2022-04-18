@extends('admin.layout.master')
@section('tittle','Edit User')
@section('page_heading','Edit User Form')
@section('content')


 <div class="container">
    <div class="col-lg-10 ml-5">
        <div class="card p-5">
    <form  action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label >First Name</label>
          <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control" >
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control" >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" value="{{$user->email}}" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role">
              <option value="select" selected disabled>Select Role</option>
              <option value="admin" {{ $user->role == 'admin' ? 'selected' : ''}}>Admin</option>
              <option value="user" {{ $user->role == 'user' ? 'selected' : ''}}>User</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file"  name="image" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update" class="btn btn-success btn-block mt-4" class="form-control">
        </div>         
      </form>
        </div>
    </div>
</div>

@endsection