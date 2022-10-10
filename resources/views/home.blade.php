@extends('layouts.comercial-frontend')

@section('content')
<div class="container pb-60">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>You Are Logged In</h2>
            <a href="{{ url('/') }}" class="btn btn-submit btn-submitx">Continue Shopping</a>
        </div>
    </div>
</div>
<!--end container-->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
