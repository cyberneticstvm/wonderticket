@extends("leader.base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <div class="text-center">@include("message")</div>
            <h5 class="text-center">Winner's Today</h5>
            <div class="item-list style-2 recent-jobs-list">
                <ul>
                    @forelse(plays()->where('status', 1) as $key => $play)
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
                                        <div class="row">
                                            <div class="col-12">
                                                @if(!empty(winner($play->id)))
                                                    @forelse(winner($play->id)->positions->take(5) as $key1 => $postion)
                                                        {{ $postion->position }}: {{ $postion->value }}<br>
                                                    @empty
                                                    @endforelse
                                                @else
                                                    Winner yeto be declared!
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                @if(!empty(winner($play->id)))
                                                    <p class="fw-bold">COMPLEMENTS</p>                                            
                                                    @forelse(winner($play->id)->positions1 as $key1 => $postion)
                                                        {{ $postion->value }} | 
                                                    @empty
                                                    @endforelse
                                                @else
                                                    Winner yeto be declared!
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </ul>   
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection