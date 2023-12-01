@extends('layouts.admin.app', ['body_class' => 'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit User</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" autocomplete="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <select name="role" class="form-control select2-single mb-3">
                                    @foreach($roles as $rol)
                                        <option @if(isset($userRole[0]) && (old('role', $userRole[0]) == $rol['id']) ) selected  @endif value="{{ $rol['name'] }}">{{ $rol['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $user->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $user->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="deleteBtn" class="btn btn-dark mb-0 float-right">Delete
                                User</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <form id="deleteForm" action="{{ route('admin.users.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script>
        $('#deleteBtn').on('click', function() {
            $confirm = confirm("Do you want to delete this user?");
            if ($confirm) {
                $('#deleteForm').submit();
            }
        });
    </script>
@endpush
