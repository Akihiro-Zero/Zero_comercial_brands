@extends('layouts.dashboard')

@section('content')
{{-- @dd($orders->id) --}}
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">My Order Details</h4>
              <p class="card-category">Checking Your Details</p>
            </div>
            <div class="card-body">
              {{-- <form action="{{ url('order-sending/'.$orders->id) }}" method="POST"> --}}
                @csrf
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
                <form action="{{ url('my-order-cancel/'.$orders->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger pull-right">Cancel Orders</button>
                </form>
                @elseif ($orders->status == 'on the way')
                <form action="{{ url('my-order-confirm/'.$orders->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-info pull-right">Confirm Orders</button>
                </form>
                @else
                    <button type="button" class="btn btn-primary pull-right">Thank You For Your Purchase</button>
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
                @if ($orders->product->image == false)
                    <img class="img" src="{{ asset('base-img/avatar.png') }}" />
                @else
                    <img class="img" src="{{ asset('storage/'.$orders->product->image) }}" />
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
