@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Messages</a>
                </li> 
            </ul>
        </div>
    </div>
</div>

<!-- Message form -->
    <div class="container">
        <div class="border border-dark-light m-3 p-3 rounded">
            <div class="chat">
                <div class="message">Hi there!</div>
                <div class="message me">Hello!</div>
                <div class="message">How are you?</div>
                <div class="message me">I'm doing great, thanks!</div>
            </div>
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Type your message...">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
<!-- Message form -->

@endsection