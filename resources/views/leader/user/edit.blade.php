@extends("leader.base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <div class="text-center">@include("message")</div>
            <h5 class="text-center">User Management</h5>
                <div class="col-12">
                    <form method="post" action="{{ route('leader.user.update', $user->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title text-muted">Update User</h5>
                            </div>
                            <div class="card-body text-muted">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Full Name</label>
                                        {{ html()->text($name="name", $value=$user->name)->class('form-control')->placeholder('Full Name')->required()}}
                                        @error('name')
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Username</label>
                                        {{ html()->text($name="username", $value=$user->username)->class('form-control')->placeholder('Username')->required()}}
                                        @error('username')
                                            <small class="text-danger">{{ $errors->first('username') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Phone</label>
                                        {{ html()->text($name="phone", $value=$user->phone)->class('form-control')->maxlength(10)->placeholder('Phone')->required()}}
                                        @error('phone')
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Email</label>
                                        {{ html()->email($name="email", $value=$user->email)->class('form-control')->placeholder('Email')->required()}}
                                        @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Email</label>
                                        {{ html()->select($name="status", array(1=>'Active', 0=>'Inactive'), $value=$user->status)->class('form-control')->placeholder('Email')->required()}}
                                        @error('status')
                                            <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Password</label>
                                        {{ html()->password($name="password", $value=NULL)->class('form-control')->placeholder('******')}}
                                        @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 text-end">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection