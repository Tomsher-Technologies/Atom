<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Division;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Pages;
use App\Models\Career;
use App\Models\Popups;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\Services;
use App\Models\Contact;
use App\Models\SiteSettings;
use App\Models\Clients;
use App\Models\Teams;
use App\Models\Accreditations;
use App\Models\CareerApplications;
use App\Models\TrainingCategories;
use App\Models\TrainingCourses;
use App\Models\Webinars;
use App\Models\Blogs;
use App\Models\WebinarBookings;
use App\Models\CourseRegistrations;
use App\Models\Downloads;
use App\Models\DownloadUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Mail\ContactEnquiry;
use App\Mail\CareerEnquiry;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\URL;
use Storage;
use Validator;
use Mail;
use DB;
use Hash;

class FrontendController extends Controller
{

    public function loadSEO($model)
    {
        SEOTools::setTitle($model->page_title);
        OpenGraph::setTitle($model->page_title);
        TwitterCard::setTitle($model->page_title);

        if (isset($model->seo[0])) {
            SEOMeta::setTitle($model->seo[0]->seo_title ?? $model->page_title);
            SEOMeta::setDescription($model->seo[0]->seo_description);
            SEOMeta::addKeyword($model->seo[0]->keywords);

            OpenGraph::setTitle($model->seo[0]->og_title);
            OpenGraph::setDescription($model->seo[0]->og_description);
            OpenGraph::setUrl(URL::full());
            OpenGraph::addProperty('locale', 'en_US');
           
            JsonLd::setTitle($model->seo[0]->seo_title);
            JsonLd::setDescription($model->seo[0]->seo_description);
            JsonLd::setType('Page');

            TwitterCard::setTitle($model->seo[0]->twitter_title);
            TwitterCard::setSite("@atomaviation1");
            TwitterCard::setDescription($model->seo[0]->twitter_description);

            SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
        }
    }

    public function loadDynamicSEO($model)
    {
        SEOTools::setTitle($model->name);
        OpenGraph::setTitle($model->name);
        TwitterCard::setTitle($model->name);

        SEOMeta::setTitle($model->seo_title ?? $model->name);
        SEOMeta::setDescription($model->seo_description);
        SEOMeta::addKeyword($model->keywords);

        OpenGraph::setTitle($model->og_title);
        OpenGraph::setDescription($model->og_description);
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
           
        JsonLd::setTitle($model->seo_title);
        JsonLd::setDescription($model->seo_description);
        JsonLd::setType('Page');

        TwitterCard::setTitle($model->twitter_title);
        TwitterCard::setSite("@atomaviation1");
        TwitterCard::setDescription($model->twitter_description);

        SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
    }
    public function home()
    {
        $pmodal ="";
        $page = Pages::with(['seo'])->where('page_name','main_home')->first();
        $this->loadSEO($page);
        $modalcount = Popups::where('status',1)->count();
        if($modalcount > 0){
            $pmodal = Popups::where('status',1)->first();
        }
        $accr =  Accreditations::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.index',compact('page','pmodal','accr'));
    }


    public function missionVision()
    {
        $page = Pages::with(['seo'])->where('page_name','mission_vision')->first();
        $this->loadSEO($page);
        return view('frontend.mission',compact('page'));
    }

    public function clients()
    {
        $page = Pages::with(['seo'])->where('page_name','clients')->first();
        $this->loadSEO($page);
        $clients =  Clients::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.clients',compact('page','clients'));
    }

    public function accreditations()
    {
        $page = Pages::with(['seo'])->where('page_name','accreditations')->first();
        $this->loadSEO($page);
        $accreditations =  Accreditations::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.accreditations',compact('page','accreditations'));
    }
    
    public function teams()
    {
        $page = Pages::with(['seo'])->where('page_name','management')->first();
        $this->loadSEO($page);
        $teams =  Teams::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.teams',compact('page','teams'));
    }

    public function whoWeAre()
    {
        $page = Pages::with(['seo'])->where('page_name','about')->first();
        $this->loadSEO($page);
        return view('frontend.who_we_are',compact('page'));
    }

