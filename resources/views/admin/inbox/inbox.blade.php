@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 calss="card-title">Inbox</h4>
                        <a href="javascript:history.back()" class="back-link">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <div class="table-resposive pt-3">
                            <table id="inbox"  class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            User name
                                        </th>
                                        <th>
                                            Item Name
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                        <th>
                                            Service
                                        </th>
                                        <th>
                                            Video Proof
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Date Created
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>
                                                    @php 
                                                        $client_name = \App\Models\User::where('id', $ticket['user_id'])->first();
                                                    @endphp
                                                    {{ $client_name->name }}
                                        </td>
                                        <td>
                                                    @php 
                                                        $product_name = \App\Models\Product::where('id', $ticket['orders_products_id'])->first();
                                                    @endphp
                                                    {{ $product_name->product_name }}
                                        </td>
                                        <td>{{$ticket['message']}}</td>
                                        <td>{{$ticket['service']}}</td>
                                        <td><a href="{{ $ticket['video_proof'] }}" target="_blank">Watch Video</a></td>
                                        <td>{{$ticket['status']}}</td>
                                        <td>{{$ticket['created_at']}}</td>
                                        <td>
                                       

                                        <a  
                                        @if($ticket['status']!="Delivered" ) href="{{ url('admin/reply/'.$ticket['id']) }}" @endif class="btn btn-block btn-primary">Reply</a>
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection