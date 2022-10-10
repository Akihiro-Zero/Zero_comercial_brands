@extends('layouts.dashboard')
@section('title')
    User Profile
@endsection

@section('content')
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
              <form action="{{ url('update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" readonly value="{{ $user->name }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" readonly value="{{ $user->email }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone Number</label>
                      <input type="number" name="phone"  value="{{ $user->phone }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" name="firstname"  value="{{ $user->firstname }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" name="lastname"  value="{{ $user->lastname }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" name="adress"  value="{{ $user->adress }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">City</label>
                      <input type="text" name="city"  value="{{ $user->city }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Country</label>
                      <input type="text" name="country"  value="{{ $user->country }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Postal Code</label>
                      <input type="number" name="postcode"  value="{{ $user->postcode }}" class="form-control">
                    </div>
                  </div>
                  <input type="hidden" name="oldimage" value="{{ $user->image }}">
                  <div class="col-md-5">
                    <hr>
                    <label for="">Insert Profile Photos</label>
                    <input type="file" name="image" id="">
                    <hr>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="">
                @if (Auth()->user()->image == false)
                    <img class="img" src="{{ asset('base-img/avatar.png') }}" />
                @else
                    <img class="img" src="{{ asset('storage/'.$user->image) }}" />
                @endif
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">{{ $user->role }}</h6>
              <h4 class="card-title">{{ $user->name }}</h4>
              <p class="card-description">
                {{ $user->about }}
              </p>
            @if (Auth()->user()->hasRole(['admin','seller']))
              <a href="{{ url('seller-update') }}" class="btn btn-primary btn-round">Update Your Shop</a>
            @else
              <a href="{{ url('seller-registration') }}" class="btn btn-primary btn-round">Become A Seller</a>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