    public function careerlisting()
    {
        $page = Pages::with(['seo'])->where('page_name','career')->first();
        $this->loadSEO($page);
        $careers = Career::where('status',1)->orderBy('id','desc')->paginate(15);
        return view('frontend.careerlisting',compact('page','careers'));
    }

    public function career()
    {
        $page = Pages::with(['seo'])->where('page_name','career')->first();
        $this->loadSEO($page);
        return view('frontend.career',compact('page'));
    }
    public function storeCareer(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'description' => 'required',
            'resume' => 'required|max:500'
        ],[
            '*.required' => 'This field is required.',
            'resume.max' => "Maximum file size to upload is 500 KB.",
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() .'#job-application')->withErrors($validator)->withInput()->with([
                'error' => "Please check the error messages"
            ]);
        }

        $con = new CareerApplications;
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone_number = $request->phone;
        $con->description = $request->description;
        
        if ($request->hasFile('resume')) {
            $resume = uploadImage($request, 'resume', 'resume');
            $con->resume = $resume;
        }
        $con->save();
        $filePath = public_path($resume);

        Mail::to(env('MAIL_ADMIN'))->queue(new CareerEnquiry($con,$filePath));

        return redirect(url()->previous() .'#job-application')->with([
            'status' => "Thank you for getting in touch. Our team will contact you shortly."
        ]);
   }


    public function contact_us()
    {
        $page = Pages::with(['seo'])->where('page_name','contact')->first();
        $this->loadSEO($page);
        return view('frontend.contact',compact('page'));
    }

    public function certificate()
    {
        $page = Pages::with(['seo'])->where('page_name','certificate')->first();
        $this->loadSEO($page);
        $certificate = SiteSettings::where('type','quality_certificate')->get();
        return view('frontend.certificate',compact('page','certificate'));
    }

    public function storeContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'subject' => 'required'
        ],[
            '*.required' => 'This field is required.'
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())->withErrors($validator)->withInput();
        }

        $con                = new Contact;
        $con->name          = $request->name;
        $con->email         = $request->email;
        $con->phone_number  = $request->phone;
        $con->subject       = $request->subject;
        $con->message       = $request->message;
        $con->save();

        Mail::to(env('MAIL_ADMIN'))->queue(new ContactEnquiry($con));

        return redirect(url()->previous() .'#job-application')->with([
            'status' => "Thank you for getting in touch. Our team will contact you shortly."
        ]);
    }

    public function services_home()
    {
        $page = Pages::with(['seo'])->where('page_name','services_home')->first();
        $this->loadSEO($page);
        $services = Services::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.services_home',compact('page','services'));
    }

    public function services()
    {
        $page = Pages::with(['seo'])->where('page_name','services')->first();
        $this->loadSEO($page);
        $services = Services::where('status',1)->orderBy('sort_order','asc')->paginate(20);
        return view('frontend.services', compact('page','services'));
    }

    public function serviceDetails(Request $request)
    {
        $slug = $request->slug;
        $service = Services::where('status',1)->where('slug',$slug)->first();
        $this->loadDynamicSEO($service);
        return view('frontend.service-details',compact('service'));
    }

    public function training_home()
    {
        $page = Pages::with(['seo'])->where('page_name','training_home')->first();
        $this->loadSEO($page);
        $categories = TrainingCategories::where('status',1)->orderBy('sort_order','asc')->get();
        return view('frontend.training_home',compact('page','categories'));
    }
  
    public function trainingcategories(Request $request)
    {   $slug = $request->slug;
        $page = Pages::with(['seo'])->where('page_name','training-categories')->first();
        $this->loadSEO($page);
        $cat = TrainingCategories::where('status',1)->where('slug',$slug)->first();
        $categories = TrainingCategories::where('status',1)->where('parent_id',$cat->id)->orderBy('sort_order','asc')->paginate(15);
        return view('frontend.trainingcategories',compact('page','categories','cat'));
    }
    public function courseDetails(Request $request)
    {
        $slug = $request->slug;
        $course = TrainingCourses::with(['training_category','course_details'])->where('status',1)->where('slug',$slug)->first();
        $this->loadDynamicSEO($course);
        return view('frontend.course-details',compact('course'));
    }

    public function trainings()
    {
        $page = Pages::with(['seo'])->where('page_name','programs')->first();
        $this->loadSEO($page);
        $categories = TrainingCategories::with(['courses'])->where('status',1)->orderBy('sort_order','asc')->paginate(20);
        return view('frontend.training_categories', compact('page','categories'));
    }

    public function trainingCourses(Request $request)
    {
        $slug = $request->slug;
        $category = TrainingCategories::where('slug', $slug)->get();
        // echo '<pre>';
        // print_r($categories);
        // die;
        if(isset($category[0])){
            $courses = TrainingCourses::with(['training_category','course_details'])->where('status',1)->where('category_id',$category[0]->id)->paginate(15);
            $this->loadDynamicSEO($category[0]);
        }else{
            $courses = $category = [];
        }
       
        return view('frontend.courses',compact('courses','category'));
    }

    public function webinars()
    {
        $page = Pages::with(['seo'])->where('page_name','webinars')->first();
        $this->loadSEO($page);
        $upcoming = Webinars::where('status',1)->where('webinar_date','>',date('Y-m-d H:i:s'))->orderBy('webinar_date','desc')->get();
        $completed = Webinars::where('status',1)->where('webinar_date','<',date('Y-m-d H:i:s'))->orderBy('webinar_date','desc')->get();
        return view('frontend.webinars', compact('page','upcoming','completed'));
    }

    public function webinarDetails(Request $request)
    {
        $slug = $request->slug;
        $webinar = Webinars::where('status',1)->where('slug',$slug)->first();
        $webinar->name = $webinar->title;
       
        $this->loadDynamicSEO($webinar);
        return view('frontend.webinar_details',compact('webinar'));
    }
   
    public function blogs()
    {
        $page = Pages::with(['seo'])->where('page_name','blogs')->first();
        $this->loadSEO($page);
        $blogs = Blogs::where('status',1)->orderBy('blog_date','desc')->paginate(15);
        return view('frontend.blogs', compact('page','blogs'));
    }

    public function blogDetails(Request $request)
    {
        $slug = $request->slug;
        $blog = Blogs::where('status',1)->where('slug',$slug)->first();
        $blog->name = $blog->title;
       
        $this->loadDynamicSEO($blog);

        $previous_post = Blogs::where('status',1)->where('blog_date', '>', $blog->blog_date)->orderBy('blog_date','ASC')->first();
        $next_post = Blogs::where('status',1)->where('blog_date', '<', $blog->blog_date)->orderBy('blog_date','DESC')->first();

        return view('frontend.blog_details',compact('blog','next_post','previous_post'));
    }

    public function bookWebinar(Request $request){
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $check = WebinarBookings::where('webinar_id', $id)->where('email',$email)->get();
        
        if(!empty($check[0])){
            echo '<span style="font-weight: 700;color: orange;">You are already registered for this webinar</span>';
        }else{
            $book = new WebinarBookings;
            $book->webinar_id = $id;
            $book->name = $name;
            $book->email = $email;
            $book->phone = $phone;
            $book->save();
            echo '<span style="color: #00a659;font-weight: 700;">Successfully registered</span>';
        }
    }

    public function searchCourse(Request $request){
        $search = $category = $language = $course_type = $location = $courseid = '';
        $courseName = '';
        // DB::enableQueryLog();

        if($request->has('keyword')){
            $search = $request->keyword;
        }
        if($request->has('search')){
            $courseid = $request->search;
        }
        if($request->has('course_type')){
            $course_type = $request->course_type;
        }
        if($request->has('categories')){
            $category = $request->categories;
        }
        if($request->has('location')){
            $location = $request->location;
        }
        if($request->has('language')){
            $language = $request->language;
        }

        $query = TrainingCourses::with(['training_category'])->where('status',1);

        if($search != ''){
            $query->Where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('banner_title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('banner_content', 'LIKE', "%$search%"); 
                $query->orWhereHas('training_category', function ($query)  use($search) {
                    $query->where('training_categories.name', 'LIKE', "%$search%"); 
                });
            }); 
        }

        if($courseid){
            $query->where('id', $courseid);
            $searchCourse = TrainingCourses::find($courseid);
            $courseName = $searchCourse->name;
        }

        if($course_type){
            $query->where('course_type_id', $course_type);
        }

        if($category){
            $query->where('category_id', $category);
        }

        if($location){
            $query->where('location_id', $location);
        }

        if($language){
            $query->where('lang_id', $language);
        }
        
        $courses = $query->paginate(15);
       
        return view('frontend.search-results',compact('courseName','courseid','courses','search','category','language','course_type','location'));
    }

    public function privacy()
    {
        $page = Pages::with(['seo'])->where('page_name','privacy')->first();
        $this->loadSEO($page);
        return view('frontend.privacy',compact('page'));
    }

    public function terms()
    {
        $page = Pages::with(['seo'])->where('page_name','terms')->first();
        $this->loadSEO($page);
        return view('frontend.terms',compact('page'));
    }

    public function courseApply(Request $request)
    {
        $slug = $request->slug;
        $course = TrainingCourses::with(['training_category','course_details'])->where('status',1)->where('slug',$slug)->first();
        
        return view('frontend.course-apply',compact('course'));
    }

    public function storeCourseApply(Request $request){
        $type = $request->registration_type;
        $course_id = $request->course_id;

        $users = $request->users;
        $parent_id = 0;
        foreach ($users as $key => $user) {
            $data = [
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'job_title' => $user['job_title'],
                'company_name' => $user['company_name'],
                'course_id' => $course_id,
                'parent_id' => ($key == 0) ? 0 : $parent_id,
                'price' => $request->price,
                'message' => $request->message,
                'type' =>  $type
            ];
            
            $registration = CourseRegistrations::create($data);
            if($key == 0){
                $parent_id = $registration->id;
            }
        }
        return redirect()->back()->with('status', '<span style="color: #00a659;font-weight: 700;">Successfully registered</span>');
    }

    public function downloads()
    {
        $page = Pages::with(['seo'])->where('page_name','download')->first();
        $this->loadSEO($page);
        $downloads = Downloads::where('status',1)->orderBy('sort_order','asc')->paginate(15);
        return view('frontend.downloads',compact('page','downloads'));
    }

    public function downloadPdf(Request $request){
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $book = new DownloadUsers;
        $book->download_id = $id;
        $book->name = $name;
        $book->email = $email;
        $book->phone = $phone;
        $book->save();

        $down = Downloads::find($id);

        return $down->getFile();
          
    }

    public function autocompleteSearch(Request $request){ 
        $search = $request->get('query');
        $filterResult = [];
        if($search != ''){
            $query = TrainingCourses::where('status',1)->where('name', 'LIKE', "%$search%")->orderBy('name','ASC');
            // $query->Where(function ($query) use ($search) {
            //     $query->where('name', 'LIKE', "%$search%"); 
            //     $query->orWhereHas('training_category', function ($query)  use($search) {
            //         $query->where('training_categories.name', 'LIKE', "%$search%"); 
            //     });
            // }); 
            $filterResult = $query->get();
        }
        return response()->json($filterResult);
    }

    public function autocompleteSearchOld(Request $request){ 
        $search = $request->get('search');
        $filterResult = [];
        if($search != ''){
            $query = TrainingCourses::select("name as value", "id")->where('status',1)->where('name', 'LIKE', "%$search%");
            
            $filterResult = $query->get();
        }
        return $filterResult;
    }

    public function ajaxCourses(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $query = TrainingCourses::where('status',1)->orderBy('name','ASC');
           
            if($search){
                $query->Where(function ($query) use ($search) {
                    $query->orWhere('name', 'LIKE', "%$search%");   
                }); 
            }           
            $data = $query->get();
        }
        return response()->json($data);
    }

}
