<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="app">
        <header>
            <h1>Let's Talk!</h1>
            <input type="text" name="username" id="username" placeholder="please enter username">
        </header>

        <div id="message"></div>

        <form id="message" action="">
            <input type="text" name="message" id="message_input" placeholder="Write a message...">
            <button type="submit" id="message_send">Send Message</button>
        </form>
    </div>
    <script src="{{ asset('chat-app/js/app.js') }}"></script>
</body>
</html>

{{-- @extends('layouts.dashboard')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('chat-app/style.css') }}">
@endsection

@section('title')
    Customers Chatt
@endsection

@section('content')
    <div class="app">
        <header>
            <h1>Chat To Seller</h1>
        </header>

        <div id="messages"></div>

        <form id="messages" action="">
            <input type="text" name="message" id="message_input" placeholder="Write a message...">
            <button type="submit" id="message_send">Send Message</button>
        </form>
    </div>
    <script src=""></script>
@endsection --}}
