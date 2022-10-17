@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Product List</h4>
        <p class="card-category">All Product</p>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <td>Number</td>
                    <td>Buyer Name</td>
                    <td>Your Product</td>
                    <td>Status</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $a = 1
                @endphp
                @foreach ($order as $items)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $items->firstname . $items->lastname }}</td>
                    <td>{{ $items->product->name }}</td>
                    <td>{{ $items->status }}</td>
                    <td>
                        @if ($items->product->image == true)
                        <img src="{{ asset('storage/'.$items->product->image) }}" alt="Image Here" width="150">
                        @else
                        <img src="{{ asset('base-img/avatar.png') }}" alt="" width="150">
                        @endif
                    </td>
                    <td>
                        {{-- <a href="{{ url('product-edit/'.$items->slug) }}" class="btn btn-primary">Edit</a> --}}
                        <a href="{{ url('order-details/'.$items->id) }}" class="btn btn-info">More Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {{-- <a href="{{ url('product-add') }}" class="card-title btn btn-info pull-right">Add Products</a> --}}
    </div>
</div>
@endsection
