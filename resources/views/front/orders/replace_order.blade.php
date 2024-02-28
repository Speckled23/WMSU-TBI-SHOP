@extends('front.layout.layout')
@section('content')

<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Order #{{ $orderDetails['id'] }} Details</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="{{ url('user/orders') }}">Orders</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <!-- Form for report -->
    <form method="post" action="{{ url('submit-report') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="reason">Reason for Report (Max 255 words)</label>
                <textarea class="form-control" id="reason" name="reason" rows="4" maxlength="255" required></textarea>
            </div>
            <div class="form-group">
                <label for="evidence">Evidence Images (Max 3)</label>
                @foreach($images as $image)
<div class="evidence-image">
    <img src="{{ asset('path/to/your/images/' . $image) }}" alt="Evidence Image">
</div>
@endforeach

            </div>
            <div class="form-group">
                <label>Choose Action:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action" id="replace" value="replace" required>
                    <label class="form-check-label" for="replace">Replace</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action" id="refund" value="refund" required>
                    <label class="form-check-label" for="refund">Refund</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </form>
        <!-- End Form for report -->
</div>
@include('front.orders.evidence', ['images' => $uploadedImages])
@endsection
