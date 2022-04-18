@extends('admin.layout.master')
@section('tittle','Edit Product')
@section('page_heading','Edit Product Form')
@section('content')


<div class="container">
    <div class="col-lg-10 ml-5">
        <div class="card p-5">
          <form  action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
              <input type="text" value="{{$product->name}}" name="name" class="form-control" placeholder="Enter Product Name">
            </div>

            <div class="form-group">
              <label >Quantity</label>
              <input type="number" value="{{$product->qty}}" name="qty" class="form-control" placeholder="Total Quantity">
            </div>

            <div class="form-group">
              <label >Price</label>
              <input type="number" value="{{$product->price}}" name="price" class="form-control" placeholder="$ ----">
            </div>

            <div class="form-group">
              <label >Description</label>
              <textarea class="form-control"  name="description" id="" cols="20" rows="4">{{$product->description}}</textarea>
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

            <div class="form-group">
                <button type="submit" class="btn form-control btn-primary">Update</button>
              </div>
          </form>
        </div>
    </div>
</div>

@endsection