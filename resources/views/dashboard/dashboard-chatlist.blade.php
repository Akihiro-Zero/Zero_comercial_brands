@extends('layouts.dashboard')

@section('title')
    Chat List
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
                    {{-- <td>Image</td> --}}
                    <td>Name</td>
                    <td>Message</td>
                    {{-- <td>Action</td> --}}
                </tr>
            </thead>
            <tbody>
                @dd($message[0]->$user)
                @php
                    $a = 1
                @endphp
                @foreach ($message as $items)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>
                        {{-- <img src="storage/{{ $items->user->name }}" alt="Image Here" width="150"> --}}
                    </td>
                    <td>{{ $items->$user->id }}</td>
                    <td>{{ $items->msg }}</td>
                    <td>
                        {{-- <a href="{{ url('chatt-app/'.$items->name) }}" class="btn btn-primary">Edit</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
