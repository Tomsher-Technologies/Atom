<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ReelsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\PopupsController;
use App\Http\Controllers\Admin\AccreditationsController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\HomeSliderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('ADMIN_PREFIX', 'admin'), 'as' => 'admin.'], function () {

    Route::get('/', function () {
        // dd( auth()->user()->can('manage-distributor') );
        return redirect()->route('admin.dashboard');
    });

    Route::middleware(['auth', 'auth.session'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/search', [DashboardController::class, 'search'])->name('search');

        Route::get('/settings', [PagesController::class, 'generalSettings'])->name('settings');
        Route::post('/store-settings', [PagesController::class, 'storeSettings'])->name('store-settings');
        Route::post('/store-header-settings', [PagesController::class, 'storeHeaderSettings'])->name('store-header-settings');

        Route::get('/enquiries-contact', [PagesController::class, 'enquiries'])->name('enquiries.contact');
        Route::get('/enquiries-career', [PagesController::class, 'enquiriesCareer'])->name('enquiries.career');

        // Logged-in user profile
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/profile', function () {
                return view('admin.users.profile');
            })->name('profile');

            Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
            Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
            Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
        });

        // All Users 
        Route::resource('users', UserController::class);

        // Clients
        Route::resource('clients', ClientsController::class)->except('show');
        Route::resource('popups', PopupsController::class)->except('show');
        // Accreditations
        Route::resource('accreditations', AccreditationsController::class)->except('show');
