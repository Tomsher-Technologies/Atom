<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTypes;
use App\Models\Languages;
use App\Models\TrainingCategories;
use App\Models\TrainingCourses;
use App\Models\TrainingCourseDetails;
use App\Models\CourseRegistrations;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Str;
use Artisan;

class TrainingController extends Controller
{
    public function index()
    {
        $categories = TrainingCategories::orderBy('sort_order','asc')->paginate(15);
        return view('admin.training_categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.training_categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'image' => 'required|max:500',
            'home_icon' => 'required|max:50',
            'listing_image' => 'required|max:150',
            'name' => 'required',
            'description' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'header_display' => 'required',
            'footer_display' => 'required',
        ],[
            'image.max' => 'File size should be less than 500 Kb',
            'home_icon.max' => 'File size should be less than 50 Kb',
            'listing_image.max' => 'File size should be less than 150 Kb',
            '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->name);

        $checkSlug =  TrainingCategories::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }
        
         $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'header_display'  => $request->header_display,
            'footer_display'        => $request->footer_display,
            'slug' => $slug,
            'sort_order' => $request->sort_order,
            'seo_title' => $request->seotitle,
            'og_title' => $request->ogtitle, 
            'twitter_title' => $request->twtitle, 
            'seo_description' => $request->seodescription, 
            'og_description' => $request->og_description, 
            'twitter_description' => $request->twitter_description, 
            'keywords' => $request->seokeywords
        ];
        
        $categories = TrainingCategories::create($saveData);

        $image = uploadImage($request, 'image', 'training/categories');
        $home_icon = uploadImage($request, 'home_icon', 'training/categories');
        $listing_image = uploadImage($request, 'listing_image', 'training/categories');

        $categories->image = $image;
        $categories->listing_image = $listing_image;
        $categories->home_icon = $home_icon;
        $categories->save();

