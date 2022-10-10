@extends('layouts.dashboard')

@section('title')
    Add Products
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Products</h4>
            <p class="card-category">Add your Product To Sell</p>
          </div>
          <div class="card-body">
            <form action="{{ url('product-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="seller_id" value="{{ Auth()->id() }}">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Product Name</label>
                    <input type="text" required class="form-control" name="name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Slug</label>
                    <input type="text" required class="form-control" name="slug">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" name="description" required class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <select class="form-control" name="cate_id" id="">
                            <option value="">Select Categories</option>
                        @foreach ($category as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Price</label>
                      <input type="number" required class="form-control" name="price">
                    </div>
                  </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Quantity</label>
                      <input type="number" required class="form-control" name="qty">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Weight</label>
                      <input type="text" required class="form-control" name="weight">
                    </div>
                  </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Color</label>
                      <input type="text" required class="form-control" name="color">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Dimension</label>
                      <input type="text" required class="form-control" name="dimension">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Product Status</label>
                    <input type="checkbox" value="true" name="status">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Popular</label>
                    <input type="checkbox" value="true" name="popular">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <hr>
                  <label for="">Insert Product Image</label>
                  <input type="file" name="image" id="">
                  <hr>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Add Product</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
