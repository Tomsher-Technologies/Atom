@extends('layouts.admin.auth',['body_class'=>'background show-spinner no-footer','title'=>'Forgot Password'])
@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-5 mx-auto my-auto">
                <div class="card auth-card">
                    <!-- <div class="position-relative image-side ">
                        <p class=" text-white h2">MAGIC IS IN THE DETAILS</p>
                        
                    </div> -->
                    <div class="form-side" >
                        <a href="{{ route('home') }}">
                            <span class="logo-single"></span>
                        </a>
                        <h1 class="mb-4"><b>Forgot Password</b></h1>
                        <x-status />
                        <x-errors />
                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <input type="email" name="email" required="" class="form-control" />
                                <span>E-mail</span>
                            </label>

                            <div class="d-flex justify-content-end align-items-center">
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">RESET</button>
                               
                            </div>
                            
                            <div class="d-flex justify-content-end align-items-center mt-2">
                                <p class=" mb-0">
                                    Please use your e-mail to reset your password.
                                     If you know your password, please
                                        <a href="{{ route('login') }}" style="color: #007bff;">Login</a>.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
