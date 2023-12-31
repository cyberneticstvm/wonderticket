<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wonder Ticket">
    <meta name="keyword" content="Wonder Ticket">
    <title>Wonder Ticket</title>
    <link rel="icon" href="{{ asset('/backend/assets/ticket.png') }}" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/al.style.min.css') }}">
    <!-- project layout css file -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/layout.p.min.css') }}">
    <style>
        .alert-danger{
            background: transparent;
            color: red;
            border: 1px solid red;
            border-radius: 0;
        }
        .alert-success{
            background: transparent;
            color: green;
            border: 1px solid green;
            border-radius: 0;
        }
    </style>
</head>

<body>

<div id="layout-p" class="theme-red">

    <!-- main body area -->
    <div class="main auth-div p-2 py-3 p-xl-5">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-fluid">

                <div class="row g-0">

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-4 p-md-5 card border-0" style="max-width: 32rem;">
                            <!-- Form -->
                            @include('message')
                            <form class="row g-1 p-0 p-md-4" method="post" action="{{ route('admin.login') }}">
                                @csrf
                                <input type="hidden" name="status" value="1" />
                                <input type="hidden" name="type" value="admin" />
                                <div class="col-12 text-center mb-5">
                                    <h1>Sign in</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control form-control-md" placeholder="Username">
                                    </div>
                                    @error('username')
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-md" placeholder="***************">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-block btn-submit btn-primary lift text-uppercase">SIGN IN</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ asset('/backend/assets/bundles/libscripts.bundle.js') }}"></script>
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