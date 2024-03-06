@extends('front.layout.layout')

@section('content')

<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
        <h2>Replace or Refund {{ $item_details->product_name }}</h2>

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

<div class="container">
    <div class="m-8 p-8">
        asdadfs
    </div>
    <div class="border border-dark-light m-3 p-3 rounded">
    <form action="/RRmessage" method="post" enctype="multipart/form-data">

        @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Text Inputs -->
                   <h5 class="text-center">Type your reasons below:</h5>
                    <textarea class="text-area" name="message" id="message" placeholder="Type Here..." minlength="0" maxlength="100" cols="40" rows="10"></textarea>
                </div>

                <div class="col-md-6">
                    <div class="">
                        <h5 class="text-center">Image Proof</h5>
                    </div>
                        <!-- Image Inputs -->
                    <div style="margin-bottom: 15px;">
                        <label for="proofimage1" style="color: #555;">Image:</label><br>
                        <input type="file" id="proofimage1" name="proofimage1" onchange="previewImage(this, 'preview1');" accept="image/*" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
                        <br>
                        <img id="preview1" src="" alt="Image Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <label for="proofimage2" style="color: #555;">Image:</label><br>
                        <input type="file" id="proofimage2" name="proofimage2" onchange="previewImage(this, 'preview2');" accept="image/*" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
                        <br>
                        <img id="preview2" src="" alt="Image Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <label for="proofimage3" style="color: #555;">Image:</label><br>
                        <input type="file" id="proofimage3" name="proofimage3" onchange="previewImage(this, 'preview3');" accept="image/*" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
                        <br>
                        <img id="preview3" src="" alt="Image Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <input type="submit" value="Submit" style="width: 100%; background-color: #d90429; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                    </div>                              
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


<script>
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "";
            preview.style.display = null;
        }
    }
</script>
