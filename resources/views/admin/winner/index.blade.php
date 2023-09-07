@extends("admin.base")
@section("content")
<!-- Body: Header -->
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Winner</li>
                    </ol>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>

<!-- Body: Body -->
<div class="body px-xl-4 px-md-2">
    <div class="container-fluid">        
        <div class="row g-3 clearfix">
            <div class="card mb-2">
                <div class="card-body p-4">
                    <form action="{{ route('winner.save') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-sm-9">
                                <label class="form-label req">Play</label>
                                {{ html()->select($name = 'play_id', $options = plays()->where('status', 1)->pluck('name', 'id'), $value = old('play'))->class('form-control select2')->placeholder('Select') }}
                                @error('play_id')
                                    <small class="text-danger">{{ $errors->first('play_id') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Play Date</label>
                                {{ html()->date($name = 'date', $value = date('Y-m-d'))->class('form-control form-control-md') }}
                                @error('date')
                                <small class="text-danger">{{ $errors->first('date') }}</small>
                                @enderror
                            </div>
                            @forelse(prizes()->where('status', 1)->where('option_id', 1) as $key1 => $prize)                            
                            <div class="col-sm-2">
                                <label class="form-label req">Position {{$prize->id}}</label>
                                <input type="hidden" name="positions[]" value="{{$prize->id}}" />
                                <input type="text" name="position_values[]" maxlength="3" class="form-control form-control-md" placeholder="xxx" required>
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            @empty
                            @endforelse
                            <div class="col-sm-12 text-end">
                                <button type="button" onClick="history.back()"  class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary btn-submit">Save</button>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-2">                
                <div class="card-body p-4 table-responsive">
                    <h5 class="text-primary">Numbers Won Today</h5>
                    <table id="dataTbl" class="table table-striped table-hover align-middle table-sm">
                        <thead><tr><th>SL No</th><th>Play</th><th>Date</th><th>Values</th><th>Delete</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($winners as $key => $winner)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $winner->play->name }}</td>
                                <td>{{ $winner->date->format('d-M-Y') }}</td>
                                <td>
                                    @forelse($winner->positions as $key1 => $item)
                                        @php $position = ($key1 > 5) ? 'Position: '.$key1 : 'Complement: '$key1-5 @endphp
                                        {{ $position.': '.$item->value.', Prize: '.$item->prize->amount }}
                                    @empty
                                    @endforelse
                                </td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('winner.delete', $winner->id) }}">
                                        @csrf 
                                        @method("DELETE")
                                        <button type="submit" class="border no-border" onclick="javascript: return confirm('Are you sure want to delete this record?');"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
</div>
@endsection