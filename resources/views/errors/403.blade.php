@extends('layouts.admin.app', ['body_class' => '', 'title' => 'No Permission'])

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Start: error page -->
                <div class=" content-center">
                    <div class="error-page text-center">
                        <img src="{{ asset('assets/img/404.svg') }}" alt="404" class="svg">
                        <!-- <div class="error-page__title">404</div> -->
                        <h5 class="fw-500 mt-5"><b>SORRY! YOU DON'T HAVE THE RIGHT PERMISSIONS.</b></h5>
                        
                    </div>
                </div>
                <!-- End: error page -->
            </div>
        </div>
    </div>
@endsection