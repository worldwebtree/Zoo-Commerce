@extends('admin.layout.master')
@section('tittle','Brands ')
@section('page_heading','Brands')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
               + Add New Brand 
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
                            @forelse ($brands as $brand)
                                <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{ucfirst($brand->name)}}</td>  
                                <td>
                                  <a href="{{route('brands.edit',$brand->id)}}" class="m-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('brands.destroy',$brand->id)}}" onclick="return confirm('Are you Sure to Delete {{$brand->name}}')" class="m-1"><i class="fa fa-trash"></i></a>
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
            <form  action="{{route('brands.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label >Brand Name</label>
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