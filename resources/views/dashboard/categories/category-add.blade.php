@extends('layouts.dashboard')

@section('title')
    Add Categories
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form action="{{ url('category-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Category Name</label>
                    <input type="text" required class="form-control" name="name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Slug</label>
                    <input type="text" required class="form-control" name="slug">
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Popular?</label>
                      <input type="checkbox" name="popular" value="True">
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
                <div class="col-md-5">
                  <hr>
                  <label for="">Insert Category Image</label>
                  <input type="file" name="image" id="">
                  <hr>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Add Categories</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
