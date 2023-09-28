@extends("leader.base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="container bottom-content"> 
        <div class="serach-area"> 
            <h5 class="text-center">Today's Order</h5>
            @include("message")
            <div class="container">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-sm table-striped">
                            <thead><tr><th>SL No</th><th>Option</th><th>Play</th><th>Number</th><th>Count</th></tr></thead><tbody>
                                @forelse($numbers as $key => $number)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ options()->find($number->option_id)->name }}</td>
                                        <td>{{ plays()->find($number->play_category)?->name }}</td>
                                        <td>{{ $number->number }}</td>
                                        <td>{{ $number->number_count }}</td>                                        
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