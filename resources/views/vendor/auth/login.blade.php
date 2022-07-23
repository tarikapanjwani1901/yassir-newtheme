<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YASSIR | Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="/assests/css/style.css" rel="stylesheet">
	<link href="/assests/css/custom.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif

                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html">
                                            <!--<img src="images/logo-full.png" alt="">-->
                                            <h1 class="text-center mb-4 text-white">Vendor Login</h1>
                                        </a>
									</div>
                                    @if (session('mobile_number'))
                                        <h4 class="text-center mb-4 text-white">OTP Verification</h4>
                                        <form method="post" id="otp_form" action="{{ route('otpSubmit') }}" autocomplete="off">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Please enter OTP</strong></label>
                                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Please enter OTP">
                                                @if ($errors->has('otp'))
                                                    <span class="text-danger">{{ $errors->first('otp') }}</span>
                                                @endif
                                            </div>
                                            <input type="hidden" id="mobile_number" name="mobile_number" value="{{session('mobile_number')}}" class="form-control" placeholder="Enter Mobile No">
                                               
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-white text-primary btn-block">Submit</button>
                                            </div>

                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <a class="text-white resend_otp" href="javascript:void(0);">Resend OTP</a>
                                                </div>
                                                <div class="form-group">
                                                    <a class="text-white back_to_login" href="javascript:void(0);">Back to Login</a>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                        <form method="post" id="login_form" action="{{ route('generateOTP') }}" autocomplete="off">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Mobile No.</strong></label>
                                                <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter Mobile No">
                                                @if ($errors->has('mobile_number'))
                                                    <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                                @endif
                                            </div>
                                        
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-white text-primary btn-block">Send OTP</button>
                                            </div>

                                        </form>
                                        <div class="new-account mt-3">
                                            <p class="text-white">Don't have an account? <a class="text-white" href="#">Sign up</a></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/assests/vendor/global/global.min.js"></script>
	<script src="/assests/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/assests/js/custom.min.js"></script>
    <script src="/assests/js/deznav-init.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> 

    <script>
        
        $(document).ready(function() {
            jQuery(document).on("click",".resend_otp",function(){
                $.ajax({
                    type: "GET",
                    url: "{{ route('resendOTP') }}",
                    dataType: "json",
                    success: function (data) {
                        if(data.success){
                            alert("OTP has been successfully send.");	
                        }else{
                            alert("Sorry invalid request. please try again.");		
                        }
                    },
                    error: function () {
                        alert("Sorry invalid request. please try again.");	
                    },
                });
            });

            $("#login_form").validate({
                rules: {
                    mobile_number: {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    mobile_number: {
                        required: "Mobile Number is required",
                    },
                }
            });

            $("#otp_form").validate({
                rules: {
                    otp: {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    otp: {
                        required: "OTP is required",
                    },
                }
            });

            jQuery(document).on("click",".back_to_login",function(){
                $.ajax({
                    type: "GET",
                    url: "{{ route('backtologin') }}",
                    dataType: "json",
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function () {	
                    },
                });
            });

        });
    </script>

</body>

</html>