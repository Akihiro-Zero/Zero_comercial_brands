@extends('layouts.dashboard')

@section('content')
<div class="card">
    @php

    @endphp

    @foreach ($myorder as $order)
        <div class="card-header card-header-primary">
            <h4 class="card-title">Order Data: {{ $order->track_code }}</h4>
            <p class="card-category">Total Price: {{ $order->total_price }}</p>
        </div>
    @php
    $orders = App\Models\Orders::where('track_code',$order->track_code)->where('status','pending')->get();
    // dd($orders);
    $a = 1
    @endphp
        @foreach ($orders as $items)
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Number</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Status</td>
                            <td>Track Code</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $items->product->name}}</td>
                            <td>{{ $items->product->price }}</td>
                            <td>{{ $items->status }}</td>
                            <td>{{ $order->track_code }}</td>
                            <td>
                                @if ($items->product->image == true)
                                <img src="{{ asset('storage/'.$items->product->image) }}" alt="Image Here" width="150">
                                @else
                                <img src="{{ asset('base-img/avatar.png') }}" alt="" width="150">
                                @endif
                            </td>
                            <td>
                                {{-- <a href="{{ url('product-edit/'.$items->slug) }}" class="btn btn-primary">Edit</a> --}}
                                <a href="{{ url('my-order-details/'.$items->id) }}" class="btn btn-info">More Details</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach

    @endforeach
</div>
@endsection
