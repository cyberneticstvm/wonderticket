@extends("admin.base")
@section("content")
<!-- Body: Header -->
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="index.html">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Winners</li>
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
                <div class="card-body p-4">
                    <form action="{{ route('report.winner.fetch') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-sm-3">
                                <label class="form-label req">From Date</label>
                                {{ html()->date($name = 'from_date', $value = ($inputs && $inputs[0]) ? $inputs[0] : old('from_date'))->class('form-control form-control-md') }}
                                @error('from_date')
                                    <small class="text-danger">{{ $errors->first('from_date') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">To Date</label>
                                {{ html()->date($name = 'to_date', $value = ($inputs && $inputs[1]) ? $inputs[1] : old('to_date'))->class('form-control form-control-md') }}
                                @error('to_date')
                                    <small class="text-danger">{{ $errors->first('to_date') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label">Play</label>
                                {{ html()->select($name = 'play_id', $options = plays()->where('status', 1)->pluck('name', 'id'), $value = ($inputs && $inputs[2]) ? $inputs[2] : old('play_id'))->class('form-control select2')->placeholder('Select') }}
                            </div>
                            <div class="col-sm-12 text-end">
                                <button type="button" onClick="history.back()"  class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary btn-submit">Fetch</button>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-2">                
                <div class="card-body p-4 table-responsive">
                    <h5 class="text-primary mb-3">Winners Report</h5>
                    <table id="dataTbl" class="table table-striped table-hover align-middle table-sm">
                        <thead><tr><th>SL No</th><th>Play</th><th>Winner</th><th>Date</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($winners as $key => $winner)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $winner->play->name }}</td>
                                <td>{{ $winner->positions->pluck('value')->implode(',') }}</td>
                                <td>{{ $winner->date->format('d-M-Y') }}</td>
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