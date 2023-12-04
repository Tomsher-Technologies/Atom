<header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-5" style="position: absolute;">
    <div class="container py-10">
      <div class="row justify-between items-center">

        <div class="col-auto">
          <div class="header-left">

            <div class="header__logo ">
              <a data-barba href="{{ route('home') }}">
                <img width="150" src="{{ asset('assets/img/logo.png') }}" alt="logo">
              </a>
            </div>

          </div>
        </div>


        <div class="col-auto">

          <div class="header-right d-flex items-center">

            <div class="header-menu js-mobile-menu-toggle ">
              <div class="header-menu__content">
                <div class="mobile-bg js-mobile-bg"></div>

                <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">

                  <a href="tel:{{ get_setting('call_back_phone')}}" class="text-dark-1 ml-30">CALL ME BACK </a>
                </div>




              </div>

              <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                  <div class="icon-close text-dark-1 text-16"></div>
                </div>
              </div>

              <div class="header-menu-bg"></div>
            </div>


            {{-- <div class="header-right__icons text-white d-flex items-center ml-30">

              <div class="">

                <div class="toggle-element js-search-toggle">
                  <div class="header-search pt-90 bg-white shadow-4">
                    <div class="container">
                      <div class="header-search__field">
                        <div class="icon icon-search text-dark-1"></div>
                        <input type="text" class="col-12 text-18 lh-12 text-dark-1 fw-500"
                          placeholder="What do you want to learn?">

                        <button class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                          data-el-toggle=".js-search-toggle">
                          <img src="{{ asset('assets/img/menus/close.svg') }}" alt="icon">
                        </button>
                      </div>

                      <div class="header-search__content mt-30">
                        <div class="text-17 text-dark-1 fw-500">Popular Right Now</div>

                        <div class="d-flex y-gap-5 flex-column mt-20">
                          <a href="courses-single-1.html" class="text-dark-1">The Ultimate Drawing Course - Beginner
                            to Advanced</a>
                          <a href="courses-single-2.html" class="text-dark-1">Character Art School: Complete Character
                            Drawing Course</a>
                          <a href="courses-single-3.html" class="text-dark-1">Complete Blender Creator: Learn 3D
                            Modelling for Beginners</a>
                          <a href="courses-single-4.html" class="text-dark-1">User Experience Design Essentials -
                            Adobe XD UI UX Design</a>
                          <a href="courses-single-5.html" class="text-dark-1">Graphic Design Masterclass - Learn GREAT
                            Design</a>
                          <a href="courses-single-6.html" class="text-dark-1">Adobe Photoshop CC – Essentials Training
                            Course</a>
                        </div>

                        <div class="mt-30">
                          <button class="uppercase underline">PRESS ENTER TO SEE ALL SEARCH RESULTS</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
                </div>
              </div>

            </div> --}}


            <div class="d-none xl:d-block ml-20">
              <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                <i class="text-11 icon icon-mobile-menu"></i>
              </button>
            </div>

          </div>

          <div class="header-right__buttons  d-flex items-center ml-30 xl:ml-20 md:d-none">

            <a href="tel:{{ get_setting('call_back_phone')}}" class="button px-35 h-40 -gradient-1 text-white -rounded ml-30 xl:ml-20">CALL ME BACK</a>
          </div>
        </div>
      </div>

    </div>
    </div>
  </header>