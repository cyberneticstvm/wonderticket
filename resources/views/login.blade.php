<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#2196f3">
	<meta name="author" content="Cybernetics" /> 
    <meta name="keywords" content="" /> 
    <meta name="robots" content="" /> 
	<meta name="description" content="Wonder Ticket"/>
	<meta property="og:title" content="Wonder Ticket" />
	<meta property="og:description" content="Wonder Ticket" />
	<meta name="format-detection" content="telephone=no">
    
    <!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/assets/ticket.png') }}" />
    
    <!-- Title -->
	<title>Wonder Ticket</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/assets/css/style.css') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap" rel="stylesheet">

</head>   
<body class="theme-dark" data-theme-color="color-lime">
<div class="page-wraper">

    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->

    <!-- Page Content -->
    <div class="page-content">
        
        <!-- Banner -->
        <div class="banner-wrapper">
            <div class="circle-1"></div>
            <div class="container inner-wrapper">
                <h1 class="dz-title">WT</h1>
            </div>
        </div>
        <!-- Banner End -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <h3 class="title mb-5 text-center">Welcome back</h3>
                    <div class="text-center">@include("message")</div>
					<form method="post" action="{{ route('user.login') }}">
                        @csrf
                        <input type="hidden" name="status" value="1" />
                        <input type="hidden" name="type" value="user" />
						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                            @error('username')
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                            @enderror
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control dz-password" name="password" placeholder="Password">
							<span class="input-group-text show-pass"> 
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
                            @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
						</div>
						<div class="input-group">
							<button type="submit" class="btn mt-2 btn-submit btn-primary w-100 btn-rounded">SIGN IN</button>
						</div>
						<div class="d-flex justify-content-between align-items-center">
						</div>
					</form>  
                    <div class="text-center mb-auto p-tb20">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->    
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('/frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/frontend/assets/js/settings.js') }}"></script>
<script src="{{ asset('/frontend/assets/js/custom.js') }}"></script>
<script>
    $(function(){
        $('form').submit(function(){
            $(".btn-submit").attr("disabled", true);
            $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
        });
    });
    setTimeout(function () {
        $(".alert").hide('slow');
    }, 5000);
</script>
</body>
</html>