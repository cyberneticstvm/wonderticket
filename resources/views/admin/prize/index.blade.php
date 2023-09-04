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
                        <li class="breadcrumb-item active" aria-current="page">Prize List</li>
                    </ol>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>

<!-- Body: Body -->
<div class="body px-xl-4 px-md-2">
    <div class="container-fluid">        
        <div class="row g-3 clearfix">
            <div class="card mb-2">
                <div class="card-body p-4 table-responsive">
                    <!--<p class= "text-end my-3"><a href="/admin/prize/create/"><i class="fa fa-plus fa-lg text-success fw-bold"></i></a></p>-->
                    <table id="dataTbl" class="table table-striped table-hover align-middle table-sm">
                        <thead><tr><th>SL No</th><th>Position</th><th>Prize Count</th><th>Amount</th><th>Super</th><th>Status</th><!--<th>Edit</th>--></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse(prizes() as $key => $prize)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $prize->position }}</td>
                                <td>{{ $prize->prize_count }}</td>
                                <td>{{ $prize->amount }}</td>
                                <td>{{ $prize->super }}</td>
                                <td>{!! ($prize->status == 1) ? 'Active' : '<span class="text-danger">Inactive</span>' !!}</td>
                                <!--<td class="text-center"><a href="/admin/prize/edit/{{encrypt($prize->id)}}"><i class="fa fa-pencil text-warning"></i></a></td>-->
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
</div>
@endsection