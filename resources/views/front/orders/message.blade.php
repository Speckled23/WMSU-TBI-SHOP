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



@endsection