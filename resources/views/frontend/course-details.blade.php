@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{ $course->getBannerImage() }}"></div>
        </div>

        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="masthead__subtitle fw-500 text-white text-20 lh-15">
                            <a
                                href="{{ route('courses', ['slug' => $course->training_category->slug]) }}">{!! $course->training_category->name ?? '' !!}</a>
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $course->banner_title ?? '' !!}
                        </h1>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-11">

                    <div data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $course->banner_content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-xs layout-pb-md">
        <div class="container">
            <div class="row">

                <div class="col-xl-2 col-md-6">
                    <div class="d-flex justify-between items-center py-20 px-25 rounded-16 shadow-4 bg-yellow-5 mb-20">
                        <div>
                            <div class="lh-1 fw-500"> Duration</div>
                            <div class="text-20 lh-1 fw-700 text-dark-1 mt-20">{!! $course->duration ?? '' !!}</div>
                        </div>

                        <img src="{{ asset('assets/img/icons/duration.svg') }}" alt="icon">
                    </div>
                </div>

                <div class="col-xl-2 col-md-6">
                    <div class="d-flex justify-between items-center py-20 px-25 rounded-16 bg-blue-7 shadow-4 mb-20">
                        <div>
                            <div class="lh-1 fw-500"> Language</div>
                            <div class="text-20 lh-1 fw-700 text-dark-1 mt-20">{!! $course->language->title ?? '' !!}</div>
                        </div>

                        <img src="{{ asset('assets/img/icons/lang.svg') }}" alt="icon">
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="d-flex justify-between items-center py-20 px-25 rounded-16 bg-purple-3 shadow-4 mb-20">
                        <div>
                            <div class="lh-1 fw-500"> Type</div>
                            <div class="text-20 lh-1 fw-700 text-dark-1 mt-20">{!! $course->course_type->title ?? '' !!}</div>
                        </div>

                        <img src="{{ asset('assets/img/icons/type.svg') }}" alt="icon">
                    </div>
                </div>

                <div class="col-xl-2 col-md-6">
                    <div class="d-flex justify-between items-center py-20 px-25 rounded-16  bg-green-3  shadow-4 mb-20">
                        <div>
                            <div class="lh-1 fw-500"> Location</div>
                            <div class="text-20 lh-1 fw-700 text-dark-1 mt-20">{!! $course->location->name ?? '' !!}</div>
                        </div>

                        <img src="{{ asset('assets/img/icons/location.svg') }}" alt="icon">
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="d-flex justify-between items-center py-20 px-25 rounded-16 shadow-4  bg-info-1 ">
                        <div>
                            <div class="lh-1 fw-500"> Course Fee</div>
                            <div class="text-20 lh-1 fw-700 text-dark-1 mt-20">AED {{ $course->price }} </div>
                        </div>

                        <img src="{{ asset('assets/img/icons/type.svg') }}" alt="icon">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="overview" class="pt-60 lg:pt-40 to-over">
                        <h4 class="text-18 fw-500">Description</h4>

                        <div class="show-more mt-30">
                            <div class="show-more__content">
                                <p class="">
                                    {!! $course->description !!}
                                </p>
                            </div>

                        </div>

                    </div>

                    <div id="course-content" class="pt-60 lg:pt-40">
                        {{-- <h2 class="text-20 fw-500">Course Content</h2> --}}

                        <div class="mt-10">
                            <div class="accordion -block-2 text-left js-accordion">

                                @php
                                    $contents = $course->course_details;
                                @endphp

                                @if ($contents)
                                    @foreach ($contents as $cont)
                                        <div class="accordion__item">
                                            <div class="accordion__button py-20 px-30 bg-light-4">
                                                <div class="d-flex items-center">
                                                    <div class="accordion__icon">
                                                        <div class="icon" data-feather="chevron-down"></div>
                                                        <div class="icon" data-feather="chevron-up"></div>
                                                    </div>
                                                    <span class="text-17 fw-500 text-dark-1">{{ $cont->title }}</span>
                                                </div>

                                            </div>

                                            <div class="accordion__content">
                                                <div class="accordion__content__inner px-30 py-30">
                                                    <div class="y-gap-20">

                                                        <div class="d-flex justify-between">
                                                            <div class="d-flex items-center">

                                                                <div>{!! $cont->description !!}</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 mt-20" id="formDiv">
                    <hr>
               
                    {{-- <button name="submit" id="submit" class="button -md -purple-1 text-white">
                        <a href="{{ route('course-apply',['slug' => $course->slug]) }}">Apply Now
                    </button> --}}

                    <section class="layout-pt-sm layout-pb-lg">
                        <div data-anim-wrap class="">
                            <div class="row y-gap-60">
                                <div class="col-12">
                                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">

                                        @if ($message = Session::get('status'))
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <div
                                                        class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                                        <div class="text-success-2 lh-14 fw-300">
                                                            <div class="text-18 fw-700">
                                                                {!! $message !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                                            <h2 class="text-20 lh-1 fw-500">Register Now</h2>
                                        </div>
                                        <div class="py-30 px-30">

                                            <form class="contact-form  y-gap-30 repeater" id="applyCourse" method="POST"
                                                action="{{ route('apply-course') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row y-gap-20">

                                                    <div class="col-lg-4 ">
                                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Choose Course
                                                            Type*</label>
                                                    </div>

                                                    <div class="col-md-8  col-sm-12">

                                                        <!--<label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Type*</label>-->
                                                        <select name="registration_type" id="registration_type">
                                                            <option value="individual">Individual</option>
                                                            <option value="group">Group</option>
                                                        </select>
                                                        <input type="hidden" value="{{ $course->id }}"
                                                            name="course_id">
                                                        <input type="hidden" value="{{ $course->price }}"
                                                            name="price">

                                                    </div>
                                                </div>

                                                <div class="p-0" data-repeater-list="users">

                                                    <div data-repeater-item class="row y-gap-20">

                                                        <div class="col-lg-4">
                                                            <label
                                                                class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>
                                                        </div>

                                                        <div class="col-md-8  col-sm-8">

                                                            <!--<!-<label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>-->
                                                            <input type="text" name="name" id="name"
                                                                placeholder="Enter your name"
                                                                value="{{ old('name') }}">

                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label
                                                                class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                                        </div>

                                                        <div class="col-md-8  col-sm-8">

                                                            <!--<label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>-->
                                                            <input type="email" placeholder="Enter your email"
                                                                name='email' id='email'
                                                                value="{{ old('email') }}">

                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone
                                                                Number*</label>
                                                        </div>

                                                        <div class="col-md-8  col-sm-8">

                                                            <!--<label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number*</label>-->
                                                            <input type="text" placeholder="Enter your phone number"
                                                                name='phone' id='phone'
                                                                value="{{ old('phone') }}">

                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Job Title</label>
                                                        </div>
                                                        <div class="col-md-8  col-sm-8">
                                                            <input type="text" placeholder="Enter your Job Title"
                                                                name='job_title' id='job_title'
                                                                value="{{ old('job_title') }}">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Company Name</label>
                                                        </div>
                                                        <div class="col-md-8  col-sm-8">
                                                            <input type="text" placeholder="Enter your Company Name"
                                                                name='company_name' id='company_name'
                                                                value="{{ old('company_name') }}">
                                                        </div>
                                                        <div class="text-right col-sm-12 mb-10 d-block">
                                                            <input data-repeater-delete
                                                                class="button -sm -red-1 text-white mt-2" type="button"
                                                                value="Delete" style="float:right;" />
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class=" px-sm-40 px-20 col-sm-12 mb-10">
                                                    <input data-repeater-create class="button -sm -purple-1 text-white"
                                                        type="button" value="Add New" id="addNew" />
                                                </div>
                                                <div class="row y-gap-20">
                                            <div class="col-lg-6 col-12">
                                                <input type="text" name="txtcode" required id="txtcode" onBlur="valcap();" style="width:100%;" class="" placeholder="Enter Code *" autocomplete="off">
                                                <span id="caperr"></span>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div id="captcha" style=" width:30%; float: left;    text-align: center;  margin:-4px 21px 0px 49px; color:#000;">
                                                <div id="captcha_gen" style="background-image:url({{ asset('assets/img/icons/captcha.png') }});">
                                                <label align="center" id="randomfield" onCopy="return false;"   style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none; font-size:20px; font-weight:bold; padding-top:4px;'  unselectable='on' onselectstart='return false;' onmousedown='return false;'></label>
                                                </div>
                                                <input type="hidden" id="txtCaptcha" name="txtCaptcha"/></div>
                                                <img src="{{ asset('assets/img/icons/rlod.png') }}" width="22" height="22" onClick="getCaptcha();">
                                            </div>
                                            </div>
                                                <div class="row y-gap-20 justify-between pt-15">
                                                    <div class="col-12">
                                                        <div class="col-12">
                                                            <div
                                                                class="d-flex items-center justify-between bg-info-1 pl-30 pr-20 py-20 rounded-8">
                                                                <div class="text-info-3 lh-14 fw-300">
                                                                    <div class="text-20 fw-700">
                                                                        Total Price : <span
                                                                            id="priceTotal">AED {{ $course->price }}</span>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="button -md -outline-purple-1 text-purple-1">Register
                                                            Now</button>

                                                            <button type="submit"
                                                            class="button -md -outline-purple-1 text-purple-1">Register
                                                            Now and Pay Later</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection

@push('header')
    <style>
        .error {
            color: red !important;
        }
    </style>
@endpush

@push('footer')
    <script src="{{ adminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/jquery.validate/jquery.validate.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/jquery.validate/additional-methods.js') }}"></script>

    <script>
        var message = "{{ Session::get('status') }}";

        if (message != '') {
            $('html, body').animate({
                scrollTop: $("#formDiv").offset().top
            }, 1000);
        }

        $('#addNew').css('display', 'none');

        $('#registration_type').on('change', function() {
            var type = $(this).val();

            if (type == 'group') {
                $('#addNew').css('display', 'block');
            } else {
                $('#addNew').css('display', 'none');
                $('div[data-repeater-item]:not(:first)').remove();
            }
        });

        $('.repeater').repeater({
            initEmpty: false,
            show: function(e) {
                $(this).slideDown();

                var repeaterItems = $("div[data-repeater-item]");
                var repeatCount = repeaterItems.length;

                addFieldValidation(repeatCount);
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
                var repItems = $("div[data-repeater-item]");
                var repCount = repItems.length;

                if (repCount == 2) {
                    $('#registration_type').val('individual');
                }
            },
            isFirstItemUndeletable: true
        })

        function addFieldValidation(count) {
            count = parseInt(count) - 1;
            $('[name="users[' + count + '][name]"]').attr("id", "name" + count);
            $('[name="users[' + count + '][email]"]').attr("id", "email" + count);
            $('[name="users[' + count + '][phone]"]').attr("id", "phone" + count);

            $("#name" + count).rules('add', {
                required: true
            });
            $("#email" + count).rules('add', {
                required: true
            });
            $("#phone" + count).rules('add', {
                required: true,
                minlength: 6,
                number: true
            });

        }

        $("#applyCourse").validate({
            rules: {
                registration_type: 'required',
                'users[0][name]': {
                    required: true
                },
                'users[0][email]': {
                    required: true
                },
                'users[0][phone]': {
                    required: true,
                    minlength: 6,
                    number: true
                },
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2')) {
                    error.insertAfter(element.next('.select2-container'));
                } else if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent().parent().parent());
                } else {
                    error.appendTo(element.parent("div"));
                }
            },
            submitHandler: function(form, event) {
                form.submit();
            }
        });
        $( document ).ready(function() {
    getCaptcha();
});
    function getCaptcha() { 
    //var chars = "0Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Ii9Jj0Kk1Ll2Mm3Nn4Oo5Pp6Qq7Rr8Ss9Tt0Uu1Vv2Ww3Xx4Yy5Zz";
    var chars = "0123456789";
    var string_length = 4;
    var captchastring = '';
    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        captchastring += chars.substring(rnum,rnum+1);
    }
    document.getElementById("randomfield").innerHTML = captchastring;
    document.getElementById("txtCaptcha").value =  document.getElementById("randomfield").innerHTML ;
}

function valcap(){
    $("#caperr").html("");
    $txtcod=$("#txtcode").val();
    $txtcap=$("#txtCaptcha").val(); 
    if($txtcod != $txtcap){
    document.getElementById("txtcode").value = '';
      $("#caperr").html("Invalid Captcha");
      $( "#caperr" ).focus();
      $("#caperr").css("color", "red");
        return false;  
    }else{
        $("#caperr").html("");
    }
}
    </script>
@endpush