@extends("admin.base")
@section("content")
<!-- Body: Header -->
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>

<!-- Body: Body -->
<div class="body px-xl-4 px-md-2">
    <div class="container-fluid">
        
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <div class="row clearfix row-deck">
                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-body">
                                <span class="text-uppercase">New Users</span>
                                <h4 class="mb-0 mt-2">{{ dashboardData()->first()->new_users_count }}</h4>
                                <small class="text-muted">Analytics for current month</small>
                            </div>
                            <div id="apexspark1"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-body">
                                <span class="text-uppercase">Total Numbers</span>
                                <h4 class="mb-0 mt-2">1,070</h4>
                                <small class="text-muted">Analytics for current month</small>
                            </div>
                            <div id="apexspark2"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-body">
                                <span class="text-uppercase">Winners</span>
                                <h4 class="mb-0 mt-2">10K</h4>
                                <small class="text-muted">Analytics for current month</small>
                            </div>
                            <div id="apexspark3"></div>
                        </div>
                    </div>
                </div> <!-- .row end -->
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="row row-deck">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-body">
                                <span class="text-uppercase">Earnings</span>
                                <h4 class="mb-0 mt-2">₹1,22,500</h4>
                                <small class="text-muted">Analytics for current month</small>
                            </div>
                            <div id="apexspark4"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-header py-3 bg-transparent border-0">
                                <h6 class="card-title mb-0">Payments</h6>
                                <small class="text-muted">Payment Analytics.</small>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="p-2 flex-fill">
                                        <span class="text-muted">Today</span>
                                        <h5>1.08K</h5>
                                        <small class="text-success"><i class="fa fa-angle-up"></i>
                                            0.00%</small>
                                    </div>
                                    <div class="p-2 flex-fill">
                                        <span class="text-muted">Current Week</span>
                                        <h5>3.20K</h5>
                                        <small class="text-danger"><i class="fa fa-angle-down"></i>
                                            0.00%</small>
                                    </div>
                                    <div class="p-2 flex-fill">
                                        <span class="text-muted">Current Month</span>
                                        <h5>8.18K</h5>
                                        <small class="text-success"><i class="fa fa-angle-up"></i>
                                            0.00%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="apexcharts-line-0" id="apexspark5"></div>
                            </div>
                        </div> <!-- .card end -->
                    </div>
                </div> <!-- .row end -->
            </div>
        </div> <!-- .row end -->

    </div>
</div>


@endsection