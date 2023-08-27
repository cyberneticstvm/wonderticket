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
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
                    </ol>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>

<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">        
        <div class="row g-3 clearfix">
            <div class="card mb-2">
                <div class="card-body p-4">
                    <form action="{{ route('user.save') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-sm-3">
                                <label class="form-label req">Full Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control form-control-md" placeholder="Full Name">
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Username</label>
                                <input type="text" value="{{ old('username') }}" name="username" class="form-control form-control-md" placeholder="Username">
                                @error('username')
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Email</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control form-control-md" placeholder="Email">
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">Phone</label>
                                <input type="text" value="{{ old('phone') }}" name="phone" class="form-control form-control-md" placeholder="Phone" maxlength="10">
                                @error('phone')
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                                @enderror
                            </div>                           
                            <div class="col-sm-3">
                                <label class="form-label req">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="******">
                                @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">User Type</label>
                                <select name="type" class="form-control show-tick select2">
                                    <option value="">Select</option>
                                    <option value="admin" {{ (old('type') == 'admin') ? 'selected' : '' }}>Admin</option>
                                    <option value="leader" {{ (old('type') == 'leader') ? 'selected' : '' }}>Leader</option>                                    
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $errors->first('type') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label req">User Status</label>
                                <select name="status" class="form-control show-tick select2">
                                    <option value="">Select</option>
                                    <option value="1" {{ (old('status') == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (old('status') == 0) ? 'selected' : '' }}>Inactive</option>                                    
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12 text-end">
                                <button type="button" onClick="history.back()"  class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary btn-submit">Save</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
</div>
@endsection