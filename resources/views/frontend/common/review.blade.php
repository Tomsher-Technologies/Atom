<div class="row justify-center pt-60">
    <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="overflow-hidden js-testimonials-slider">
            <div class="swiper-wrapper">
                @php
                    $reviews = getCourseReviews();
                    $reviewImages = '';
                @endphp

                @if ($reviews)
                    @foreach ($reviews as $key=>$rev)
                        <div class="swiper-slide h-100">
                            <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                <div class="testimonials__icon">
                                    <img src="{{ asset('assets/img/quote.svg') }}" alt="quote">
                                </div>
                                <div class="testimonials__text md:text-20 fw-500 text-dark-1">{{ $rev->comment }} </div>
                                <div class="testimonials__author">
                                    <h5 class="text-17 lh-15 fw-500">{!! $rev->name !!}</h5>
                                    <div class="mt-5">{!! $rev->position !!}</div>
                                </div>
                            </div>
                        </div>

                        @php
                            $active = '';
                            if($key == 0){
                                $active = 'is-active';
                            }
                            $reviewImages .= '<div class="col-auto">
                                                <div class="pagination__item '.$active.'">
                                                    <img src="'.$rev->getImage().'" alt="image">
                                                </div>
                                            </div>';
                        @endphp
                    @endforeach
                @endif
                
            </div>
            <div class="pt-60 lg:pt-40">
                <div class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">
                    
                    {!! $reviewImages !!}
                   
                </div>
            </div>
        </div>
    </div>
</div>