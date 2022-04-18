@extends('admin.layout.master')
@section('tittle','Product Management')
@section('page_heading','Product Management')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
               + Add New Product
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
                            <th>Category_Name</th>
                            <th>SubCategory_Name</th>
                            <th>Brand_Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Category_Name</th>
                          <th>SubCategory_Name</th>
                          <th>Brand_Name</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            @forelse ($products as $product)
                                <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->subCategory->name }}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->qty}}</td>
                                <td>Rs.{{$product->price}}</td>  
                                <td>
                                  <a href="{{route('products.edit',$product->id)}}" class="m-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('products.destroy',$product->id)}}" onclick="return confirm('Are you Sure to Delete {{$product->name}}')" class="m-1"><i class="fa fa-trash"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Product Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <select name="category_id" class="form-control">
                    <option value="" selected disabled>Select Category Name</option>     
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <select name="subcategory_id" class="form-control">
                    <option value="" selected disabled>Select SubCategory Name</option>     
                      @foreach ($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}">{{$subcategory->name }}</option>
                          @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <select name="brand_id" class="form-control">
                    <option value="" selected disabled>Select Brand Name</option>     
                      @foreach ($brands as $brand)
                          <option value="{{$brand->id}}">{{$brand->name }}</option>
                          @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label >Product Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                </div>

                <div class="form-group">
                  <label >Quantity</label>
                  <input type="number" name="qty" class="form-control" placeholder="Total Quantity">
                </div>

                <div class="form-group">
                  <label >Price</label>
                  <input type="number" name="price" class="form-control" placeholder="$ ----">
                </div>

                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="description" id="" cols="20" rows="4"></textarea>
                </div>

                <div class="form-group">
                  <label >Images</label>
                  <input type="file" name="images[]" class="form-control" multiple required>
                </div>
                
                <div class="form-group">
                  <label >Feature Product</label>
                  <select name="feature" class="form-control" id="">
                    <option value="" selected disabled>Select Feature</option>
                    <option value="1">Show</option>
                    <option value="0">Not Show</option>
                  </select>
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