@extends('front.layout.layout')

@section('content')
<div class="container">
    <h2 style="text-align: center;">Styled Form with Text and Image Inputs</h2>
    <form action="/submit" method="post" enctype="multipart/form-data" style="max-width: 500px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        
        <!-- Text Inputs -->
        <div style="margin-bottom: 15px;">
            <label for="text1" style="color: #555;">Text Input 1:</label><br>
            <input type="text" id="text1" name="text1" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <!-- Image Inputs -->
        <div style="margin-bottom: 15px;">
            <label for="image1" style="color: #555;">Image Input 1:</label><br>
            <input type="file" id="image1" name="image1" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="image2" style="color: #555;">Image Input 2:</label><br>
            <input type="file" id="image2" name="image2" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="image3" style="color: #555;">Image Input 3:</label><br>
            <input type="file" id="image3" name="image3" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <input type="submit" value="Submit" style="width: 100%; background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
        </div>
    </form>
</div>
@endsection
