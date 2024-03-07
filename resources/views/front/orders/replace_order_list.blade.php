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
                    <a href="#">Orders</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <table class="table table-striped table-borderless">
                <tr class="table-danger">
                    <th>Message ID</th>
                    <th>Message</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
                @foreach($message_details as $messagelist)
                <tr>
                    <td>{{$messagelist->id}}</td>
                    <td>{{$messagelist->message}}</td>
                    <td>{{$messagelist->created_at}}</td>
                    <td>
                        <a href="{{ url('message/message') }}"><u>Message</u></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection