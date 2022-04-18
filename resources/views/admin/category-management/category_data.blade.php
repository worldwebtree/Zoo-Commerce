@extends('admin.layout.master')
@section('tittle','Category Management')
@section('page_heading','Category Management')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
               + Add Category
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                <td>{{$category->id}}</td>
                                <td>{{ucfirst($category->name)}}</td>  
                                <td>
                                  <a href="{{route('categories.edit',$category->id)}}" class="m-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('categories.destroy',$category->id)}}" onclick="return confirm('Are you Sure to Delete {{$category->name}}')" class="m-1"><i class="fa fa-trash"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Category Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label >Category Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter First Name">
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