// Teams
        Route::resource('teams', TeamsController::class)->except('show');
        // Services
        Route::resource('services', ServiceController::class)->except('show');

        // Reels
        Route::resource('reels', ReelsController::class)->except('show');

        Route::get('/ajax-location', [DashboardController::class, 'ajaxLocations'])->name('ajax-location');

        Route::group(['prefix' => 'training', 'as' => 'training.'], function () {
            Route::get('/categories', [TrainingController::class, 'index'])->name('categories');
            Route::get('/category-create', [TrainingController::class, 'createCategory'])->name('category-create');
            Route::post('/category-store', [TrainingController::class, 'storeCategory'])->name('category-store');
            Route::get('/category-edit/{category}', [TrainingController::class, 'editCategory'])->name('category-edit');
            Route::post('/category-update', [TrainingController::class, 'updateCategory'])->name('category-update');

            Route::get('/courses', [TrainingController::class, 'coursesList'])->name('courses');
            Route::get('/course-create', [TrainingController::class, 'createCourse'])->name('course-create');
            Route::post('/course-store', [TrainingController::class, 'storeCourse'])->name('course-store');
            Route::get('/course-edit/{course}', [TrainingController::class, 'editCourse'])->name('course-edit');
            Route::post('/course-update', [TrainingController::class, 'updateCourse'])->name('course-update'); 
            Route::get('/course-registrations/{course}', [TrainingController::class, 'courseBookingLists'])->name('course-registrations');
            
        });

        Route::group(['prefix' => 'consultancy', 'as' => 'consultancy.'], function () {
            Route::get('/services', [ServiceController::class, 'index'])->name('services');
            Route::get('/service-create', [ServiceController::class, 'createService'])->name('service-create');
            Route::post('/service-store', [ServiceController::class, 'storeService'])->name('service-store');
            Route::get('/service-edit/{id}', [ServiceController::class, 'editService'])->name('service-edit');
            Route::post('/service-update', [ServiceController::class, 'updateService'])->name('service-update'); 
            Route::post('/service-delete/{id}', [ServiceController::class, 'deleteService'])->name('service-delete'); 
        });

        Route::resource('blogs', BlogController::class)->except('show');
        Route::resource('careers', CareerController::class)->except('show');
        Route::resource('webinars', WebinarController::class)->except('show');
        Route::get('/webinar-bookings/{id}', [WebinarController::class, 'bookings'])->name('webinar-bookings');

        Route::resource('reviews', ReviewsController::class)->except('show');

        Route::resource('home_slider', HomeSliderController::class)->except('show');

        Route::get('/faq', [PagesController::class, 'faq'])->name('faq.index');
        Route::get('/create-faq', [PagesController::class, 'createFaq'])->name('faq.create');
        Route::post('/store-faq', [PagesController::class, 'storeFaq'])->name('faq.store');

        Route::get('/edit-faq/{id}', [PagesController::class, 'editFaq'])->name('faq.edit');
        Route::post('/faq-update', [PagesController::class, 'updateFaq'])->name('faq.update'); 
        Route::post('/delete-faq', [PagesController::class, 'deleteFaq'])->name('faq.delete');

        Route::get('/downloads', [DashboardController::class, 'downloads'])->name('downloads.index');
        Route::get('/create-downloads', [DashboardController::class, 'createDownloads'])->name('downloads.create');
        Route::post('/store-downloads', [DashboardController::class, 'storeDownloads'])->name('downloads.store');

        Route::get('/edit-downloads/{id}', [DashboardController::class, 'editDownloads'])->name('downloads.edit');
        Route::post('/downloads-update', [DashboardController::class, 'updateDownloads'])->name('downloads.update'); 

        Route::post('/downloads-delete', [DashboardController::class, 'deleteDownloads'])->name('downloads.delete');
        
        Route::get('/download-users/{id}', [DashboardController::class, 'downloadUsers'])->name('download-users');

        Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
           
            Route::get('/home', [PagesController::class, 'homePage'])->name('home');
            Route::post('/store-home', [PagesController::class, 'storeHomePage'])->name('store-home');

            Route::get('/about', [PagesController::class, 'aboutPage'])->name('about');
            Route::post('/store-about', [PagesController::class, 'storeAboutPage'])->name('store-about');

            Route::get('/mission', [PagesController::class, 'missionPage'])->name('mission');
            Route::post('/store-mission', [PagesController::class, 'storeMissionPage'])->name('store-mission');

            Route::get('/programs', [PagesController::class, 'programsPage'])->name('programs');
            Route::post('/store-programs', [PagesController::class, 'storeProgramsPage'])->name('store-programs');

            Route::get('/services', [PagesController::class, 'servicesPage'])->name('services');
            Route::post('/store-services', [PagesController::class, 'storeServicesPage'])->name('store-services');

            Route::get('/clients', [PagesController::class, 'clientsPage'])->name('clients');
            Route::post('/store-clients', [PagesController::class, 'storeClientsPage'])->name('store-clients');

            Route::get('/accreditations', [PagesController::class, 'accreditationsPage'])->name('accreditations');
            Route::post('/store-accreditations', [PagesController::class, 'storeAccreditationsPage'])->name('store-accreditations');
           
            Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact');
            Route::post('/store-contact', [PagesController::class, 'storeContactPage'])->name('store-contact');

            Route::get('/webinars', [PagesController::class, 'webinarsPage'])->name('webinars');
            Route::post('/store-webinars', [PagesController::class, 'storeWebinarsPage'])->name('store-webinars');

            Route::get('/career', [PagesController::class, 'careerPage'])->name('career');
            Route::post('/store-career', [PagesController::class, 'storeCareerPage'])->name('store-career');

            Route::get('/home-training', [PagesController::class, 'homeTrainingPage'])->name('home-training');
            Route::post('/store-home-training', [PagesController::class, 'storeHomeTrainingPage'])->name('store-home-training');

            Route::get('/home-services', [PagesController::class, 'homeServicesPage'])->name('home-services');
            Route::post('/store-home-services', [PagesController::class, 'storeHomeServicesPage'])->name('store-home-services');

            Route::get('/blogs', [PagesController::class, 'blogsPage'])->name('blogs');
            Route::post('/store-blogs', [PagesController::class, 'storeBlogsPage'])->name('store-blogs');

            Route::get('/privacy', [PagesController::class, 'privacyPage'])->name('privacy');
            Route::post('/store-privacy', [PagesController::class, 'storePrivacyPage'])->name('store-privacy');

            Route::get('/terms', [PagesController::class, 'termsPage'])->name('terms');
            Route::post('/store-terms', [PagesController::class, 'storeTermsPage'])->name('store-terms');

            Route::get('/download', [PagesController::class, 'downloadPage'])->name('download');
            Route::post('/store-download', [PagesController::class, 'storeDownloadPage'])->name('store-download');

            Route::get('/certificate', [PagesController::class, 'certificatePage'])->name('certificate');
        });

        Route::resource('roles', RoleController::class);
    });
});
