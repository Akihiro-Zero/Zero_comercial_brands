@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">My Wallet : {{ $user->wallet }}</h4>
        <p class="card-category">Go sell some product or top-up</p>
    </div>
</div>
@endsection
