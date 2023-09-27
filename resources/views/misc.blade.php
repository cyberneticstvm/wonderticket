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
            <div class="container">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-sm table-striped">
                            <thead><tr><th>SL No</th><th>Option</th><th>Play</th><th>Number</th><th>Count</th><th>Delete</th></tr></thead><tbody>
                                @forelse($numbers as $key => $number)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ options()->find($number->option_id)->name }}</td>
                                        <td>{{ plays()->find($number->play_category)?->name }}</td>
                                        <td>{{ $number->number }}</td>
                                        <td>{{ $number->number_count }}</td>
                                        <td><a href="{{ route('user.delete.number', ['option' => $number->option_id, 'number' => $number->number, 'play' => $number->play_category]) }}" onclick="return confirm('Are you sure want to delete this record?')">Delete</a></td>
                                    </tr>
                                @empty
                                    <h5>No records found</h5>
                                @endforelse
                            </tbody></table>
                    </div>
                </div>
            </div>                  
        </div>    
    </div>
</div>
<!-- Page Content End-->
@endsection