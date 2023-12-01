@extends('layouts.app.sub')
@section('content')
    <section class="page-header -type-2">
        <div class="page-header__bg">
            <div class="bg-image js-lazy" data-bg="{{ $webinar->getImage() }}"></div>
        </div>

        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="page-header__info d-flex items-center">

                            <div class="d-flex items-center text-white mr-15">
                                <div class="icon icon-calendar-2"></div>
                                <div class="text-14 ml-8">{{ date('d M, Y', strtotime($webinar->webinar_date)) }}</div>
                            </div>

                            <div class="d-flex items-center text-white mr-15">
                                <div class="icon icon-location"></div>
                                <div class="text-14 ml-8">{!! $webinar->location !!}</div>
                            </div>

                        </div>

                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title text-white mt-20">
                                {!! $webinar->title !!}
                            </h1>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-50 layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50">
                <div class="col-xl-8 col-lg-8 lg:order-2">
                    {{-- <h4 class="text-20">About The Event</h4> --}}
                    <div class="text-light-1 mt-30">
                        {!! $webinar->description !!}
                    </div>

                    @if ($webinar->presented_title != '' || $webinar->presented_image != '')
                        <div class="mt-60">
                            <h4 class="text-20 mb-30">Presented By</h4>
                            <div class="row y-gap-30">

                                <div class="col-lg-3 col-md-6">
                                    <div class="text-center">
                                        <img src="{{ $webinar->getPresentedImage() }}" alt="image">
                                        <h5 class="text-17 fw-500 mt-20">{{ $webinar->presented_title }}</h5>
                                        <p class="">{{ $webinar->presented_description }}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endif

                    @if ($webinar->video_link != '')
                        <div class="mt-60">
                            {{-- <h4 class="text-20 mb-30">Videos</h4> --}}
                            <div class="row y-gap-30">

                                <div class="col-lg-8 col-md-8">
                                    <iframe width="100%" height="400px" src="{{ $webinar->video_link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>

                            </div>
                        </div>
                    @endif

                </div>

                @if ($webinar->webinar_date > date('Y-m-d H:i:s'))
                    <div class="col-xl-4 col-lg-4 lg:order-1">
                        <div class="event-info bg-white rounded-8 px-30 py-30 border-light shadow-1">
                            <div class="">
                                <div class="text-24 lh-1 fw-500 text-dark-1">Confirm Your Seat</div>


                            </div>

                            <div class="d-flex justify-between mt-30 pb-10">
                                <div class="d-flex items-center text-dark-1">
                                    <div class="icon icon-calendar-2"></div>
                                    <div class="ml-10">Date</div>
                                </div>
                                <div>{{ date('d M, Y', strtotime($webinar->webinar_date)) }}</div>
                            </div>

                            <div class="d-flex justify-between pt-10 border-top-light">
                                <div class="d-flex items-center text-dark-1">
                                    <div class="icon-clock-2"></div>
                                    <div class="ml-10">Time</div>
                                </div>
                                <div>{{ date('h:i A', strtotime($webinar->webinar_date)) }}</div>
                            </div>

                            <div class="d-flex justify-between pt-10 border-top-light">
                                <div class="d-flex items-center text-dark-1">
                                    <div class="icon-location"></div>
                                    <div class="ml-10">Location</div>
                                </div>
                                <div>{!! $webinar->location !!}</div>
                            </div>
                            {{-- <a href="#" class=""></a> --}}
                            <a href="#demo-modal" class="button -md col-12 -purple-1 text-white mt-30">Book Now</a>

                        </div>
                    </div>
                @endif
            </div>


            <div id="demo-modal" class="book-modal">
                <div class="modal__content">
                    {{-- <div class="d-flex items-center pt-10 pb-10 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
                    </div> --}}

                    <div class="modal_content_dt">
                        <div class="col-12 p-0">
                            <div class="">

                                <input type="hidden" name="webinar" id="webinar"  autocomplete="off" value=" {{ $webinar->id }}">
                                <form method="POST" class="contact-form row y-gap-30" action="#" autocomplete="off">
                                    @csrf
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>
                                        <input type="text" name="name" id="name"  autocomplete="off" placeholder="Enter Your Name" required>
                                        
                                    </div>
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone*</label>
                                        <input type="text" name="phone" id="phone" autocomplete="off" placeholder="Enter Your Phone" required>
                                    </div>
                                    <div class="col-12 pt-20 d-none" id="errorDiv">
                                        <span style="color:red;">Please fill all fields.</label>
                                    </div>

                                    <div class="row justify-between pt-15">
                                        <div class="col-auto pl-0 pr-0">
                                            <!-- <button class="button -md -outline-purple-1 text-purple-1 ">CANCEL</button> -->
            
                                            <a href="#" class="modal__close button -md -outline-purple-1 text-purple-1">CANCEL</a>
                                        </div>
            
                                        <div class="col-auto pl-0 pr-0">
                                            <button class="button -md -purple-1 text-white" id="bookNow">SUBMIT</button>
                                        </div>
                                        <div class="col-12 pt-20" id="msgDiv">

                                        </div>
                                    </div>
                                   
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



    @include('frontend.common.proud_blue')
@endsection

@push('header')
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script>

        const currentUrl = window.location.href;

        $('#bookNow').on('click',function(e){
            $('#errorDiv').addClass('d-none');
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var id = $('#webinar').val();
            if(name == '' || email == '' || phone == ''){
                $('#errorDiv').removeClass('d-none');
                return false;
            }else {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('webinar-book') }}",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        id: id,
                        _token:'{{ @csrf_token() }}',
                    },
                    success: function (response) {
                        $('#msgDiv').html(response);

                        setTimeout(function () {
                            window.location.href = currentUrl;
                        }, 3000);
                    }
                });
            }
        });
    </script>
@endpush
