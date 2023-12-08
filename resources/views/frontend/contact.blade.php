@extends('layouts.app.sub')
@section('content')
    <section class="page-header -type-4 bg-beige-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div >
                            <h1 class="page-header__title">{!! $page->title !!}</h1>
                        </div>
                        <div >
                            <p class="page-header__text">
                                {!! $page->sub_title !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between">
                <div class="col-xl-5 col-lg-6">
                    <h3 class="text-24 lh-1 fw-500">{!! $page->heading1 !!}</h3>
                    <p class="mt-25">
                        {!! $page->content1 !!}
                    </p>
                    <div class="y-gap-30 pt-60 lg:pt-40">
                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('assets/img/icons/location1.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20" style="white-space: pre-wrap;">{!! trim(get_setting('address')) !!}</div>
                        </div>
                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('assets/img/icons/phone.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20">{!! get_setting('phone') !!}</div>
                        </div>
                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20">{!! get_setting('email') !!}</div>
                        </div>
                    </div>
                  
                </div>
                <div class="col-lg-6">
                    <div class="px-40 py-40 bg-white border-light shadow-1 rounded-8 contact-form-to-top">
                        <h3 class="text-24 fw-500">{!! $page->heading2 !!}</h3>
                        <p class="mt-25">
                            {!! $page->content2 !!}
                        </p>
                        <x-status />
                        <form class="contact-form row y-gap-30 pt-20 lg:pt-40" method="POST" action="{{ route('store-contact') }}">
                            @csrf

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>
                                <input type="text" placeholder="Enter your name" name="name" id="name" value="{{ old('name') }}">
                                <x-input-error name='name' />
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Address*</label>
                                <input type="text" name="email" placeholder="Enter your email" id='email' value="{{ old('email') }}">
                                <x-input-error name='email' />
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number*</label>
                                <input type="text" placeholder="Enter your phone number" name='phone' id='phone' value="{{ old('phone') }}">
                                <x-input-error name='phone' />
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Subject</label>
                                <input type="text" placeholder="Enter subject" name='subject' id='subject' value="{{ old('subject') }}">
                                <x-input-error name='subject' />
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Message*</label>
                                <textarea placeholder="Enter message" rows="8" name='message' id='message'>{{old('message')}}</textarea>
                                <x-input-error name='message' />
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" id="submit"
                                    class="button -md -purple-1 text-white">
                                    Send Message
                                </button>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14442.61344961403!2d55.270009!3d25.1811798!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f690193b50a17%3A0xb87248c2102ddca5!2sATOM%20AVIATION%20TRAINING%20ACADEMY!5e0!3m2!1sen!2sae!4v1702029642358!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-light-4" id="faqDiv">
        <div class="container" >
            <div class="row justify-center text-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{!! $page->heading3 !!}</h2>
                        <p class="sectionTitle__text ">
                            {!! $page->content3 !!}
                        </p>
                    </div>
                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                        
                        @php
                            $faqs = getFaq();
                        @endphp

                        @if ($faqs)
                            @foreach ($faqs as $faq)
                                <div class="accordion__item">
                                    <div class="accordion__button">
                                        <div class="accordion__icon">
                                            <div class="icon" data-feather="plus"></div>
                                            <div class="icon" data-feather="minus"></div>
                                        </div>
                                        <span class="text-17 fw-500 text-dark-1">
                                            {{ $faq->title }}
                                        </span>
                                    </div>
                                    <div class="accordion__content">
                                        <div class="accordion__content__inner">
                                            <p>
                                                {!! $faq->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
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