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
                        <li class="breadcrumb-item active" aria-current="page">Update Winner</li>
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
                    <form action="{{ route('winner.save') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-sm-9">
                                <label class="form-label req">Play</label>
                                {{ html()->select($name = 'play', $options = plays()->pluck('name', 'id'), $value = old('play'))->class('form-control select2')->placeholder('Select') }}
                                @error('play')
                                    <small class="text-danger">{{ $errors->first('play') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Play Date</label>
                                {{ html()->date($name = 'name', $value = date('Y-m-d'))->class('form-control form-control-md') }}
                                @error('play_date')
                                <small class="text-danger">{{ $errors->first('play_date') }}</small>
                                @enderror
                            </div>
                            @forelse(prizes() as $key1 => $prize)                            
                            <div class="col-sm-2">
                                <label class="form-label req">Position {{ $prize->position }}</label>
                                <input type="text" name="position[]" maxlength="3" class="form-control form-control-md" placeholder="xxx" required>
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            @empty
                            @endforelse
                            <div class="col-sm-12 text-end">
                                <button type="button" onClick="history.back()"  class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary btn-submit">Save</button>
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