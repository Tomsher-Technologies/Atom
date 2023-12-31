@extends('layouts.app.sub')
@section('content')
    <section class="masthead -type-1 js-mouse-move-container">

    </section>
    <section data-anim-wrap class="masthead -type-7 container-fluid">
        <div class="masthead__bg rounded-30">
            <img src="{{ asset('assets/img/bg-23.jpg') }}" alt="image">
        </div>

        <div class="container">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="masthead__content">
                        <h2 data-anim-child="slide-up delay-3" class="masthead__title text-white">
                            Find A Perfect Course
                        </h2>
                        <p data-anim-child="slide-up delay-4" class="masthead__text text-16 lh-2 text-white pt-10">
                           
                        </p>

                        <div data-anim-child="slide-up delay-5">
                            <div class="masthead-form rounded-16 mt-30 px-10 py-10">
                                <form action="{{ route('search-course') }}" method="GET" class="search-bar-form d-grid y-gap-10 items-center" autocomplete="off">

                                    <div class="masthead-form__item w-100  bg-white rounded-8">
                                        <div class="d-flex items-center w-100">
                                            <i class="icon-search mr-10 ml-10"></i>

                                            <div class="dropdown__item shadow-1 rounded-8">
                                                <select class="form-control " id="search" name="search">
                                                    <option value="">Select Course</option>
                                                    @if ($courseName != '' && $courseid != '')
                                                        <option value="{{$courseid}}" selected>{!! $courseName !!}</option>
                                                    @endif
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="rounded-8">
                                        <div class=" dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10 ml-10" src="{{ asset('assets/img/icons/type.svg') }}"
                                                        alt="icon">
                                                    <!--<span class="js-dropdown-title">Course Type </span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">
                                                <select class="form-control" name="course_type">
                                                    <option value="">Select Course Type</option>
                                                    <option {{ ($course_type == 2) ? 'selected' : '' }} value="2">Face To Face</option>
                                                    <option  {{ ($course_type == 1) ? 'selected' : '' }} value="1">Online</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10  ml-10" src="{{ asset('assets/img/icons/type.svg') }}"
                                                        alt="icon">
                                                    <!--<span class="js-dropdown-title">Category</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1">


                                                @php
                                                    $categories = App\Models\TrainingCategories::where('status',1)->orderBy('name','asc')->get();
                                                @endphp

                                                <div class="dropdown__item shadow-1 rounded-8">
                                                    <select class="form-control" name="categories">
                                                        <option value="">Select Course Category</option>
                                                        @foreach ($categories as $categ)
                                                            <option  {{ ($category == $categ->id) ? 'selected' : '' }}  value="{{$categ->id}}">{!! $categ->name !!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10  ml-10"
                                                        src="{{ asset('assets/img/icons/location.svg') }}" alt="icon">
                                                    <!--<span class="js-dropdown-title">City</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">


                                                @php
                                                    $locations = getCourseLocations();

                                                @endphp

                                                <select class="form-control" name="location">
                                                    <option value="">Select Location</option>
                                                    @foreach ($locations as $loc)
                                                        <option {{ ($location == $loc['id']) ? 'selected' : '' }} value="{{$loc['id']}}">{!! $loc['name'] !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>


                                    <div class=" rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10 ml-10"
                                                        src="{{ asset('assets/img/icons/lang.svg') }}" alt="icon">
                                                    <!--<span class="js-dropdown-title">Language</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">

                                                <select class="form-control" name="language">
                                                    <option value="">Select Course Language</option>
                                                    <option {{ ($language == 1) ? 'selected' : '' }} value="1">English</option>
                                                    <option {{ ($language == 2) ? 'selected' : '' }} value="2">Arabic</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>





                                    <div class="masthead-form__button p-0">
                                        <button type="submit" class="button w-100 h-100 -gradient-1 text-white rounded-8 ">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-list-slider layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-30">

                @if (isset($courses[0]))
                    @foreach ($courses as $item)
                        <div data-anim-child="" class="col-lg-4 col-md-6">
                            <a href="{{ route('course-details', ['slug' => $item->slug]) }}"
                                class="coursesCard -type-1 rounded-8 bg-white shadow-3">
                                <div class="relative">
                                    <div class="coursesCard__image overflow-hidden rounded-top-8">
                                        <img class="w-1/1" src="{{ $item->getCourseImage() }}" alt="image">
                                        <div class="coursesCard__image_overlay rounded-top-8"></div>
                                    </div>
                                    <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                    </div>
                                </div>

                                <div class="h-100 pt-15 pb-15 pl-10 pr-10">
                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{!! $item->name ?? '' !!}</div>
                                    <div class="d-grid c-grid-columns x-gap-10 items-center pt-10">
                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/duration.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->duration ?? '' !!}</div>
                                        </div>

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/lang.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->language->title ?? '' !!}</div>
                                        </div>

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/type.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->course_type->title ?? '' !!}</div>
                                        </div>

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/location.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->location->name ?? '' !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                @else
                      <div style="text-align: center;color: red;font-size: x-large;">  No Courses Found</div>
                @endif


            </div>


            <div class="row justify-center pt-50 lg:pt-50">
                <div class="col-auto">
                    <div id="pg-custom">
                    <div class="pagination">
                        {{ $courses->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                    </div>
                </div>
            </div>
            
           
            
            
            
        </div>
    </section>
    
    <style>
        @media (max-width: 767px){
.masthead.-type-1 {
    padding-bottom: 80px;
    padding-bottom: 0px;
        margin-bottom: 0px;
}
}
    </style>
    
    
    @include('frontend.common.proud_blue')
@endsection

@push('header')
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush

@push('footer')
    <script src="{{ adminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script type="text/javascript">
        var route = "{{ url('autocomplete-course') }}";
        
        $('#search').select2({
            minimumInputLength: 2,
            width: 'inherit',
            theme: "bootstrap",
            placeholder: 'Select Course',
            ajax: {
                url: route,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        }); 
    </script>
@endpush
