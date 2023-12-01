<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('training')
                    <li class="{{ request()->routeIs('admin.training*') ? 'active' : '' }}">
                        <a href="#training">
                            <i class="iconsminds-reverbnation"></i>Trainings
                        </a>
                    </li>
                @endcan

                @can('consulting')
                    <li class="{{ request()->routeIs('admin.consultancy*') ? 'active' : '' }}">
                        <a href="{{ route('admin.consultancy.services') }}" class="text-center"> 
                            <i class="simple-icon-star"></i>Consultancy <br>Services
                        </a>
                    </li>
                @endcan

                @can('home_sliders')
                    <li class="{{ request()->routeIs('admin.home_slider*') ? 'active' : '' }}">
                        <a href="{{ route('admin.home_slider.index') }}">
                            <i class="iconsminds-photo"></i> Home Sliders
                        </a>
                    </li>
                @endcan

                @can('blogs')
                    <li class="{{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}">
                            <i class="iconsminds-newspaper"></i>Blogs
                        </a>
                    </li>
                @endcan

                @can('webinars')
                    <li class="{{ request()->routeIs('admin.webinars*') ? 'active' : '' }}">
                        <a href="{{ route('admin.webinars.index') }}">
                            <i class="iconsminds-computer"></i>Webinars
                        </a>
                    </li>
                @endcan

                @can('reviews')
                    <li class="{{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
                        <a href="{{ route('admin.reviews.index') }}">
                            <i class="iconsminds-diamond"></i>Reviews
                        </a>
                    </li>
                @endcan
                
                @can('clients')
                    <li class="{{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="simple-icon-people"></i> Clients
                        </a>
                    </li>
                @endcan

                @can('faq')
                    <li class="{{ request()->routeIs('admin.faq*') ? 'active' : '' }}">
                        <a href="{{ route('admin.faq.index') }}">
                            <i class="simple-icon-question"></i> FAQ
                        </a>
                    </li>
                @endcan
               
                @can('page_settings')
                    <li class="{{ request()->routeIs('admin.page*') ? 'active' : '' }}">
                        <a href="#pages">
                            <i class="simple-icon-settings"></i> Page Settings
                        </a>
                    </li>
                @endcan

                @can('general_settings')
                    <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}">
                            <i class="simple-icon-wrench"></i> General Settings
                        </a>
                    </li>
                @endcan
                
                @can('roles')
                    <li class="{{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="simple-icon-lock-open"></i>User Roles
                        </a>
                    </li>
                @endcan

                @can('users')
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endcan
                @can('enquiries')
                    <li class="{{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                        <a href="#enquiries">
                            <i class="simple-icon-bubbles"></i>Enquiries
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            <ul class="list-unstyled" data-link="enquiries">
                <li class="{{ areActiveRoutes(['admin.enquiries.career']) }}">
                    <a href="{{ route('admin.enquiries.career') }}" class="ai-icon" >
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Career Enquiries</span>
                    </a>
                </li>

                <li class="{{ areActiveRoutes(['admin.enquiries.contact']) }}">
                    <a href="{{ route('admin.enquiries.contact') }}" class="ai-icon" >
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Contact Enquiries</span>
                    </a>
                </li>
            </ul>

            
            <ul class="list-unstyled" data-link="training">
                <li class="{{ areActiveRoutes(['admin.training.categories','admin.training.category-create','admin.training.category-edit']) }}">
                    <a href="{{ route('admin.training.categories') }}" class="ai-icon" >
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Training Categories</span>
                    </a>
                </li>

                <li class="{{ areActiveRoutes(['admin.training.courses','admin.training.course-create','admin.training.course-edit']) }}">
                    <a href="{{ route('admin.training.courses') }}" class="ai-icon" >
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Courses</span>
                    </a>
                </li>
            </ul>


            <ul class="list-unstyled" data-link="pages">
                <li class="{{ (request()->routeIs('admin.page.about') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.about') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">About/Who We Are</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.programs') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.programs') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">All Trainings/Programs</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.services') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.services') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">All Services</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.blogs') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.blogs') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Blogs</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.career') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.career') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Career</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.clients') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.clients') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Clients</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.contact') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.contact') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Contact Us</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.home') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.home') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Home Page - Main</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.home-training') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.home-training') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Home Page - Training</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.home-services') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.home-services') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Home Page - Services</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.mission') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.mission') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Mission & Vision</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.webinars') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.webinars') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Webinars</span>
                    </a>
                </li>








                

                

                
                
               

                

                

            </ul>
        </div>
    </div>
</div>
