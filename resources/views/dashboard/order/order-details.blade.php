@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Buyer Details</h4>
              <p class="card-category">Complete Your Buyer Preferences</p>
            </div>
            <div class="card-body">
              {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" readonly value="{{ $orders->email }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone Number</label>
                      <input type="number" readonly name="phone"  value="{{ $orders->phone }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" readonly name="firstname"  value="{{ $orders->firstname }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" readonly name="lastname"  value="{{ $orders->lastname }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" name="adress" readonly value="{{ $orders->address }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">City</label>
                      <input type="text" name="city" readonly value="{{ $orders->city }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Country</label>
                      <input type="text" name="country" readonly value="{{ $orders->country }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Product Price</label>
                      <input type="number" name="price" readonly value="{{ $orders->price }}" class="form-control">
                    </div>
                  </div>
                </div>
                @if ($orders->status == 'pending')
                <form action="{{ url('order-sending/'.$orders->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary pull-right">Confirm Sending Orders</button>
                </form>
                @elseif ($orders->status == 'completed')
                <form action="{{ url('order-takemoney/'.$orders->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="wallet" value="{{ $orders->price * $orders->qty }}">
                    <button type="submit" class="btn btn-info pull-right">Take Your Money</button>
                </form>
                @endif
                <div class="clearfix"></div>
              {{-- </form> --}}
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
                    <img class="img" src="{{ asset('storage/product-image/'.$orders->product->image) }}" />
                @endif
              </a>
            </div>
            <div class="card-body">
                <h6 class="card-category text-gray">Total Product Left: {{ $orders->product->qty }}</h6>
              <h6 class="card-category text-gray">Total Product Bought: {{ $orders->qty }}</h6>
              <h4 class="card-title">{{ $orders->name }}</h4>
              <p class="card-description">
                {{ $orders->product->description }}
              </p>
              {{-- <h1>meme</h1> --}}
              <h4 class="card-primary">Status : {{ $orders->status }}</h4>
              <a href="{{ url('product-details/'.$orders->product->slug) }}" class="btn btn-primary btn-round">Check Your Product</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
