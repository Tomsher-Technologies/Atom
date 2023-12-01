@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Update User Role'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Update User Role</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.roles.update',$role->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Name</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $role->name) }}">
                                <x-input-error name='title' />
                            </div>
                           

                            <div class="form-group">
                                <label for="exampleInputEmail1">Permissions</label>
                                    <div class="row">
                                        @foreach($permission as $value)
                                            @php 
                                                $selected = '';
                                                if(in_array($value->id, old('permission', $rolePermissions))){
                                                    $selected = 'checked';
                                                }
                                            @endphp
                                            <div class="col-md-4">
                                                <label class="fs-14 fw-400">
                                                    <input class="custom-checkbox name" type="checkbox" value="{{$value->name}}" name="permission[]" id="permission" @if($selected != '') checked="checked" @endif>
                                                    {{ $value->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                <x-input-error name='permission' />
                            </div>
                        
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-info mb-0"> Cancel</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@push('header')
   
@endpush
@push('footer')
  
@endpush
