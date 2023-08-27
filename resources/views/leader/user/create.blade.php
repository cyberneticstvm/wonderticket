@extends("leader.base")
@section("content")
<!-- Page Content -->
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <div class="text-center">@include("message")</div>
            <h5 class="text-center">User Management</h5>
                <div class="col-12">
                    <form method="post" action="{{ route('leader.user.create') }}">
                        @csrf
                        <input type="hidden" name="status" value="1" />
                        <input type="hidden" name="type" value="user" />
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title text-muted">Create User</h5>
                            </div>
                            <div class="card-body text-muted">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Full Name</label>
                                        {{ html()->text($name="name", $value=old('name'))->class('form-control')->placeholder('Full Name')->required()}}
                                        @error('name')
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Username</label>
                                        {{ html()->text($name="username", $value=old('username'))->class('form-control')->placeholder('Username')->required()}}
                                        @error('username')
                                            <small class="text-danger">{{ $errors->first('username') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Phone</label>
                                        {{ html()->text($name="phone", $value=old('phone'))->class('form-control')->maxlength(10)->placeholder('Phone')->required()}}
                                        @error('phone')
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Email</label>
                                        {{ html()->email($name="email", $value=old('email'))->class('form-control')->placeholder('Email')->required()}}
                                        @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Password</label>
                                        {{ html()->password($name="password", $value=old('password'))->class('form-control')->placeholder('******')->required()}}
                                        @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 text-end">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 table-responsive">
                    <h5>Users List</h5>
                    <table class="table table-sm table-striped">
                        <thead><tr><th>SL No.</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Edit</th></tr></thead>
                        <tbody>
                            @forelse($users as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td class="text-center"><a href="{{ route('leader.user.edit', encrypt($item->id)) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection