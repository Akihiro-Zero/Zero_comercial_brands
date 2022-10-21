@extends('layouts.dashboard')
@section('title')
    Comercial Brands Seller Profile
@endsection

@section('content')
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            @if(Auth()->user()->hasRole(['admin','seller']))
                <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Shop Profile</h4>
                <p class="card-category">Edit Your Shop Profile</p>
                </div>
            @else
                <div class="card-header card-header-primary">
                <h4 class="card-title">Become A Seller</h4>
                <p class="card-category">Complete Your Account</p>
                </div>
            @endif
            <div class="card-body">
              <form action="{{ url('seller-update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nama Toko</label>
                      <input type="text" name="shop_name"  value="{{ $user->shop_name }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nomor E-KTP</label>
                      <input type="number" name="e_ktp"  value="{{ $user->e_ktp }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <select class="form-control" name="bank" id="">
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="mega">Mega</option>
                                <option value="mandiri">Mandiri</option>
                          </select>
                        </div>
                      </div>
                  </div>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nomor Rekening</label>
                      <input type="number" name="rekening"  value="{{ $user->rekening }}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone</label>
                      <input type="number" name="phone"  value="{{ $user->phone }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <div class="form-group">
                        <label class="bmd-label-floating">Describe About Your Shop</label>
                        <textarea class="form-control" rows="5" name="about">{{ $user->about }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                @if (Auth()->user()->hasRole(['admin','seller']))
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                @else
                    <button type="submit" class="btn btn-primary pull-right">Become Seller</button>
                @endif
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

