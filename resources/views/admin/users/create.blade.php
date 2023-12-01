@extends('layouts.admin.app', ['body_class' => 'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create User</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" autocomplete="off" class="form-control"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <select name="role" class="form-control select2-single mb-3">
                                    @foreach ($roles as $role)
                                        <option {{ old('role') == $role['name'] ? 'selected' : '' }}
                                            value="{{ $role['name'] }}">{{ $role['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password"  autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" name="confirm-password" class="form-control"
                                    id="exampleInputPassword2" placeholder="Password">
                                @error('confirm-password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-info mb-0"> Cancel</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
@endpush
