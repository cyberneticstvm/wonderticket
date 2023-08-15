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
                        <li class="breadcrumb-item active" aria-current="page">Update Play</li>
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
                    <form action="{{ route('play.update', $play->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="row g-4">
                            <div class="col-sm-3">
                                <label class="form-label req">Play Name</label>
                                <input type="text" value="{{ $play->name }}" name="name" class="form-control form-control-md" placeholder="Play Name">
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label req">Entry Locked From</label>
                                {{ html()->time($name = 'entry_locked_from', $value = $play->entry_locked_from)->class('form-control form-control-md') }}
                                @error('entry_locked_from')
                                    <small class="text-danger">{{ $errors->first('entry_locked_from') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label req">Entry Locked To</label>
                                {{ html()->time($name = 'entry_locked_to', $value = $play->entry_locked_to)->class('form-control form-control-md') }}
                                @error('entry_locked_to')
                                    <small class="text-danger">{{ $errors->first('entry_locked_to') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Status</label>
                                <select name="status" class="form-control show-tick select2">
                                    <option value="">Select</option>
                                    <option value="1" {{ ($play->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($play->status == 0) ? 'selected' : '' }}>Inactive</option>                                    
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