@extends("base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="container bottom-content"> 
        <div class="serach-area"> 
            <h5 class="text-center">Today's Order</h5>
            <div class="order-status">
                <h5 class="title mb-2">Plays</h5>
            </div>
            @include("message")
            <div class="item-list style-2 recent-jobs-list">
                <ul>
                    @forelse($plays as $key => $play)
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
                                                <tr><td>Number: {{ $number->number }} | </td><td>Count: {{ $number->number_count }} | </td><td><a href="{{ route('user.delete.number', $number->id) }}" onclick="return confirm('Are you sure want to delete this record?')">Delete</a></td></tr>
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
            <!-- Job List -->                    
        </div>    
    </div>
</div>
<!-- Page Content End-->
@endsection