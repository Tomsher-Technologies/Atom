<section class="features-count-sec layout-pt-md layout-pb-md">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title text-white">{{ get_setting('count_title') ?? '' }}</h2>

                    <p class="sectionTitle__text text-light-3">
                        {{ get_setting('count_sub_title') ?? '' }}
                    </p>

                </div>

            </div>
        </div>


        <div data-anim-wrap class="row y-gap-30 counter__row">

            <div class="col-lg-3 col-sm-6">
                <div data-anim-child="slide-left delay-1" class="counter -type-1">
                    <div class="counter__number">{{ get_setting('count_1_content') ?? '' }}</div>
                    <div class="counter__title">{{ get_setting('count_1_title') ?? '' }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div data-anim-child="slide-left delay-2" class="counter -type-1">
                    <div class="counter__number">{{ get_setting('count_2_content') ?? '' }}</div>
                    <div class="counter__title">{{ get_setting('count_2_title') ?? '' }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div data-anim-child="slide-left delay-3" class="counter -type-1">
                    <div class="counter__number">{{ get_setting('count_3_content') ?? '' }}</div>
                    <div class="counter__title">{{ get_setting('count_3_title') ?? '' }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div data-anim-child="slide-left delay-4" class="counter -type-1">
                    <div class="counter__number">{{ get_setting('count_4_content') ?? '' }}</div>
                    <div class="counter__title">{{ get_setting('count_4_title') ?? '' }}</div>
                </div>
            </div>

        </div>
    </div>
</section>