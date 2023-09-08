@extends("base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container">
            <h5 class="text-center">Reports</h5>
            <div class="text-center">@include("message")</div>
            <form method="post" action="{{ route('user.reports.fetch') }}">
                @csrf
                <div class="row">                  
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">From Date</label>
                            {{ html()->date($name = 'from_date', $value = ($inputs && $inputs[0]) ? $inputs[0] : date('Y-m-d'))->class('form-control form-control-md')->required() }}
                        </div>
                        @error('from_date')
                            <small class="text-danger">{{ $errors->first('from_date') }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">To Date</label>
                            {{ html()->date($name = 'to_date', $value = ($inputs && $inputs[1]) ? $inputs[1] : date('Y-m-d'))->class('form-control form-control-md')->required() }}
                        </div>
                        @error('to_date')
                            <small class="text-danger">{{ $errors->first('to_date') }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Play</label>
                            {{ html()->select($name = 'play', $value=plays()->where('status', 1)->pluck('name', 'id'), ($inputs && $inputs[2]) ? $inputs[2] : old('play'))->class('form-control form-control-md')->placeholder('Select') }}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Report Type</label>
                            {{ html()->select($name = 'type', $value=array('1'=>'Sales Report', '2' => 'Winner Report', '3' => 'Net Pay Report'), ($inputs && $inputs[3]) ? $inputs[3] : old('type'))->class('form-control form-control-md')->placeholder('Select')->required() }}
                        </div>
                        @error('type')
                            <small class="text-danger">{{ $errors->first('type') }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-block btn-submit btn-primary lift text-uppercase">FETCH</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive">
                    @if($inputs && $inputs[3] == 1)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Option</th><th>Ticket Count</th></tr></thead><tbody>
                            @forelse($data as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->created_at->format('d/M/Y') }}</td>
                                <td>{{ $item->play->name }}</td>
                                <td>{{ options()->find($item->numbers()->first()->option_id)->name }}</td>
                                <td>{{ $item->numbers()->sum('number_count') }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                    @if($inputs && $inputs[3] == 2)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Winners</th></tr></thead><tbody>
                            @forelse($data as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->created_at->format('d/M/Y') }}</td>
                                <td>{{ $item->play->name }}</td>
                                <td>{!! getWinner($item->numbers()->pluck('id'), $item->id, $item->created_at) !!}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                    @if($inputs && $inputs[3] == 3)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>option</th><th>Count</th><th>Buy</th><th>Won</th><th>Profit</th></tr></thead><tbody>
                            @forelse($data as $key => $item)
                            @php($sell = calculateCost($item->created_at, $item->play->play->id, $item->number, $item->number_count, $item->option_id))
                            @php($buy = $item->getOption->user_cost*$item->number_count)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->created_at->format('d/m/y') }}</td>                                
                                <td>{{ $item->play->play->name }}</td>                                
                                <td>{{ $item->getOption->name }}</td>
                                <td>{{ $item->number_count }}</td>                                
                                <td>₹{{ number_format($buy, 0) }}</td>                                
                                <td>₹{{ number_format($sell, 0) }}</td>                                
                                <td>₹{{ number_format($buy-$sell) }}</td>                                
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection