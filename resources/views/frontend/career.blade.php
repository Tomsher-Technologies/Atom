@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{ $page->getImage1() }}"></div>
        </div>
        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="masthead__subtitle fw-500 text-white text-20 lh-15">
                            {{ $page->title ?? '' }}
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $page->sub_title ?? '' !!}
                        </h1>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-11">
                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $page->description ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-60">
                <div class="col-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100" >
                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">{{ $page->heading1 ?? '' }}</h2>
                        </div>
                        <div class="py-30 px-30">
                            <form class="contact-form row y-gap-30" method="POST" action="{{ route('store-career') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>
                                    <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                                    <x-input-error name='name' />
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                    <input type="text" placeholder="Enter your email" name='email' id='email' value="{{ old('email') }}">
                                    <x-input-error name='email' />
                                </div>

                                <div class="col-12" id="job-application">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number*</label>
                                    <input type="text" placeholder="Enter your phone number" name='phone' id='phone' value="{{ old('phone') }}">
                                    <x-input-error name='phone' />
                                </div>

                                <div class="col-12" id="content-div">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Short
                                        Description*</label>
                                    <textarea placeholder="Enter short description" rows="7" name='description' id='description'>{{ old('description') }}</textarea>
                                    <x-input-error name='description' />
                                </div>
                               
                                <div class="col-md-12">
                                    <div class="form-upload col-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Upload CV* (Please upload PDF file with size less than 500 KB)</label>
                                        <div class="form-upload__wrap">
                                            <input type="file" name="resume" accept=".pdf" id="resume" placeholder="cv.pdf">
                               
                                        </div>
                                    </div>
                                    <x-input-error  name="resume" />
                                </div>

                           
                                <div class="row y-gap-20 justify-between pt-15">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <div
                                                class="d-flex items-center justify-between bg-info-1 pl-30 pr-20 py-30 rounded-8">
                                                <div class="text-info-2 lh-14 fw-300">
                                                    {!! $page->content1 ?? '' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="button -md -outline-purple-1 text-purple-1">Apply
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                            <x-status />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')

@endsection

@push('header')
    <style>
        .alert-danger{
            color: red !important;
        }
        .alert-success{
            margin-top: 20px;
            color: #00a659;
            font-weight: 700;
        }
    </style>
@endpush
