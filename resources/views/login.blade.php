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
<body class="bg-white">
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
                <h1 class="dz-title">Wonder Ticket</h1>
            </div>
        </div>
        <!-- Banner End -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <h3 class="title">Welcome back</h3>
					<form>
						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-frontend"></i></span>
							<input type="text" class="form-control" placeholder="frontendname">
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control dz-password" placeholder="Password">
							<span class="input-group-text show-pass"> 
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
						</div>
						<div class="input-group">
							<a href="index.html" class="btn mt-2 btn-primary w-100 btn-rounded">SIGN IN</a>
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
</body>
</html>