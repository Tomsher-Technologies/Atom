@extends('layouts.app.sub')
@section('content')
    <section class="page-header -type-1">
        <div class="container pt-50">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">{!! $page->title !!}</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

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

            <div class="row y-gap-30">
                <div class="col-12">
                    <div class="rounded-16 bg-white shadow-4 h-100">
                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">{!! $page->heading1 !!}</h2>
                        </div>

                        <div class="py-30 px-30">
                            <div class="mt-10">
                                <div class="px-30 py-20 bg-light-7 rounded-8">
                                    <div class="row x-gap-10">
                                        <div class="col-lg-6">
                                            <div class="text-purple-1">Title</div>
                                        </div>
                                    
                                        <div class="col-lg-3">
                                            <div class="ml-10 text-purple-1">Date</div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="text-purple-1">Action</div>
                                        </div>

                                    </div>
                                </div>

                                @if (!empty($downloads[0]))
                                    @foreach ($downloads as $down)
                                        <div class="px-30 border-bottom-light">
                                            <div class="row x-gap-10 items-center py-25">
                                                <div class="col-lg-6">
                                                    <div class="text-purple-1">
                                                        {{ $down->title }}
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-3">
                                                    <div class="ml-10">
                                                        <div class="text-dark-1 lh-12 fw-500">
                                                            {{ date('d-m-Y', strtotime($down->created_at)) }}
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-3">
                                                    <a href="#demo-modal" data-id="{{ $down->id}}" class="button -icon -purple-1 text-white downloadPdf" id="">
                                                        Download
                                                        <i class="icon-arrow-top-right text-13 ml-10"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                               
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-center pt-50 lg:pt-50">
                <div class="col-auto">
                    <div id="pg-custom">
                    <div class="pagination">
                        {{ $downloads->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                    </div>
                </div>
            </div>

            <div id="demo-modal" class="book-modal">
                <div class="modal__content">
                    {{-- <div class="d-flex items-center pt-10 pb-10 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
                    </div> --}}

                    <div class="modal_content_dt">
                        <div class="col-12 p-0">
                            <div class="">

                                <input type="hidden" name="download_id" id="download_id"  autocomplete="off" value="">
                                <form method="POST" class="contact-form row y-gap-30" action="#" autocomplete="off">
                                    @csrf
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name*</label>
                                        <input type="text" name="name" id="name"  autocomplete="off" placeholder="Enter Your Name" required>
                                        
                                    </div>
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter Your Email" required>
                                        <span class="error" id="invalid_email"  style="color:red;"> Invalid Email </span>
                                    </div>
                                    <div class="col-12 pt-20">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone*</label>
                                        <input type="text" name="phone" id="phone" autocomplete="off" placeholder="Enter Your Phone" required>
                                        <span class="error" id="invalid_phone"  style="color:red;"> Invalid Phone </span>
                                    </div>
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
    </section>

    @include('frontend.common.proud_blue')
@endsection

@push('footer')
    <script src="{{ adminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script>
        $('.error').hide();
        const currentUrl = window.location.href;
        $('.downloadPdf').on('click',function(e){
            var downId = $(this).attr('data-id');
            
            $('#download_id').val(downId);
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
        });

        function validatePhone(phone) {
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
            if (filter.test(phone)) {
                return true;
            }
            else {
                return false;
            }
        }

        function IsEmail(email) {
            var regex =/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            }
            else {
                return true;
            }
        }

        $('#bookNow').on('click',function(e){
            $('#errorDiv').addClass('d-none');
            $('.error').hide();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var id = $('#download_id').val();

            var flag = 1;

            if(email != '' && IsEmail(email) == false){
                $('#invalid_email').show();
                flag = 0;
            }
            if(phone != '' && validatePhone(phone) == false){
                $('#invalid_phone').show();
                flag = 0;
            }

            if(name == '' || email == '' || phone == ''){
                $('#errorDiv').removeClass('d-none');
                flag = 0;
            }
            if(flag == 1) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('download-pdf') }}",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        id: id,
                        _token:'{{ @csrf_token() }}',
                    },
                    success: function (response) {
                        
                        var link = document.createElement('a');
                        link.href = response;
                        link.download = "Atom.pdf";
                        link.click();
                        window.location.href = currentUrl;
                    }
                });
            }else{
                return false;
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