@extends('admin.layout.master')
@section('tittle','Users Management')
@section('page_heading','User Management')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
               + Add User
              </button>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <p>{{session()->get('success')}}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            @forelse ($users as $user)
                                <tr>
                                <td>{{$user->id}}</td>
                                <td>{{ucfirst($user->first_name)}}</td>
                                <td>{{ucfirst($user->last_name)}}</td>
                                <td>{{$user->email}}</td>
                                <td><img width="50px" height="50px" src="/storage/images/{{$user->image}}" alt=""></td>
                                <td>
                                    
                                    <a href="{{route('users.edit',$user->id)}}" class="m-1"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="m-1"><i class="fa fa-trash"></i></a>
                                    <a href="#" class="m-1"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @empty                           
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role">
                      <option value="select" selected disabled>Select Role</option>
                      <option value="admin">Admin</option>
                      <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
        </div>
       
      </div>
    </div>
  </div>









   
  <!--this Modal is for Edit-->

  <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm password</label>
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
              </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection