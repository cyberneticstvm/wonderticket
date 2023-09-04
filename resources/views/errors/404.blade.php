<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Error 4048</h2>
            <p class="">Hello {{ Auth::user()->name }}, something went wrong!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <h5 class="text-danger">{{ $exception->getMessage() }}</h5>
            </div>
        </div>
    </div>
</section>
