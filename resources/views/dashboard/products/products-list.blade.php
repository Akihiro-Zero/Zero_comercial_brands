@extends('layouts.dashboard')

@section('title')
    Product List
@endsection

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
                    <td>Name</td>
                    <td>Description</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $a = 1
                @endphp
                @foreach ($products as $items)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->description }}</td>
                    <td>
                        <img src="storage/{{ $items->image }}" alt="Image Here" width="150">
                    </td>
                    <td>
                        <a href="{{ url('product-edit/'.$items->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('product-destroy/'.$items->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('product-add') }}" class="card-title btn btn-info pull-right">Add Products</a>
    </div>
</div>
@endsection
