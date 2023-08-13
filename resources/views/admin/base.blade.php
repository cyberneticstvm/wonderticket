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

    <link rel="stylesheet" href="{{ asset('/backend/assets/css/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/select2.min.css') }}"> 
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/al.style.min.css') }}">
    <!-- project layout css file -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/layout.p.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/style.css') }}">
</head>

<body>

<div id="layout-p" class="theme-red">

    <!-- Navigation -->
    <div class="header fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-light px-md-2">
                
                <!-- Brand -->
                <a href="/admin/dash" class="brand-icon d-flex align-items-center me-2 me-lg-4">
                    <!--<img src="{{ asset('/backend/assets/ticket.png') }}" width="5%" />-->
                    <span class="fs-5 text-primary fw-bold d-none d-md-block">WT</span>
                </a>

                <!-- header rightbar icon -->
                <div class="h-right justify-content-end d-flex align-items-center">
                    <a class="nav-link text-primary p-1 me-lg-3 me-2" href="#" title="Settings" data-bs-toggle="modal" data-bs-target="#SettingsModal"><i class="fa fa-gear"></i></a>
                    <div class="dropdown user-profile ms-2">
                        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown">
                            <img class="avatar rounded-circle p-1" src="{{ asset('/backend/assets/images/profile_av.png') }}" alt="">
                        </a>
                        <div class="dropdown-menu rounded-lg shadow border-0 dropdown-menu-end">
                            <div class="card border-0 w240">
                                <div class="card-body border-bottom">
                                    <div class="d-flex py-1">
                                        <img class="avatar rounded-circle" src="{{ asset('/backend/assets/images/profile_av.png') }}" alt="">
                                        <div class="flex-fill ms-3">
                                            <p class="mb-0 text-muted"><span class="fw-bold">{{ Auth::user()->name }}</span></p>
                                            <small class="text-muted">{{ ucfirst(Auth::user()->type) }}</small>
                                            <div>
                                                <a href="{{ route('admin.logout') }}" class="card-link">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary d-none menu-toggle ms-3" type="button"><i class="fa fa-bars"></i></button>
                </div>

            </nav>
        </div>
    </div>

    <!-- sidebar tab menu -->
    <div class="sidebar px-3 py-1">
        <div class="d-flex flex-column h-100">
            <h5 class="sidebar-title mb-4 mt-2">WT<span> - Wonder Ticket</span></h5>

            <!-- Menu: main ul -->
            <ul class="menu-list flex-grow-1">
                <li><a class="m-link active" href="/admin/dash"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a class="m-link" href="/admin/users"><i class="fa fa-user"></i> <span>User Management</span></a></li>
                <li><a class="m-link" href="/admin/winner"><i class="fa fa-gift"></i> <span>Winner</span></a></li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-report" href="#"><i class="fa fa-file"></i> <span>Reports</span> <span class="arrow fa fa-angle-right ms-auto text-end"></span></a>

                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="menu-report">
                        <li><a class="ms-link" href="#">Winner Report</a></li>
                        <li><a class="ms-link" href="#">Sales Report</a></li>
                    </ul>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-setting" href="#"><i class="fa fa-gear"></i> <span>Settings</span> <span class="arrow fa fa-angle-right ms-auto text-end"></span></a>

                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="menu-setting">
                        <li><a class="ms-link" href="#">Login Lock</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Menu: menu collepce btn -->
            <button type="button" class="btn btn-link text-primary sidebar-mini-btn">
                <span><i class="fa fa-arrow-left"></i></span>
            </button>
        </div>
    </div>

    <!-- main body area -->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include("message")
                </div>
            </div>
        </div>
        @yield("content")
        <!-- Body: Footer -->
        <div class="body-footer px-xl-4 px-md-2">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <p class="font-size-sm mb-0">© Wonder ticket. <span class="d-none d-sm-inline-block"><script>document.write(/\d{4}/.exec(Date())[0])</script></span></p>
                            </div>
                            <div class="col text-end"><a href="https://cybernetics.me" target="_blank">Cybernetics Tech.</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Setting -->
    <div class="modal fade" id="SettingsModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">AL-UI Setting</h5>
                    </div>
                    <div class="modal-body custom_scroll">
                    <!-- Settings: Font -->
                    <div class="setting-font">
                        <small class="card-title text-muted">Google font Settings</small>
                        <ul class="list-group font_setting mb-3 mt-1">
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-opensans" value="font-opensans" checked="">
                                    <label class="form-check-label" for="font-opensans">
                                        Open Sans Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-quicksand" value="font-quicksand">
                                    <label class="form-check-label" for="font-quicksand">
                                        Quicksand Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-nunito" value="font-nunito">
                                    <label class="form-check-label" for="font-nunito">
                                        Nunito Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-Raleway" value="font-raleway">
                                    <label class="form-check-label" for="font-Raleway">
                                        Raleway Google Font
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Settings: Color -->
                    <div class="setting-theme">
                        <small class="card-title text-muted">Theme Color Settings</small>
                        <ul class="list-unstyled d-flex justify-content-between choose-skin mb-2 mt-1">
                            <li data-theme="indigo"><div class="indigo"></div></li>
                            <li data-theme="blue"><div class="blue"></div></li>
                            <li data-theme="cyan"><div class="cyan"></div></li>
                            <li data-theme="green"><div class="green"></div></li>
                            <li data-theme="orange"><div class="orange"></div></li>
                            <li data-theme="blush"><div class="blush"></div></li>
                            <li data-theme="red" class="active"><div class="red"></div></li>
                            <li data-theme="dynamic"><div class="dynamic"><i class="fa fa-paint-brush"></i></div></li>
                        </ul>
                    </div>
                    <!-- Settings: Light/dark -->
                    <div class="setting-mode">
                        <small class="card-title text-muted">RTL Layout</small>
                        <ul class="list-group list-unstyled mb-0 mt-1">
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-switch">
                                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-high-contrast mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                    <label class="form-check-label" for="theme-high-contrast">Enable High Contrast</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-rtl mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-rtl">
                                    <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start text-center">
                    <button type="button" class="btn flex-fill btn-primary lift" data-bs-dismiss="modal">Save Changes</button>
                    <button type="button" class="btn flex-fill btn-white border lift" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ asset('/backend/assets/bundles/libscripts.bundle.js') }}"></script>
<!-- Jquery Page Js -->
<script src="{{ asset('/backend/assets/js/template.js') }}"></script>
<script src="{{ asset('/backend/assets/bundles/select2.bundle.js') }}"></script>
<script src="{{ asset('/backend/assets/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('/backend/assets/js/script.js') }}"></script>
</body>
</html>