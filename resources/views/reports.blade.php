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
                        <div class="mb-2 text-center">
                            <label class="form-label">Order</label>
                            {{ html()->radio($name = 'type', $checked = ($inputs && $inputs[3] == 1) ? true : false, $value = '1')->class('form-control radio') }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2 text-center">
                            <label class="form-label">Winner</label>
                            {{ html()->radio($name = 'type', $checked = ($inputs && $inputs[3] == 2) ? true : false, $value = '2')->class('form-control radio') }}
                        </div>
                    </div>                    
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
                            {{ html()->select($name = 'play', $value=plays()->where('status', 1)->pluck('name', 'id'), ($inputs && $inputs[2]) ? $inputs[2] : old('play'))->class('form-control form-control-md')->placeholder('Select')->required() }}
                        </div>
                        @error('play')
                            <small class="text-danger">{{ $errors->first('play') }}</small>
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
                <div class="col-12">
                    @if($data && $inputs && $inputs[3] == 1)
                        <h5>Order Report</h5>
                        <div class="item-list style-2 recent-jobs-list">
                            <ul>
                                @forelse($data as $key => $play)
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media media media-60">
                                                <img src="{{ asset('/frontend/assets/images/food/pic3.png') }}" alt="logo">
                                            </div>
                                            <div class="item-inner">
                                                <div class="item-title-row">
                                                    <h6 class="item-title">{{ $play->play->name }}</h6>
                                                </div>
                                                <div class="item-footer">
                                                    <div class="d-flex align-items-center">
                                                        @forelse($play->numbers as $key1 => $number)
                                                            Number: {{ $number->number }} | Count: {{ $number->number_count }}<br>
                                                        @empty
                                                        @endforelse
                                                    </div>    
                                                    <span>{{ $play->created_at->format('d/M/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>   
                        </div>
                    @elseif($data && $inputs && $inputs[3] == 2)
                        <h5>Winner Report</h5>
                        <div class="item-list style-2 recent-jobs-list">
                            <ul>
                                @forelse($data as $key => $play)
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media media media-60">
                                                <img src="{{ asset('/frontend/assets/images/food/pic3.png') }}" alt="logo">
                                            </div>
                                            <div class="item-inner">
                                                <div class="item-title-row">
                                                    <h6 class="item-title">{{ $play->name }}</h6>
                                                </div>
                                                <div class="item-footer">
                                                    <div class="d-flex align-items-center">
                                                    @if(!empty(winner($play->id)))
                                                        @forelse(winner($play->id)->positions as $key1 => $postion)
                                                            Position {{ $postion->position }}: {{ $postion->value }}<br>
                                                        @empty
                                                        @endforelse
                                                    @else
                                                        Winner yeto be declared!
                                                    @endif
                                                    </div>    
                                                    <span>{{ date('d/M/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>   
                        </div>
                    @else
                        <p class="text-center">No records found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection