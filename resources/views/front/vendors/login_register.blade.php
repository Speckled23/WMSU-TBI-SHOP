@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->

    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> {{ Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <!-- Login -->
                <div class="col-lg-6" id="loginSection">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Vendor Login</h2>
                        <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                        <form action="{{ url('admin/login') }}" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="vendor-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="vendor-email" class="text-field" placeholder="Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <div class="password-toggle-row">
                                    <input type="password" id="vendorpassword" name="password" class="text-field" placeholder="Seller Password">
                                </div>
                                <div class="toggle-switch">
                                    <input type="checkbox" id="showPassword" class="toggle-checkbox" onclick="togglePasswordVisibility('vendorpassword')">
                                    <label for="showPassword" class="toggle-label"></label>
                                    <label for="showPassword" class="toggle-text">Show</label>
                                </div>
                            </div>

                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Login</button>
                            </div>
                            <div class="text-center"> <!-- Center the "Already have an account? Login" message -->
                                <p>Don't have an account? <a href="#" id="showRegister">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->

                <!-- Register -->
                <div class="col-lg-6" id="registerSection" style="display: none;">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Register Vendor Account</h2>
                        <h6 class="account-h6 u-s-m-b-30">Upon successful registration on our site and after being authorized by the administrator, you can gain access to your vendor account, allowing you to start selling your products.</h6>
                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">@csrf 
                            <div class="u-s-m-b-30">
                                <label for="vendorfirstname">First Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorfirstname" name="first_name" class="text-field" placeholder="Seller First Name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorlastname">Last Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorlastname" name="last_name" class="text-field" placeholder="Seller Last Name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormiddleinitial">Middle Initial (Optional)</label>
                                <input type="text" id="vendormiddleinitial" name="middle_initial" class="text-field" placeholder="Middle Initial">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile">Mobile No.
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" name="mobile" class="text-field" placeholder="Seller Mobile No.">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendoremail" name="email" class="text-field" placeholder="Seller Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <div class="password-toggle">
                                    <input type="password" id="vendorpassword" name="password" class="text-field" placeholder="Seller Password">
                                    <input type="checkbox" id="showRegisterPassword" class="toggle-checkbox" onclick="toggleRegiterVisibility('vendorpassword')">
                                    <label for="showRegisterPassword" class="toggle-label"></label>
                                    <label for="showRegisterPassword" class="toggle-text">Show</label>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Confirm Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password-confirm" name="password_confirmation" class="text-field" placeholder="Confirm Password" onkeyup="validatePassword()">
                                <p id="register-password-confirm"></p>
                            </div class="terms">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">I have carefully reviewed and hereby accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms and conditions.</a>
                                </label>
                            </div>
                           
                            <div class="u-s-m-b-45" id="nextbtn">
                                <button class="button button-primary w-100">Next</button>
                            </div>
                            <div class="text-center"> <!-- Center the "Already have an account? Login" message -->
                                <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->

                <!-- Vendor Details Form -->
                <div class="row" id="shopSection" style="display: none;">
                    <div class="col-lg-12">
                        <h2 class="account-h2 u-s-m-b-20">Vendor Shop Details</h2>
                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">
                        <div class="col-md-6">
                            <div class="u-s-m-b-30">
                                    <label for="vendorshopname">Shop Name
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="vendorshopname" name="first_name" class="text-field" placeholder="Shope Name">
                            </div>
                            <div class="u-s-m-b-30">
                                    <label for="addressdetails">Shop Address Details
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="addressdetails" name="first_name" class="text-field" placeholder="Shope Name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="shop_address">Shop Address</label>
                                <input type="text" class="form-control" id="shop_address" placeholder="Enter Shop Address" name="shop_address" @if(isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="shop_city">Shop City</label>
                                <input type="text" class="form-control" id="shop_city" placeholder="Enter Shop City" name="shop_city"  value="Zamboanga City" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="shop_barangay">Shop Barangay</label>
                                <select class="form-control" id="shop_barangay" name="shop_barangay"  style="color: #495057;">
                                        <option value="">Select Barangay</option>
                                    
                                </select> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="u-s-m-b-30">
                                <label for="shop_country">Shop Province</label>
                                <input type="text" class="form-control" id="shop_country" name="shop_country" value = "ZAMBOANGA DEL SUR" readonly="">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="shop_pincode">Shop Zipcode</label>
                                <input type="text" class="form-control" id="shop_pincode"  name="shop_pincode" value = "7000" readonly="">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="shop_mobile">Shop Contact No.</label>
                                <input type="text" class="form-control" id="shop_mobile" placeholder="Enter 11 Digit Mobile Number" name="shop_mobile" @if(isset($vendorDetails['shop_mobile'])) value="{{ $vendorDetails['shop_mobile'] }}" @endif required="" maxlength="11" minlength="11">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="business_license_number">Business License Number</label>
                                <input type="text" class="form-control" id="business_license_number" placeholder="Enter Business License Number" name="business_license_number" @if(isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif>
                            </div>
                        </div>

                        <div class="u-s-m-b-30">
                            <label for="address_proof_image">Government Issued ID Proof</label>
                            <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                            <!-- @if(!empty($vendorDetails['address_proof_image']))
                                <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                                <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                            @endif -->
                        </div>

                        <div class="u-s-m-b-30">
                            <label for="address_proof_image">Bussiness Permit</label>
                            <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                            <!-- @if(!empty($vendorDetails['address_proof_image']))
                                <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                                <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                            @endif -->
                        </div>

                        <div class="u-s-m-b-30">
                            <label for="address_proof_image">BIR</label>
                            <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                            <!-- @if(!empty($vendorDetails['address_proof_image']))
                                <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                                <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                            @endif -->
                        </div>

                        <div class="form-group">
                            <label for="address_proof_image">DTI</label>
                            <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                            <!-- @if(!empty($vendorDetails['address_proof_image']))
                                <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                                <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                            @endif -->
                        </div>

                        <div class="u-s-m-b-45" id="regsiterbtn">
                                <button class="button button-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Vendor Details Form -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->

    <script>
        document.getElementById('showRegister').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginSection').style.display = 'none';
            document.getElementById('regsiterbtn').style.display = 'none';
            document.getElementById('shopSection').style.display = 'none';
            document.getElementById('registerSection').style.display = 'block';
        });

        document.getElementById('showLogin').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginSection').style.display = 'block';
            document.getElementById('regsiterbtn').style.display = 'none';
            document.getElementById('shopSection').style.display = 'none';
            document.getElementById('registerSection').style.display = 'none';
        });

        document.getElementById('nextbtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginSection').style.display = 'none';
            document.getElementById('regsiterbtn').style.display = 'block';
            document.getElementById('shopSection').style.display = 'block';
            document.getElementById('registerSection').style.display = 'none';
        });

        function togglePasswordVisibility(passwordFieldId) {
            var passwordField = document.getElementById(passwordFieldId);
            var showCheckbox = document.getElementById('showPassword');

            if (showCheckbox.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function toggleRegiterVisibility(passwordFieldId) {
            var registerField = document.getElementById(passwordFieldId);
            var Checkbox = document.getElementById('showRegisterPassword');

            if (Checkbox.checked) {
                registerField.type = "text";
            } else {
                registerField.type = "password";
            }
        }

    </script>
@endsection
