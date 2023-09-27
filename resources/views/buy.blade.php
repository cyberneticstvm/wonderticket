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
                        <div class="mb-3">
                            <label class="form-label">Play</label>
                            <!--{{ html()->select($name = 'play', plays()->where('status', 1)->pluck('name', 'id'), $value = old('play'))->class('form-control form-control-md')->placeholder('Select') }}-->
                            <select name="play_category" class="selPlay form-control form-control-md" required>
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
                    <div class="col-3"></div>
                    <div class="col-2">
                        <div class="mb-2 text-center radio square-radio">
                            <label class="radio-label">A
                                {{ html()->radio($name = 'option', $checked = false, $value = '1')->class('radOption') }}
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-2 text-center radio square-radio">
                            <label class="radio-label">B
                                {{ html()->radio($name = 'option', $checked = false, $value = '2')->class('radOption') }}
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-2 text-center radio square-radio">
                            <label class="radio-label">C
                                {{ html()->radio($name = 'option', $checked = true, $value = '3')->class('radOption') }}
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Option</label>
                            <select class="form-control sel" name="selected_option" required>

                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label class="form-label">Number</label>
                            {{ html()->text($name = 'numbers[]', NULL)->class('form-control form-control-md nums')->placeholder('Number')->required() }}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label class="form-label">Count</label>
                            {{ html()->text($name = 'counts[]', NULL)->class('form-control form-control-md counts')->maxlength(3)->placeholder('Count')->required() }}
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
<!-- PWA Offcanvas -->
<div class="offcanvas offcanvas-top pwa-offcanvas">
    <div class="container">
        <div class="offcanvas-body small">
            <div class="row g-2">
                @forelse(plays()->where('status', 1) as $key => $play)
                @php $from_time = plays()->where('id', $play->id)->first()->entry_locked_from; $to_time = plays()->where('id', $play->id)->first()->entry_locked_to; @endphp
                    @if((Carbon\Carbon::now()->between($from_time, $to_time)))

                    @else
                    <div class="col-12">
                        <button type="button" class="btnPlay btn {{ $play->class }} btn-lg w-100" data-playid="{{ $play->id }}" >{{ $play->name }}</button>
                    </div>
                    @endif
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-backdrop pwa-backdrop"></div>
<!-- PWA Offcanvas End -->
<!-- Page Content End-->
@endsection