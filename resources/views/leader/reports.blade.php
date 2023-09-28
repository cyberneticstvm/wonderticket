@extends("leader.base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container">
            <h5 class="text-center">Reports</h5>
            <div class="text-center">@include("message")</div>
            <form method="post" action="{{ route('leader.reports.fetch') }}">
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
                            {{ html()->select($name = 'type', $value=array('1'=>'Sales Report', '2' => 'Winner Report', '3' => 'Net Pay Report', '4' => 'Number Wise Sales Report'), ($inputs && $inputs[3]) ? $inputs[3] : old('type'))->class('form-control form-control-md')->placeholder('Select')->required() }}
                        </div>
                        @error('type')
                            <small class="text-danger">{{ $errors->first('type') }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">User</label>
                            {{ html()->select($name = 'user', $value=$users->pluck('name', 'id'), ($inputs && $inputs[4]) ? $inputs[4] : old('user'))->class('form-control form-control-md')->placeholder('All Users') }}
                        </div>
                        @error('user')
                            <small class="text-danger">{{ $errors->first('user') }}</small>
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
            <div class="col-12 table-responsive" style="height:100%; margin-bottom:50px;">
                    @if($inputs && $inputs[3] == 1)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Option</th><th>Number</th><th>Count</th><th>Amount</th></tr></thead><tbody>
                            @php $tot = 0; $count = 0; @endphp
                            @forelse($data as $key => $item)
                            @php
                                $tot += options()->find($item->option_id)->leader_cost * $item->number_count;
                                $count += $item->number_count;
                            @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date("d/M/Y", strtotime($item->created_at)) }}</td>
                                <td>{{ plays()->find($item->play_category)?->name }}</td>
                                <td>{{ options()->find($item->option_id)->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td class="text-center">{{ $item->number_count }}</td>
                                <td>{{ options()->find($item->option_id)->leader_cost * $item->number_count }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot><tr><td colspan="5" class="fw-bold text-end">Total</td><td class="fw-bold text-center">{{ $count }}</td><td class="fw-bold">{{ $tot }}</td></tr></tfoot>
                    </table>
                    @endif
                    @if($inputs && $inputs[3] == 2)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Option</th><th>Number</th><th>Count</th><th>Amount</th></tr></thead><tbody>
                            @php $tot = 0; $count = 0; @endphp
                            @forelse($data as $key => $item)
                            @php
                                $tot += getWinner($item->play_category, $item->created_at, $item->number, $item->number_count, $item->option_id);
                                $count += $item->number_count;
                            @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date("d/M/Y", strtotime($item->created_at)) }}</td>
                                <td>{{ plays()->find($item->play_category)?->name }}</td>
                                <td>{{ options()->find($item->option_id)->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td class="text-center">{{ $item->number_count }}</td>
                                <td>{!! getWinner($item->play_category, $item->created_at, $item->number, $item->number_count, $item->option_id) !!}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot><tr><td colspan="5" class="fw-bold text-end">Total</td><td class="fw-bold text-center">{{ $count }}</td><td class="fw-bold">{{ $tot }}</td></tr></tfoot>
                    </table>
                    @endif
                    @if($inputs && $inputs[3] == 3)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Option</th><th>Number</th><th>Count</th><th>Purchase</th><th>Sales</th><th>Profilt/Loss</th></tr></thead><tbody>
                            @php $sales = 0; $count = 0; $purchase = 0; @endphp
                            @forelse($data as $key => $item)
                            @php
                                $sales += getWinner($item->play_category, $item->created_at, $item->number, $item->number_count, $item->option_id);
                                $count += $item->number_count;
                                $purchase += options()->find($item->option_id)->leader_cost * $item->number_count;
                            @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date("d/M/Y", strtotime($item->created_at)) }}</td>
                                <td>{{ plays()->find($item->play_category)?->name }}</td>
                                <td>{{ options()->find($item->option_id)->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td class="text-center">{{ $item->number_count }}</td>
                                <td>{{ options()->find($item->option_id)->leader_cost * $item->number_count }}</td>
                                <td>{{ getWinner($item->play_category, $item->created_at, $item->number, $item->number_count, $item->option_id) }}</td>
                                <td>{{ (options()->find($item->option_id)->leader_cost * $item->number_count) - getWinner($item->play_category, $item->created_at, $item->number, $item->number_count, $item->option_id) }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot><tr><td colspan="5" class="fw-bold text-end">Total</td><td class="fw-bold text-center">{{ $count }}</td><td>{{ $purchase }}</td><td class="fw-bold">{{ $sales }}</td><td class="fw-bold">{{ $purchase - $sales }}</td></tr></tfoot>
                    </table>
                    @endif
                    @if($inputs && $inputs[3] == 4)
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Play</th><th>Option</th><th>Number</th><th>Count</th><th>Amount</th></tr></thead><tbody>
                            @php $tot = 0; $count = 0; @endphp
                            @forelse($data as $key => $item)
                            @php
                                $tot += options()->find($item->option_id)->leader_cost * $item->number_count;
                                $count += $item->number_count;
                            @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date("d/M/Y", strtotime($item->created_at)) }}</td>
                                <td>{{ plays()->find($item->play_category)?->name }}</td>
                                <td>{{ options()->find($item->option_id)->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td class="text-center">{{ $item->number_count }}</td>
                                <td>{{ options()->find($item->option_id)->leader_cost * $item->number_count }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot><tr><td colspan="5" class="fw-bold text-end">Total</td><td class="fw-bold text-center">{{ $count }}</td><td class="fw-bold">{{ $tot }}</td></tr></tfoot>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection