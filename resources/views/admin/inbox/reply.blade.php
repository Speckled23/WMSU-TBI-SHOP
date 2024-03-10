@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chat</h4>
                        <div class="chat-container">
                            <div class="chat-messages">
                                <!-- Display chat messages here -->
                            </div>
                            <form id="chat-form" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="text" id="message" class="form-control" placeholder="Type your message here...">
                                    <!-- <label class="input-group-text btn btn-primary" for="image">
                                        <input type="file" id="image" name="image" style="display:none;"> Upload Image
                                    </label> -->
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
