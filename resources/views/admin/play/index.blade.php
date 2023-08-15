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
                        <li class="breadcrumb-item active" aria-current="page">Play List</li>
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
                    <p class= "text-end my-3"><a href="/admin/play/create/"><i class="fa fa-plus fa-lg text-success fw-bold"></i></a></p>
                    <table id="dataTbl" class="table table-striped table-hover align-middle table-sm">
                        <thead><tr><th>SL No</th><th>Name</th><th>Locked_From</th><th>Locked To</th><th>Status</th><th>Edit</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse(plays() as $key => $play)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $play->name }}</td>
                                <td>{{ ($play->entry_locked_from) ? $play->entry_locked_from->format('h:i a') : '' }}</td>
                                <td>{{ ($play->entry_locked_to) ? $play->entry_locked_to->format('h:i a') : '' }}</td>
                                <td>{!! ($play->status == 1) ? 'Active' : '<span class="text-danger">Inactive</span>' !!}</td>
                                <td class="text-center"><a href="/admin/play/edit/{{encrypt($play->id)}}"><i class="fa fa-pencil text-warning"></i></a></td>
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