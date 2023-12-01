<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/clients', [FrontendController::class, 'clients'])->name('clients');
Route::get('/mission-vision', [FrontendController::class, 'missionVision'])->name('mission-vision');
Route::get('/who-we-are', [FrontendController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/career', [FrontendController::class, 'career'])->name('career');
Route::post('/store-career', [FrontendController::class, 'storeCareer'])->name('store-career');
Route::get('/contact-us', [FrontendController::class, 'contact_us'])->name('contact');
Route::post('/store-contact', [FrontendController::class, 'storeContact'])->name('store-contact');
Route::get('/consultancy-services', [FrontendController::class, 'services_home'])->name('consultancy-services');
Route::get('/training-courses', [FrontendController::class, 'training_home'])->name('training-courses');

Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('service-details');

Route::get('/trainings', [FrontendController::class, 'trainings'])->name('trainings');
Route::get('/trainings/{slug}', [FrontendController::class, 'trainingCourses'])->name('courses');
Route::get('/course/{slug}', [FrontendController::class, 'courseDetails'])->name('course-details');

Route::get('/webinars', [FrontendController::class, 'webinars'])->name('webinars');
Route::get('/webinar/{slug}', [FrontendController::class, 'webinarDetails'])->name('webinar-details');
Route::post('/webinar-book', [FrontendController::class, 'bookWebinar'])->name('webinar-book');

Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog-details');


Route::get('/search-course', [FrontendController::class, 'searchCourse'])->name('search-course');


include_once('admin.php');
