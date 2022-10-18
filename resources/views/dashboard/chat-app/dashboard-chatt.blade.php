@extends('layouts.dashboard')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('chat-app/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
            <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    @if ($user->image == true)
                    <img src="{{ asset('storage/'.$user->image) }}" alt="">
                    @else
                    <img src="{{ asset('base-img/avatar.png') }}" alt="">
                    @endif
                <div class="details">
                <span>
                    {{ $user->firstname  . $user->lastname }}
                </span>
                <p>
                    {{ $user->status }}
                </p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                @csrf
                <input type="text" name="incoming_id" class="incoming_id" value="{{ $user->unique_id }}" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            </section>
    </div>
</div>
    <script src="{{ asset('chat-app/chat.js') }}"></script>
@endsection