        return redirect()->route('admin.training.categories')->with([
            'status' => "Category Created"
        ]);
    }

    public function show(Services $service)
    {
    }

    public function editCategory(string $id)
    {
        $category = TrainingCategories::find($id);
        return view('admin.training_categories.edit', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category = TrainingCategories::find($request->category);
        $request->validate([
            'image' => 'nullable|max:500',
            'home_icon' => 'nullable|max:50',
            'listing_image' => 'nullable|max:150',
            'name' => 'required',
            'description' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'header_display' => 'required',
            'footer_display' => 'required',
        ],[
            'image.max' => 'File size should be less than 500 Kb',
            'home_icon.max' => 'File size should be less than 50 Kb',
            'listing_image.max' => 'File size should be less than 150 Kb',
        ]);
        $name = $category->name;
        $slug = $category->slug;

        $category->name                 = $request->name;
        $category->description          = $request->description;
        $category->status               = $request->status;
        $category->header_display       = $request->header_display ?? '';
        $category->footer_display       = $request->footer_display ?? '';
        $category->sort_order           = ($request->sort_order != '') ? $request->sort_order : 0;
        $category->seo_title            = $request->seotitle;
        $category->og_title             = $request->ogtitle; 
        $category->twitter_title        = $request->twtitle;
        $category->seo_description      = $request->seodescription;
        $category->og_description       = $request->og_description;
        $category->twitter_description  = $request->twitter_description; 
        $category->keywords             = $request->seokeywords;

        if($name != $request->name){
            $slug = Str::slug($request->name);

            $checkSlug =  TrainingCategories::where('slug',$slug)->count();
            if($checkSlug == 0){
                $category->slug = $slug;
            }else{
                $category->slug = $slug.'-'.rand(1,10);
            }
        }
        
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'training/categories');
            deleteImage($category->image);
            $category->image = $image;
        }

        if ($request->hasFile('home_icon')) {
            $home_icon = uploadImage($request, 'home_icon', 'training/categories');
            deleteImage($category->home_icon);
            $category->home_icon = $home_icon;
        }

        if ($request->hasFile('listing_image')) {
            $listing_image = uploadImage($request, 'listing_image', 'training/categories');
            deleteImage($category->listing_image);
            $category->listing_image = $listing_image;
        }

        $category->save();
        Artisan::call('cache:clear');
        return redirect()->route('admin.training.categories')->with('status','Category details updated successfully');
    }

    public function destroy(Request $request)
    {
        $service = Services::find($request->service);
        $img = $service->image;
        if ($service->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.services.index')->with([
            'status' => "Service Deleted"
        ]);
    }

    public function coursesList(Request $request)
    {
        $request->session()->put('last_url', url()->full());
        $courses = TrainingCourses::with(['training_category'])->orderBy('sort_order','asc')->paginate(15);
        return view('admin.training_courses.index', compact('courses'));
    }

    public function createCourse()
    {
        $categories     = TrainingCategories::orderBy('name','asc')->get();
        $languages      = Languages::orderBy('id','asc')->get();
        $course_types   = CourseTypes::orderBy('id','asc')->get();
        // $locations      = States::orderBy('name','asc')->get();
        return view('admin.training_courses.create',compact('categories','languages','course_types'));
    }

    public function storeCourse(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'banner_title'=>'required',
            'banner_description'=>'nullable',
            'course_description'=>'nullable',
            'duration'=>'required',
            'price'=>'required',
            'language'=>'required',
            'course_type'=>'required',
            'location'=>'required',
            'banner_image'=>'required|max:500',
            'course_image'=>'required|max:300',
            ],[
                'banner_image.max' => 'File size should be less than 500 Kb',
                'course_image.max' => 'File size should be less than 300 Kb',
                '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->name);

        $checkSlug =  TrainingCourses::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }

       
        $course = new TrainingCourses;
        $course->name                   = $request->name ?? NULL;
        $course->slug                   = $slug;
        $course->category_id            = $request->category ?? NULL;
        $course->banner_title           = $request->banner_title ?? NULL;
        $course->banner_content         = $request->banner_description ?? NULL;
        $course->description            = $request->course_description ?? NULL;
        $course->duration               = $request->duration ?? NULL;
        $course->price                  = $request->price ?? 0;
        $course->video_link             = $request->video_link ?? NULL;
        $course->lang_id                = $request->language ?? NULL;
        $course->course_type_id         = $request->course_type ?? NULL;
        $course->location_id            = $request->location ?? NULL;
        $course->status                 = $request->status ?? NULL;
        $course->sort_order             = $request->sort_order ?? NULL;
        $course->seo_title              = $request->seotitle ?? NULL;
        $course->og_title               = $request->ogtitle ?? NULL;
        $course->twitter_title          = $request->twtitle ?? NULL;
        $course->seo_description        = $request->seodescription ?? NULL;
        $course->og_description         = $request->og_description ?? NULL;
        $course->twitter_description    = $request->twitter_description ?? NULL;
        $course->keywords               = $request->seokeywords ?? NULL;
        

        $banner_image = uploadImage($request, 'banner_image', 'training/courses');
        $course_image = uploadImage($request, 'course_image', 'training/courses');
        
        $course->banner_image           = $banner_image;
        $course->image                  = $course_image;
        $course->save();

        $courseId = $course->id;

        if($request->has('additional')){
            $additional = $request->additional;
            $additionalData = array();
            foreach($additional as $add){
                $additionalData[] = [
                    'course_id' => $courseId,
                    'title' => $add['title'],
                    'description' => $add['content']
                ];
            }
            if(!empty($additionalData)){
                TrainingCourseDetails::insert($additionalData);
            }
        }

        return redirect()->route('admin.training.courses')->with([
            'status' => "Course Created"
        ]);
    }

    public function editCourse(string $id)
    {
        $course = TrainingCourses::with(['course_details','location'])->find($id);

        $details = [];
        if(!empty($course->course_details)){
            foreach ($course->course_details as $ss) {
                $arr = [];
                $arr['title']       = $ss->title ?? '';
                $arr['content']     = $ss->description ?? '';
                $details[] = $arr;
            }
        }
       
        $course_details = json_encode($details);
        $categories     = TrainingCategories::orderBy('name','asc')->get();
        $languages      = Languages::orderBy('id','asc')->get();
        $course_types   = CourseTypes::orderBy('id','asc')->get();
        return view('admin.training_courses.edit', compact('course','course_details','categories','languages','course_types'));
    }

    public function updateCourse(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'banner_title'=>'required',
            'banner_description'=>'nullable',
            'course_description'=>'nullable',
            'duration'=>'required',
            'price'=>'required',
            'language'=>'required',
            'course_type'=>'required',
            'location'=>'required',
            'banner_image'=>'nullable|max:500',
            'course_image'=>'nullable|max:300',
            ],[
                'banner_image.max' => 'File size should be less than 500 Kb',
                'course_image.max' => 'File size should be less than 300 Kb',
                '*.required' => 'This field is required'
        ]);

        $course = TrainingCourses::find($request->course);
        $course_name = $course->name;


        if($course_name != $request->name){
            $slug = Str::slug($request->name);
            $checkSlug =  TrainingCourses::where('slug',$slug)->count();
            if($checkSlug == 0){
                $course->slug = $slug;
            }else{
                $course->slug = $slug.'-'.rand(1,10);
            }
        }

        $course->name                   = $request->name ?? NULL;
        $course->category_id            = $request->category ?? NULL;
        $course->banner_title           = $request->banner_title ?? NULL;
        $course->banner_content         = $request->banner_description ?? NULL;
        $course->description            = $request->course_description ?? NULL;
        $course->duration               = $request->duration ?? NULL;
        $course->price                  = $request->price ?? 0;
        $course->video_link             = $request->video_link ?? NULL;
        $course->lang_id                = $request->language ?? NULL;
        $course->course_type_id         = $request->course_type ?? NULL;
        $course->location_id            = $request->location ?? NULL;
        $course->status                 = $request->status ?? NULL;
        $course->sort_order             = ($request->sort_order != '') ? $request->sort_order : 0;
        $course->seo_title              = $request->seotitle ?? NULL;
        $course->og_title               = $request->ogtitle ?? NULL;
        $course->twitter_title          = $request->twtitle ?? NULL;
        $course->seo_description        = $request->seodescription ?? NULL;
        $course->og_description         = $request->og_description ?? NULL;
        $course->twitter_description    = $request->twitter_description ?? NULL;
        $course->keywords               = $request->seokeywords ?? NULL;
        
        if ($request->hasFile('banner_image')) {
            $image = uploadImage($request, 'banner_image', 'training/courses');
            deleteImage($course->banner_image);
            $course->banner_image = $image;
        }

        if ($request->hasFile('course_image')) {
            $image = uploadImage($request, 'course_image', 'training/courses');
            deleteImage($course->image);
            $course->image = $image;
        }

        $course->save();

        $courseId = $course->id;
        TrainingCourseDetails::where('course_id', $courseId)->delete();

        if($request->has('additional')){
            $additional = $request->additional;
            $additionalData = array();
            foreach($additional as $add){
                if($add['title'] != '' || $add['content'] != ''){
                    $additionalData[] = [
                        'course_id' => $courseId,
                        'title' => $add['title'],
                        'description' => $add['content']
                    ];
                }
            }
            if(!empty($additionalData)){
                TrainingCourseDetails::insert($additionalData);
            }
        }

        return redirect()->route('admin.training.courses')->with([
            'status' => "Course details updated"
        ]);
    }

    public function courseBookingLists(string $id){
        $course = TrainingCourses::find($id);
        $bookings = CourseRegistrations::with(['children','course'])
                                        ->where('course_id', $id)
                                        ->where('parent_id', 0)->orderBy('id','desc')->paginate(15);

        return view('admin.training_courses.bookings', compact('bookings','course'));
    }
}
