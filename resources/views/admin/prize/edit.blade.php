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
                        <li class="breadcrumb-item active" aria-current="page">Update Prize</li>
                    </ol>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>

<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">        
        <div class="row g-3 clearfix">
            <div class="card mb-2">
                <div class="card-body p-4">
                    <form action="{{ route('prize.update', $prize->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="row g-4">
                            <div class="col-sm-2">
                                <label class="form-label req">Position</label>
                                {{ html()->number($name = 'position', $value = $prize->position)->class('form-control form-control-md')->placeholder(0) }}
                                @error('position')
                                <small class="text-danger">{{ $errors->first('position') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label req">Prize Count</label>
                                {{ html()->number($name = 'prize_count', $value = $prize->prize_count)->class('form-control form-control-md')->placeholder(0) }}
                                @error('prize_count')
                                <small class="text-danger">{{ $errors->first('prize_count') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label req">Amount</label>
                                {{ html()->number($name = 'amount', $value = $prize->amount)->class('form-control form-control-md')->placeholder('0.00') }}
                                @error('amount')
                                <small class="text-danger">{{ $errors->first('amount') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label req">Super</label>
                                {{ html()->number($name = 'super', $value = $prize->super)->class('form-control form-control-md')->placeholder(0) }}
                                @error('super')
                                <small class="text-danger">{{ $errors->first('super') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Status</label>
                                <select name="status" class="form-control show-tick select2">
                                    <option value="">Select</option>
                                    <option value="1" {{ ($prize->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($prize->status == 0) ? 'selected' : '' }}>Inactive</option>                                    
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12 text-end">
                                <button type="button" onClick="history.back()"  class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary btn-submit">Update</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
</div>
@endsection