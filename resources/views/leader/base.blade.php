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
	<title>WT</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/assets/css/custom.css') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap" rel="stylesheet">

</head>   
<body class="theme-dark" data-theme-color="color-lime">
<div class="page-wraper">

    <!-- Header -->
	<header class="header transparent">
		<div class="main-bar">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"/></svg>
						</a>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
                        <a href="javascript:void(0);" class="theme-color" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000">
								<path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
							</svg>
                        </a>
                        <a href="javascript:void(0);" class="theme-btn">
                            <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><g><path d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/></g></g></g>
							</svg>
							<svg class="light" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/></svg>
                        </a>
					</div>
				</div>
			</div>
		</div>
	</header>
    <!-- Header End -->
    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->

    <!-- Sidebar -->
    <div class="sidebar">
		<div class="author-box">
			<div class="dz-media">
				<img src="{{ asset('/frontend/assets/images/message/pic5.jpg') }}" alt="author-image">
			</div>
			<div class="dz-info">
				<span>Hi</span>
				<h5 class="name">{{ Auth::user()->name }}</h5>
			</div>
		</div>
		<ul class="nav navbar-nav">	
			<li class="nav-label">Main Menu</li>
			<li><a class="nav-link" href="/leader/dash">
				<span class="dz-icon">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
						<path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/>
					</svg>
				</span>
				<span>Home</span>
			</a></li>
			<li><a class="nav-link" href="/leader/profile">
				<span class="dz-icon">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z"/></svg>
				</span>
				<span>Profile</span>
			</a></li>
			<li><a class="nav-link" href="{{ route('leader.logout') }}">
				<span class="dz-icon">
					<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><path d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/><path d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/></g></g></svg>
				</span>
				<span>Logout</span>
			</a></li>
            <li class="nav-label">Settings</li>
            <li class="nav-color" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                <a href="javascript:void(0);" class="nav-link">
                    <span class="dz-icon">                        
                        <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000">
							<path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
						</svg>
                    </span>					
                    <span>Highlights</span>					
                </a>
            </li>
            <li>
                <div class="mode">
                    <span class="dz-icon">
                        <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><g><path d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/></g></g></g>
						</svg>
                    </span>					
                    <span class="text-dark">Dark Mode</span>
                    <div class="custom-switch">
                        <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                        <label class="custom-switch-label" for="toggle-dark-menu"></label>
                    </div>
                </div>
            </li>
		</ul>
		<div class="sidebar-bottom">
			<h6 class="name">WT</h6>
			<p>App Version 1.0</p>
        </div>
    </div>
    <!-- Sidebar End -->

    <!-- Banner -->
    <div class="author-notification">
        <div class="container inner-wrapper">
            <div class="dz-info">
                <span class="text-dark">Hi,</span>
                <h3 class="name mb-0">{{ Auth::user()->name }} 👋</h3>
            </div>	
        </div>
    </div>
    <!-- Banner End -->

    @yield("content")
    <!-- Menubar -->
	<div class="menubar-area">
		<div class="toolbar-inner menubar-nav">			
            <a href="/leader/reports" class="nav-link {{ (request()->segment(2) == 'reports') ? 'active' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#bfc9da" xmlns:v="https://vecta.io/nano"><path d="M17.5.625h-15a2.25 2.25 0 0 0-2.25 2.25v14.25a2.25 2.25 0 0 0 2.25 2.25h15a2.25 2.25 0 0 0 2.25-2.25V2.875A2.25 2.25 0 0 0 17.5.625zM4.056 8.414a.75.75 0 0 1 .165-.817l2.25-2.25a.75.75 0 0 1 1.018.039.75.75 0 0 1 .039 1.018l-.967.971h8.314a.75.75 0 0 1 .75.75.75.75 0 0 1-.75.75H4.75a.75.75 0 0 1-.694-.461zm12.097 4.365l-2.25 2.25a.75.75 0 0 1-.243.187c-.093.045-.194.07-.298.074a.75.75 0 0 1-.559-.219.75.75 0 0 1-.219-.559c.004-.103.029-.205.074-.298a.75.75 0 0 1 .187-.243l.967-.971H5.5a.75.75 0 0 1-.75-.75.75.75 0 0 1 .75-.75h10.125a.75.75 0 0 1 .694.461.75.75 0 0 1-.165.817z" fill="#bfc9da"/></svg>
			</a>
            <a href="/leader/misc" class="nav-link {{ (request()->segment(2) == 'misc') ? 'active' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bfc9da" xmlns:v="https://vecta.io/nano"><path d="M12 1a7.5 7.5 0 0 0-7.5 7.5v5.85l-1.66 2.5A2.04 2.04 0 0 0 4.535 20h14.93a2.04 2.04 0 0 0 1.695-3.165L19.5 14.35V8.5A7.5 7.5 0 0 0 12 1zm0 22a3 3 0 0 0 2.825-2h-5.65A3 3 0 0 0 12 23z"/></svg>
			</a>
            <a href="/leader/dash" class="nav-link {{ (request()->segment(2) == 'dash') ? 'active' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" xmlns:v="https://vecta.io/nano"><path d="M21.44 11.035a.75.75 0 0 1-.69.465H18.5V19a2.25 2.25 0 0 1-2.25 2.25h-3a.75.75 0 0 1-.75-.75V16a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75v4.5a.75.75 0 0 1-.75.75h-3A2.25 2.25 0 0 1 3.5 19v-7.5H1.25a.75.75 0 0 1-.69-.465.75.75 0 0 1 .158-.818l9.75-9.75A.75.75 0 0 1 11 .246a.75.75 0 0 1 .533.222l9.75 9.75a.75.75 0 0 1 .158.818z" fill="#bfc9da"/></svg>
			</a>
            <a href="/leader/user/create" class="nav-link {{ (request()->segment(2) == 'user') ? 'active' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bfc9da" xmlns:v="https://vecta.io/nano"><path d="M15 15.75a.75.75 0 1 0 0-1.5.75.75 0 1 0 0 1.5zm-6-6a.75.75 0 1 0 0-1.5.75.75 0 1 0 0 1.5zm13.5 0a.75.75 0 0 0 .75-.75V4.5a.75.75 0 0 0-.75-.75h-21a.75.75 0 0 0-.75.75V9a.75.75 0 0 0 .75.75c1.241 0 2.25 1.009 2.25 2.25s-1.01 2.25-2.25 2.25a.75.75 0 0 0-.75.75v4.5a.75.75 0 0 0 .75.75h21a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75c-1.241 0-2.25-1.009-2.25-2.25s1.009-2.25 2.25-2.25zM6.75 9c0-1.24 1.01-2.25 2.25-2.25S11.25 7.76 11.25 9 10.241 11.25 9 11.25 6.75 10.241 6.75 9zM9 15.75a.75.75 0 0 1-.53-1.28l6-6a.75.75 0 0 1 1.06 1.06l-6 6a.75.75 0 0 1-.53.22zm6 1.5c-1.241 0-2.25-1.009-2.25-2.25s1.009-2.25 2.25-2.25 2.25 1.009 2.25 2.25-1.009 2.25-2.25 2.25z"/></svg>
			</a>			
			<a href="/leader/profile" class="nav-link {{ (request()->segment(2) == 'profile') ? 'active' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" fill="#bfc9da" xmlns:v="https://vecta.io/nano"><path d="M8 7.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 1 0 0 7.5zm7.5 9v1.5c-.002.199-.079.39-.217.532C13.61 20.455 8.57 20.5 8 20.5s-5.61-.045-7.282-1.718C.579 18.64.501 18.449.5 18.25v-1.5a7.5 7.5 0 1 1 15 0z"/></svg>
			</a>
		</div>
	</div>
	<!-- Menubar -->
	
    <!-- Theme Color Settings -->
	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom">
        <div class="offcanvas-body small">
            <ul class="theme-color-settings">
                <li>
                    <input class="filled-in" id="primary_color_8" name="theme_color" type="radio" value="color-primary" />
					<label for="primary_color_8"></label>
                    <span>Default</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_2" name="theme_color" type="radio" value="color-green" />
					<label for="primary_color_2"></label>
                    <span>Green</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_3" name="theme_color" type="radio" value="color-blue" />
					<label for="primary_color_3"></label>
                    <span>Blue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_4" name="theme_color" type="radio" value="color-pink" />
					<label for="primary_color_4"></label>
                    <span>Pink</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_5" name="theme_color" type="radio" value="color-yellow" />
					<label for="primary_color_5"></label>
                    <span>Yellow</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_6" name="theme_color" type="radio" value="color-orange" />
					<label for="primary_color_6"></label>
                    <span>Orange</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_7" name="theme_color" type="radio" value="color-purple" />
					<label for="primary_color_7"></label>
                    <span>Purple</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_1" name="theme_color" type="radio" value="color-red" />
					<label for="primary_color_1"></label>
                    <span>Red</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_9" name="theme_color" type="radio" value="color-lightblue" />
					<label for="primary_color_9"></label>
                    <span>Lightblue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_10" name="theme_color" type="radio" value="color-teal" />
					<label for="primary_color_10"></label>
                    <span>Teal</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_11" name="theme_color" type="radio" value="color-lime" />
					<label for="primary_color_11"></label>
                    <span>Lime</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_12" name="theme_color" type="radio" value="color-deeporange" />
					<label for="primary_color_12"></label>
                    <span>Deeporange</span>
                </li>
            </ul>
        </div>
    </div>
	<!-- Theme Color Settings End -->    
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('/frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/frontend/assets/js/settings.js') }}"></script>
<script src="{{ asset('/frontend/assets/js/custom.js') }}"></script>
<script src="{{ asset('/frontend/assets/js/script.js') }}"></script>
</body>
</html>