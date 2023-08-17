@extends("base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <h5 class="text-center">Order</h5>
            <div class="text-center">@include("message")</div>
            <form method="post" action="{{ route('user.save.numbers') }}">
                @csrf
                <div class="row numPanel">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Play</label>
                            <!--{{ html()->select($name = 'play', plays()->where('status', 1)->pluck('name', 'id'), $value = old('play'))->class('form-control form-control-md')->placeholder('Select') }}-->
                            <select name="play_category" class="form-control form-control-md" required>
                                <option value="">Select</option>
                                @forelse(plays()->where('status', 1) as $key => $play)
                                    @php $from_time = plays()->where('id', $play->id)->first()->entry_locked_from; $to_time = plays()->where('id', $play->id)->first()->entry_locked_to; @endphp
                                    <option value="{{ $play->id }}" {{ (Carbon\Carbon::now()->between($from_time, $to_time)) ? 'disabled' : '' }}>{{ $play->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">A</label>
                            {{ html()->radio($name = 'option', $checked = false, $value = '1')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">B</label>
                            {{ html()->radio($name = 'option', $checked = false, $value = '2')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">C</label>
                            {{ html()->radio($name = 'option', $checked = false, $value = '3')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label class="form-label">Number</label>
                            {{ html()->number($name = 'numbers[]', NULL, $min="100", $max="999", $step="1")->class('form-control form-control-md')->placeholder('Number')->required() }}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label class="form-label">Count</label>
                            {{ html()->number($name = 'counts[]', NULL, $min="1", $max="99", $step="1")->class('form-control form-control-md')->placeholder('Count')->required() }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-warning btn-md w-100" onclick="javascript:addNumPanel()">Add</button>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-block btn-submit btn-primary lift text-uppercase">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Page Content End-->
<script>
    function addNumPanel(){
        $(".numPanel").after("<div class='row'><div class='col-5 mb-2'><input type='number' name='numbers[]' id='numbers[]' class='form-control form-control-md' placeholder='Number' min='100' max='999' step='1' required /></div><div class='col-5 mb-2'><input type='number' name='counts[]' class='form-control form-control-md' placeholder='Count' min='1' max='99' step='1' required /></div><div class='col-1'><a href='javascript:void(0)' class='dlt'>X</a></div></div>");
    }
</script>
@endsection