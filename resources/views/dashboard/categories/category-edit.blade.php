@extends('layouts.dashboard')

@section('title')
    Edit Category
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
            <form action="{{ url('category-update/'.$category->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Category Name</label>
                    <input type="text" required class="form-control" name="name" value="{{ $category->name }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Slug</label>
                    <input type="text" required class="form-control" name="slug" value="{{ $category->slug }}">
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Popular?</label>
                      <input type="checkbox" value="True" name="popular" {{ $category->popular == 'True' ? 'checked' : '' }}>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" name="description" required class="form-control" value="{{ $category->description }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <hr>
                  <img src="{{ asset('storage/'.$category->image) }}" width="100" alt="">
                  <hr>
                  <label for="">Insert Category Image</label>
                  <input type="hidden" name="oldimage" value="{{ $category->image }}">
                  <input type="file" name="image" id="">
                  <hr>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Update Categories</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
