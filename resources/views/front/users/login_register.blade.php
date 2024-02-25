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
            <div class="row justify-content-center">
                <!-- Login -->
                <div class="col-lg-6" id="loginDiv">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Login</h2>
                        <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                        <p id="login-error"></p>
                        <form id="loginForm" action="javascript:;" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="user-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="Email">
                                <p id="login-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-   word">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field" placeholder="Password">
                                <p id="login-password"></p>
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Login</button>
                            </div>
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <div class="text-center"> <!-- Center the "Already have an account? Login" message -->
                                            <p>Don't have an account? <a href="#"id="showRegister">Register</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->

                <!-- Register -->
                <div class="col-lg-6" id="registerDiv" style="display: none;">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Register</h2>
                        <h6 class="account-h6 u-s-m-b-30">By completing the registration process on this site, you will gain access to your order status and history.</h6>
                        <p id="register-success"></p>
                        <form id="registerForm" action="javascript:;" method="post">@csrf 
                        <div class="u-s-m-b-30">
                            <label for="firstname">First Name
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="firstname" name="firstname" class="text-field" placeholder="First Name">
                            <p id="register-firstname"></p>
                        </div>

                        <div class="u-s-m-b-30">
                            <label for="lastname">Last Name
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="lastname" name="lastname" class="text-field" placeholder="Last Name">
                            <p id="register-lastname"></p>
                        </div>

                        <div class="u-s-m-b-30">
                            <label for="middleinitial">Middle Initial (optional)</label>
                            <input type="text" id="middleinitial" name="middleinitial" class="text-field" placeholder="Middle Initial">
                            <p id="register-middleinitial"></p>
                        </div>

                            <div class="u-s-m-b-30">
                                <label for="usermobile">Mobile No.
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" name="mobile" class="text-field" placeholder="Customer Mobile No.">
                                <p id="register-mobile"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" name="email" class="text-field" placeholder="Customer Email">
                                <p id="register-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" name="password" class="text-field" placeholder="Customer Password">
                                <p id="register-password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Confirm Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password-confirm" name="password_confirmation" class="text-field" placeholder="Confirm Password">
                                <p id="register-password-confirm"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">I have carefully reviewed and hereby accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms and conditions.</a>
                                </label>
                                <p id="register-accept"></p>
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Register</button>
                            </div>
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                    <div class="text-center"> <!-- Center the "Already have an account? Login" message -->
                                        <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->

    <script>

        // Assuming you have references to the password and confirm password input fields
        var passwordInput = document.getElementById('userpassword');
        var confirmPasswordInput = document.getElementById('user-password-confirm');

        // Assuming you have a reference to the paragraph element where validation messages will be displayed
        var confirmPasswordError = document.getElementById('register-password-confirm');

        // Function to check if passwords match
        function validatePasswords() {
            var password = passwordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                confirmPasswordError.textContent = "Passwords do not match";
                confirmPasswordError.style.color = "red";
            } else {
                confirmPasswordError.textContent = ""; // Clear any previous error messages
            }
        }

        // Event listener to call the validatePasswords function whenever the confirm password input changes
        confirmPasswordInput.addEventListener('input', validatePasswords);

         document.getElementById('showRegister').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginDiv').style.display = 'none';
            document.getElementById('registerDiv').style.display = 'block';
        });

        document.getElementById('showLogin').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginDiv').style.display = 'block';
            document.getElementById('registerDiv').style.display = 'none';
        });
    </script>
@endsection
