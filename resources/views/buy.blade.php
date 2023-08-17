@extends("base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <form method="post" action="{{ route('user.save.numbers') }}">
                <div class="row numPanel">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Play</label>
                            {{ html()->select($name = 'play', plays()->pluck('name', 'id'), $value = old('play'))->class('form-control form-control-md')->placeholder('Select') }}
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">A</label>
                            {{ html()->radio($name = 'rad', $value = 'A')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">B</label>
                            {{ html()->radio($name = 'rad', $value = 'B')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2 text-center">
                            <label class="form-label">C</label>
                            {{ html()->radio($name = 'rad', $value = 'C')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">Number</label>
                            {{ html()->number($name = 'numbers[]', $value = old('number'))->class('form-control form-control-md')->placeholder('Number') }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">Count</label>
                            {{ html()->number($name = 'counts[]', $value = old('count'))->class('form-control form-control-md')->placeholder('Count') }}
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
        $(".numPanel").append("<div class='col-6 mb-2'><input type='number' name='numbers[]' id='numbers[]' class='form-control form-control-md' placeholder='Number' required /></div><div class='col-5 mb-2'><input type='number' name='counts[]' class='form-control form-control-md' placeholder='Count' required /></div><div class='col-1'>X</div>");
    }
</script>
@endsection