@extends('layouts.app.sub')
@section('content')

<div class="content-wrapper  js-content-wrapper">




<section data-anim-wrap class="masthead -type-2">
    <div class="masthead__bg">
        <div class="bg-image js-lazy" data-bg="{{ $page->getImage1() }}"></div>
    </div>

    <div class="container">
        <div class="row y-gap-50 justify-center items-center">
            <div class="col-xl-6 col-lg-11">
                <div class="masthead__content">
                    <div data-anim-child="slide-up delay-2"
                        class="masthead__subtitle fw-500 text-white text-20 lh-15">
                        {{ $page->title ?? '' }}
                    </div>
                    <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                    {{ $page->sub_title ?? '' }}
                    </h1>




                </div>
            </div>

            <div class="col-xl-5 col-lg-11">

                <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white mt-25 lh-16">
                {!! $page->description ?? '' !!}
                </p>

            </div>
        </div>
    </div>
</section>


<section class="layout-pt-md layout-pb-lg pt-120">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
$i=1;
?>
            @if($teams)
                    @foreach ($teams as $cl)
                    <?php
if($i == 1){
    $act="active";
}else{
    $act="";
}
                    ?>
                <div class="carousel-item {{ $act }}">
                    <div class="carousel-item-wrapper">
                        <div class="carousel-img-area">
                            <img src="{{ $cl->getImage() }}" alt="">
                        </div>
                        <div class="carousel-content-area">
                            <div class="person-detail">
                                <h4>{!! $cl->name ?? '' !!}</h4>
                                <span>{!! $cl->designation ?? '' !!}</span>
                            </div>
                            <p class="m-0">{!! $cl->description ?? '' !!}</p>
                        </div>
                    </div>
                </div>
                <?php
                $i =$i+1;
                ?>
                @endforeach
                @endif

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>


@include('frontend.common.proud_blue')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">




    
@endsection
