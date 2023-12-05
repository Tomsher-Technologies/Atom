<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\GeneralSettings;
use App\Models\SiteSettings;
use App\Models\HeritageLists;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Faq;
use App\Models\CareerApplications;
use App\Models\TrainingCourses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Artisan;

class PagesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page_settings', ['only' => ['homePage','storeHomePage','aboutPage','storeAboutPage','missionPage','storeMissionPage', 'messagePage','storeMessagePage','contactPage','storeContactPage','heritagePage','storeHeritagePage','newsPage','storeNewsPage','careerPage','storeCareerPage']]);

         $this->middleware('permission:enquiries', ['only' => ['enquiries']]);

         $this->middleware('permission:general_settings', ['only' => ['generalSettings']]);
    }
    
    public function homePage()
    {
        $data = Pages::with(['seo'])->where('page_name','main_home')->first();
        $courses = TrainingCourses::orderBy('name','asc')->where('status',1)->get();
        return view('admin.pages.home',compact('data','courses'));
    }

    public function storeHomePage(Request $request)
    {
        $request->validate([
                        'popular_title' => 'required',
                        'popular_sub_title' => 'required',
                        'courses' => 'required',
                        'training_title' => 'required',
                        'training_content' => 'required',
                        'training_btn_text' => 'required',
                        'service_title' => 'required',
                        'service_content' => 'required',
                        'service_btn_text' => 'required',
                        'training_image' => 'nullable|max:300',
                        'service_image' => 'nullable|max:300',
                        'image3' => 'nullable|max:10',
                        'image4' => 'nullable|max:10',
                        'image5' => 'nullable|max:10',
                        'heading3' => 'required',
                        'content3' => 'required',
                        'heading4' => 'required',
                        'heading5' => 'required',
                        'heading6' => 'required',
                        'heading7' => 'required',
                        'heading8' => 'required'
                    ],[
                        '*.required' => 'This field is required.',
                        'training_image.max' => "Maximum file size to upload is 300 KB.",
                        'service_image.max' => "Maximum file size to upload is 300 KB.",
                        'image3.max' => "Maximum file size to upload is 10 KB.",
                        'image4.max' => "Maximum file size to upload is 10 KB.",
                        'image5.max' => "Maximum file size to upload is 10 KB.",
                    ]);
        $data = [
                'page_title'            => 'Main Home Page',
                'page_name'             => 'main_home',
                'title'                 => $request->popular_title,
                'sub_title'             => $request->popular_sub_title,
                'courses'               => $request->courses ? json_encode($request->courses) : NULL,
                'heading1'              => $request->training_title,
                'content1'              => $request->training_content,
                'heading2'              => $request->service_title,
                'content2'              => $request->service_content,
                'heading3'              => $request->heading3,
                'content3'              => $request->content3,
                'heading4'              => $request->heading4,
                'heading5'              => $request->heading5,
                'heading6'              => $request->heading6,
                'heading7'              => $request->heading7,
                'heading8'              => $request->heading8,
                'btn_text1'             => $request->training_btn_text,
                'btn_text2'             => $request->service_btn_text,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
            ];
      

        $pageData = Pages::where('page_name','main_home')->first();
        if ($request->hasFile('training_image')) {
            $image = uploadImage($request, 'training_image', 'pages/main_home');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
        if ($request->hasFile('service_image')) {
            $image = uploadImage($request, 'service_image', 'pages/main_home');
            deleteImage($pageData->image2);
            $data['image2'] = $image;
        }

        if ($request->hasFile('image3')) {
            $image = uploadImage($request, 'image3', 'pages/main_home');
            deleteImage($pageData->image3);
            $data['image3'] = $image;
        }

        if ($request->hasFile('image4')) {
            $image = uploadImage($request, 'image4', 'pages/main_home');
            deleteImage($pageData->image4);
            $data['image4'] = $image;
        }

        if ($request->hasFile('image5')) {
            $image = uploadImage($request, 'image5', 'pages/main_home');
            deleteImage($pageData->image5);
            $data['image5'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Home page details updated"
        ]);
    }

    public function savePageSettings($data){
        $image_array = array();
        $updateData = array( 
            'page_title'    => isset($data['page_title']) ? $data['page_title'] : NULL,
            'page_name'     => isset($data['page_name']) ? $data['page_name'] : NULL,
            'title'         => isset($data['title']) ? $data['title'] : NULL,
            'sub_title'     => isset($data["sub_title"]) ?  $data["sub_title"] : NULL,
            'description'   => isset($data["description"]) ? $data["description"] : NULL,
            'courses'       => isset($data["courses"]) ? $data["courses"] : NULL,
            'heading1'      => isset($data["heading1"]) ? $data["heading1"] : NULL,
            'content1'      => isset($data['content1']) ? $data['content1'] : NULL,
            'heading2'      => isset($data["heading2"]) ? $data["heading2"] : NULL,
            'content2'      => isset($data['content2']) ? $data['content2'] : NULL,
            'heading3'      => isset($data["heading3"]) ? $data["heading3"] : NULL,
            'content3'      => isset($data['content3']) ? $data['content3'] : NULL,
            'heading4'      => isset($data["heading4"]) ? $data["heading4"] : NULL,
            'content4'      => isset($data['content4']) ? $data['content4'] : NULL,
            'heading5'      => isset($data["heading5"]) ? $data["heading5"] : NULL,
            'content5'      => isset($data['content5']) ? $data['content5'] : NULL,
            'heading6'      => isset($data["heading6"]) ? $data["heading6"] : NULL,
            'content6'      => isset($data['content6']) ? $data['content6'] : NULL,
            'heading7'      => isset($data["heading7"]) ? $data["heading7"] : NULL,
            'content7'      => isset($data['content7']) ? $data['content7'] : NULL,
            'heading8'      => isset($data["heading8"]) ? $data["heading8"] : NULL,
            'content8'      => isset($data['content8']) ? $data['content8'] : NULL,
            'heading9'      => isset($data["heading9"]) ? $data["heading9"] : NULL,
            'content9'      => isset($data['content9']) ? $data['content9'] : NULL,
            'heading10'     => isset($data["heading10"]) ? $data["heading10"] : NULL,
            'content10'    => isset($data['content10']) ? $data['content10'] : NULL,
            'heading11'     => isset($data["heading11"]) ? $data["heading11"] : NULL,
            'content11'    => isset($data['content11']) ? $data['content11'] : NULL,
            'button_link_1' => isset($data['button_link_1']) ? $data['button_link_1'] : NULL,
            'button_link_2' => isset($data['button_link_2']) ? $data['button_link_2'] : NULL,
            'video_link'    => isset($data['video_link']) ? $data['video_link'] : NULL,
            'btn_text1'     => isset($data["btn_text1"]) ? $data["btn_text1"] : NULL,
            'btn_text2'     => isset($data["btn_text2"]) ? $data["btn_text2"] : NULL,
        );

        if(isset($data['image1']) ){
            $updateData['image1'] = $data['image1'] ?? NULL;
        }
        if(isset($data['image2']) ){
            $updateData['image2'] = $data['image2'] ?? NULL;
        }
        if(isset($data['image3']) ){
            $updateData['image3'] = $data['image3'] ?? NULL;
        }      
        if(isset($data['image4']) ){
            $updateData['image4'] = $data['image4'] ?? NULL;
        }
        if(isset($data['image6']) ){
            $updateData['image6'] = $data['image6'] ?? NULL;
        }
        if(isset($data['image5']) ){
            $updateData['image5'] = $data['image5'] ?? NULL;
        }

        if(isset($data['image7']) ){
            $updateData['image7'] = $data['image7'] ?? NULL;
        }

        if(isset($data['image8']) ){
            $updateData['image8'] = $data['image8'] ?? NULL;
        }

        if(isset($data['image9']) ){
            $updateData['image9'] = $data['image9'] ?? NULL;
        }
        if(isset($data['image10']) ){
            $updateData['image10'] = $data['image10'] ?? NULL;
        }
       
        $page = Pages::updateOrCreate([
                    'page_name'   => $data['page_name'],
                ],$updateData);
          
        $seo_Array = array(
                        'seo_title'             => isset($data["seotitle"]) ? $data["seotitle"] : NULL,
                        'og_title'              => isset($data["ogtitle"]) ? $data["ogtitle"] : NULL,
                        'twitter_title'         => isset($data["twtitle"]) ?  $data["twtitle"] : NULL,
                        'seo_description'       => isset($data["seodescription"]) ? $data["seodescription"] : NULL,
                        'og_description'        => isset($data["og_description"]) ? $data["og_description"] : NULL,
                        'twitter_description'   => isset($data["twitter_description"]) ? $data["twitter_description"] : NULL,
                        'keywords'              => isset($data["seokeywords"]) ? $data["seokeywords"] : NULL,
                    ); 
        $seo = PageSeos::updateOrCreate([
                    'page_id'   => $page->id,
                ],$seo_Array);
    }

    public function aboutPage()
    {
        $data = Pages::with(['seo'])->where('page_name','about')->first();
      
        return view('admin.pages.about-us',compact('data'));
    }

    public function storeAboutPage(Request $request)
    {
    
        $request->validate([
                    'banner_title' => 'required',
                    'banner_sub_title' => 'required',
                    'banner_content' => 'required',
                    'heading1' => 'required',
                    'content1' => 'required',
                    'heading2' => 'required',
                    'heading3' => 'required',
                    'btn_text1' => 'required',
                    'button_link_1' => 'required',
                    'video_link' => 'nullable|max:6144',
                    'heading4' => 'required',
                    'content4' => 'required',
                    'btn_text2' => 'required',
                    'button_link_2' => 'required',
                
                    'banner_image' => 'nullable|max:200',
                    'big_image' => 'nullable|max:100',
                    'small_image' => 'nullable|max:100',
                    'video_image' => 'nullable|max:100'
                ],[
                    '*.required' => 'This field is required.',
                    'banner_image.max' => "Maximum file size to upload is 200 KB.",
                    'big_image.max' => "Maximum file size to upload is 100 KB.",
                    'small_image.max' => "Maximum file size to upload is 100 KB.",
                    'video_image.max' => "Maximum file size to upload is 100 KB.",
                    'video_link.max' => "Maximum file size to upload is 6 MB."
                ]);

        $points = json_encode(array());
        if($request->has('additional')){
            $additional = $request->additional;
            $additionalData = array();
            $i = 0;
            foreach($additional as $add){
                if($add['title'] != ''){
                    $additionalData[$i]['title'] = $add['title'];
                }
                $i++;
            }
            if(!empty($additionalData)){
                $points = json_encode($additionalData);
            }
        }

        $data = [
                'page_title'            => 'About/Who We Are',
                'page_name'             => 'about',
                'title'                 => $request->banner_title,
                'sub_title'             => $request->banner_sub_title,
                'description'           => $request->banner_content,
                'courses'               => $points,
                'heading1'              => $request->heading1,
                'content1'              => $request->content1,
                'heading2'              => $request->heading2,
                'heading3'              => $request->heading3,
                'heading4'              => $request->heading4,
                'content4'              => $request->content4,
                'btn_text1'             => $request->btn_text1,
                'button_link_1'         => $request->button_link_1,
                'btn_text2'             => $request->btn_text2,
                'button_link_2'         => $request->button_link_2,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
            ];

        $pageData = Pages::where('page_name','about')->first();
        if ($request->hasFile('banner_image')) {
            $image = uploadImage($request, 'banner_image', 'pages/about');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        if ($request->hasFile('big_image')) {
            $image = uploadImage($request, 'big_image', 'pages/about');
            deleteImage($pageData->image2);
            $data['image2'] = $image;
        }

        if ($request->hasFile('small_image')) {
            $image = uploadImage($request, 'small_image', 'pages/about');
            deleteImage($pageData->image3);
            $data['image3'] = $image;
        }

        if ($request->hasFile('video_image')) {
            $image = uploadImage($request, 'video_image', 'pages/about');
            deleteImage($pageData->image4);
            $data['image4'] = $image;
        }

        if ($request->hasFile('video_link')) {
           
            $video_link = uploadImage($request, 'video_link', 'pages/about');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }else{
            $data['video_link'] = $pageData->video_link;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function missionPage()
    {
        $data = Pages::with(['seo'])->where('page_name','mission_vision')->first();
      
        return view('admin.pages.mission_vision',compact('data'));
    }

    public function storeMissionPage(Request $request)
    {
    
        $request->validate([
                    'banner_title' => 'required',
                    'banner_sub_title' => 'required',
                    'heading1' => 'required',
                    'content1' => 'required',
                    'heading2' => 'required',
                    'heading3' => 'required',
                    'btn_text1' => 'required',
                    'button_link_1' => 'required',
                    'video_link' => 'nullable|max:6144',
                    'heading4' => 'required',
                    'content4' => 'required',
                    
                    'banner_image' => 'nullable|max:200',
                    'mission_image' => 'nullable|max:100',
                    'vision_image' => 'nullable|max:100',
                    'video_image' => 'nullable|max:100'
                ],[
                    '*.required' => 'This field is required.',
                    'banner_image.max' => "Maximum file size to upload is 200 KB.",
                    'mission_image.max' => "Maximum file size to upload is 100 KB.",
                    'vision_image.max' => "Maximum file size to upload is 100 KB.",
                    'video_image.max' => "Maximum file size to upload is 100 KB.",
                    'video_link.max' => "Maximum file size to upload is 6 MB."
                ]);


        $data = [
                'page_title'            => 'Mission & Vision',
                'page_name'             => 'mission_vision',
                'title'                 => $request->banner_title,
                'sub_title'             => $request->banner_sub_title,
                'heading1'              => $request->heading1,
                'content1'              => $request->content1,
                'heading2'              => $request->heading2,
                'heading3'              => $request->heading3,
                'heading4'              => $request->heading4,
                'content4'              => $request->content4,
                'btn_text1'             => $request->btn_text1,
                'button_link_1'         => $request->button_link_1,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
            ];

        $pageData = Pages::where('page_name','mission_vision')->first();
        if ($request->hasFile('banner_image')) {
            $image = uploadImage($request, 'banner_image', 'pages/mission');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        if ($request->hasFile('mission_image')) {
            $image = uploadImage($request, 'mission_image', 'pages/mission');
            deleteImage($pageData->image2);
            $data['image2'] = $image;
        }

        if ($request->hasFile('vision_image')) {
            $image = uploadImage($request, 'vision_image', 'pages/mission');
            deleteImage($pageData->image3);
            $data['image3'] = $image;
        }
        if ($request->hasFile('video_image')) {
            $image = uploadImage($request, 'video_image', 'pages/about');
            deleteImage($pageData->image4);
            $data['image4'] = $image;
        }

        if ($request->hasFile('video_link')) {
           
            $video_link = uploadImage($request, 'video_link', 'pages/mission');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }else{
            $data['video_link'] = $pageData->video_link;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function generalSettings(Request $request){
        return view('admin.pages.settings');
    }

    public function storeSettings(Request $request)
    {
        $data = $request->all();
        foreach ($request->types as $key => $type) {
            SiteSettings::updateOrCreate([
                'type' => $type
            ], [
                'value' =>  $request[$type]
            ]);
        }

        Artisan::call('cache:clear');
        return redirect()->back()->with(['status' => "Details updated"]);
    }

    public function storeHeaderSettings(Request $request)
    {
        $data = $request->all();
        foreach ($request->types as $key => $type) {

            if($type == 'about_image'){
                if ($request->hasFile('about_image')) {
                    $image = uploadImage($request, 'about_image', 'settings');
                    $value = $image;
                }else{
                    $value = get_setting_value('about_image');
                }
            }else{
                $value = $request[$type];
            }

            SiteSettings::updateOrCreate([
                'type' => $type
            ], [
                'value' =>  $value
            ]);
        }

        Artisan::call('cache:clear');
        return redirect()->back()->with(['status' => "Details updated"]);
    }

    public function clientsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','clients')->first();
      
        return view('admin.pages.clients',compact('data'));
    }

    public function storeClientsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required',
                        'heading1' => 'required',
                        'image' => 'nullable|max:200'
                    ],[
                        '*.required' => 'This field is required.',
                        'image.max' => "Maximum file size to upload is 200 KB.",
                    ]);
        $data = [
                'page_title'            => 'Clients',
                'page_name'             => 'clients',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                'heading1'              => $request->heading1,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','clients')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/clients');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function contactPage()
    {
        $data = Pages::with(['seo'])->where('page_name','contact')->first();
        $address = Address::orderBy('id','asc')->get();
        return view('admin.pages.contact',compact('data','address'));
    }

    public function storeContactPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'heading1' => 'required',
                        'content1' => 'nullable',
                        'heading2' => 'required',
                        'content2' => 'nullable',
                        'heading3' => 'required',
                        'content3' => 'nullable',
                    ],[
                        '*.required' => 'This field is required.'
                    ]);
        $data = [
                'page_title'            => 'Contact Us',
                'page_name'             => 'contact',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'heading1'              => $request->heading1,
                'content1'              => $request->content1,
                'heading2'              => $request->heading2,
                'content2'              => $request->content2,
                'heading3'              => $request->heading3,
                'content3'              => $request->content3,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];
        
        $this->savePageSettings($data);
       
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function newsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','news')->first();
      
        return view('admin.pages.news',compact('data'));
    }

    public function storeNewsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'ar_title' => 'required',
                        'image1' => 'nullable|max:2048'
                    ],[
                        '*.required' => 'This field is required.',
                        '*.max' => "Maximum file size to upload is 2MB."
                    ]);
        $data = [
                'page_title'        => 'News',
                'page_name'        => 'news',
                'title'             => $request->title,
                'ar_title'             => $request->ar_title,
                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','news')->first();
        if ($request->hasFile('image1')) {
            $image = uploadImage($request, 'image1', 'pages/message');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
       
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function careerPage()
    {
        $data = Pages::with(['seo'])->where('page_name','career')->first();
      
        return view('admin.pages.career',compact('data'));
    }

    public function storeCareerPage(Request $request)
    {
        $request->validate([
                    'title' => 'required',
                    'sub_title' => 'required',
                    'description' => 'required',
                    'heading1' => 'required',
                    'content1' => 'required',
                    'image' => 'nullable|max:200'
                ],[
                    '*.required' => 'This field is required.',
                    'image.max' => "Maximum file size to upload is 200 KB.",
                ]);
        $data = [
            'page_title'            => 'Career',
            'page_name'             => 'career',
            'title'                 => $request->title,
            'sub_title'             => $request->sub_title,
            'description'           => $request->description,
            'heading1'              => $request->heading1,
            'content1'              => $request->content1,
            'seotitle'              => $request->seotitle,
            'ogtitle'               => $request->ogtitle,
            'twtitle'               => $request->twtitle,
            'seodescription'        => $request->seodescription, 
            'og_description'        => $request->og_description,
            'twitter_description'   => $request->twitter_description,
            'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','career')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/career');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
        
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function webinarsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','webinars')->first();
      
        return view('admin.pages.webinars',compact('data'));
    }

    public function storeWebinarsPage(Request $request)
    {
        $request->validate([
                    'title' => 'required',
                    'sub_title' => 'required',
                    'description' => 'required',
                    'heading1' => 'required',
                    'content1' => 'required',
                    'heading2' => 'required',
                    'content2' => 'required',
                    'image' => 'nullable|max:200'
                ],[
                    '*.required' => 'This field is required.',
                    'image.max' => "Maximum file size to upload is 200 KB.",
                ]);
        $data = [
            'page_title'            => 'Webinars',
            'page_name'             => 'webinars',
            'title'                 => $request->title,
            'sub_title'             => $request->sub_title,
            'description'           => $request->description,
            'heading1'              => $request->heading1,
            'content1'              => $request->content1,
            'heading2'              => $request->heading2,
            'content2'              => $request->content2,
            'seotitle'              => $request->seotitle,
            'ogtitle'               => $request->ogtitle,
            'twtitle'               => $request->twtitle,
            'seodescription'        => $request->seodescription, 
            'og_description'        => $request->og_description,
            'twitter_description'   => $request->twitter_description,
            'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','webinars')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/webinars');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
        
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function programsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','programs')->first();
      
        return view('admin.pages.programs',compact('data'));
    }

    public function storeProgramsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required',
                        
                        'image' => 'nullable|max:200'
                    ],[
                        '*.required' => 'This field is required.',
                        'image.max' => "Maximum file size to upload is 200 KB.",
                    ]);
        $data = [
                'page_title'            => 'Programs',
                'page_name'             => 'programs',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                // 'heading1'              => $request->heading1,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','programs')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/programs');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function servicesPage()
    {
        $data = Pages::with(['seo'])->where('page_name','services')->first();
      
        return view('admin.pages.services',compact('data'));
    }

    public function storeServicesPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required',
                        'image' => 'nullable|max:200'
                    ],[
                        '*.required' => 'This field is required.',
                        'image.max' => "Maximum file size to upload is 200 KB.",
                    ]);
        $data = [
                'page_title'            => 'Services',
                'page_name'             => 'services',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                // 'heading1'              => $request->heading1,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','services')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/services');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function enquiries(){
        $query = Contact::latest();
        $contact = $query->paginate(20);

        return view('admin.contact.index', compact('contact'));
    }

    public function enquiriesCareer(){
        $query = CareerApplications::latest();
        $career = $query->paginate(20);

        return view('admin.contact.career', compact('career'));
    }

    public function homeTrainingPage()
    {
        $data = Pages::with(['seo'])->where('page_name','training_home')->first();
        $courses = TrainingCourses::orderBy('name','asc')->get();
        return view('admin.pages.home_training',compact('data','courses'));
    }

    public function storeHomeTrainingPage(Request $request){
        
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'btn_text1' => 'required',
            'button_link_1' => 'required',
            'heading1' => 'required',
            'heading2' => 'required',
            'heading3' => 'required',
            'heading4' => 'required',
            'heading5' => 'required',
            'heading6' => 'required',
            'image1' => 'nullable|max:200',
            'image2' => 'nullable|max:100',
            'image3' => 'nullable|max:100',
            'image4' => 'nullable|max:200',
            'image5' => 'nullable|max:50',
            'image6' => 'nullable|max:10',
            'image7' => 'nullable|max:10',
            'image8' => 'nullable|max:10',
            'image9' => 'nullable|max:10',
            'video_link' => 'nullable|max:6144',
            'video_image' => 'nullable|max:100'

        ],[
            '*.required' => 'This field is required.',
            'image1.max' => "Maximum file size to upload is 200 KB.",
            'image2.max' => "Maximum file size to upload is 100 KB.",
            'image3.max' => "Maximum file size to upload is 100 KB.",
            'image4.max' => "Maximum file size to upload is 200 KB.",
            'image5.max' => "Maximum file size to upload is 50 KB.",
            'image6.max' => "Maximum file size to upload is 10 KB.",
            'image7.max' => "Maximum file size to upload is 10 KB.",
            'image8.max' => "Maximum file size to upload is 10 KB.",
            'image9.max' => "Maximum file size to upload is 10 KB.",
            'video_image.max' => "Maximum file size to upload is 100 KB.",
            'video_link.max' => "Maximum file size to upload is 6 MB."

        ]);


        $data = [
            'page_title'            => 'Training - Home',
            'page_name'             => 'training_home',
            'title'                 => $request->title,
            'sub_title'             => $request->sub_title,
            'description'           => $request->description,
            'heading1'              => $request->heading1,
            'content1'              => $request->content1,
            'heading2'              => $request->heading2,
            'content2'              => $request->content2,
            'heading3'              => $request->heading3,
            'heading4'              => $request->heading4,
            'content4'              => $request->content4,
            'heading5'              => $request->heading5,
            'content5'              => $request->content5,
            'heading6'              => $request->heading6,
            'content6'              => $request->content6,
            'heading7'              => $request->heading7,
            'content7'              => $request->content7,
            'heading8'              => $request->heading8,
            'content8'              => $request->content8,
            'heading9'              => $request->heading9,
            'content9'              => $request->content9,
            'heading10'             => $request->heading10,
            'content10'             => $request->content10,
            'btn_text1'             => $request->btn_text1,
            'button_link_1'         => $request->button_link_1,
            'btn_text2'             => $request->btn_text2,
            'button_link_2'         => $request->button_link_2,
            'courses'               => $request->courses ? json_encode($request->courses) : json_encode(array()),
            'seotitle'              => $request->seotitle,
            'ogtitle'               => $request->ogtitle,
            'twtitle'               => $request->twtitle,
            'seodescription'        => $request->seodescription, 
            'og_description'        => $request->og_description,
            'twitter_description'   => $request->twitter_description,
            'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','training_home')->first();

        if ($request->hasFile('image1')) {
            $image1 = uploadImage($request, 'image1', 'pages/training_home');
            deleteImage($pageData->image1);
            $data['image1'] = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = uploadImage($request, 'image2', 'pages/training_home');
            deleteImage($pageData->image2);
            $data['image2'] = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = uploadImage($request, 'image3', 'pages/training_home');
            deleteImage($pageData->image3);
            $data['image3'] = $image3;
        }

        if ($request->hasFile('image4')) {
            $image4 = uploadImage($request, 'image4', 'pages/training_home');
            deleteImage($pageData->image4);
            $data['image4'] = $image4;
        }

        if ($request->hasFile('image5')) {
            $image5 = uploadImage($request, 'image5', 'pages/training_home');
            deleteImage($pageData->image5);
            $data['image5'] = $image5;
        }

        if ($request->hasFile('image6')) {
            $image6 = uploadImage($request, 'image6', 'pages/training_home');
            deleteImage($pageData->image6);
            $data['image6'] = $image6;
        }
        
        if ($request->hasFile('image7')) {
            $image7 = uploadImage($request, 'image7', 'pages/training_home');
            deleteImage($pageData->image7);
            $data['image7'] = $image7;
        }

        if ($request->hasFile('image8')) {
            $image8 = uploadImage($request, 'image8', 'pages/training_home');
            deleteImage($pageData->image8);
            $data['image8'] = $image8;
        }
        
        if ($request->hasFile('image9')) {
            $image9 = uploadImage($request, 'image9', 'pages/training_home');
            deleteImage($pageData->image9);
            $data['image9'] = $image9;
        }

        if ($request->hasFile('video_image')) {
            $image = uploadImage($request, 'video_image', 'pages/training_home');
            deleteImage($pageData->image10);
            $data['image10'] = $image;
        }

        if ($request->hasFile('video_link')) {
           
            $video_link = uploadImage($request, 'video_link', 'pages/training_home');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }else{
            $data['video_link'] = $pageData->video_link;
        }


        $this->savePageSettings($data);
       
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function homeServicesPage()
    {
        $data = Pages::with(['seo'])->where('page_name','services_home')->first();
        return view('admin.pages.home_services',compact('data'));
    }

    public function storeHomeServicesPage(Request $request){
        
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'btn_text1' => 'required',
            'button_link_1' => 'required',
            'heading1' => 'required',
            'heading2' => 'required',
            'heading4' => 'required',
            'heading5' => 'required',
            'heading6' => 'required',
            'image1' => 'nullable|max:200',
            'image2' => 'nullable|max:100',
            'image3' => 'nullable|max:100',
            'image6' => 'nullable|max:10',
            'image7' => 'nullable|max:10',
            'image8' => 'nullable|max:10',
            'image9' => 'nullable|max:10',
            'video_link' => 'nullable|max:6144',
            'video_image' => 'nullable|max:100'

        ],[
            '*.required' => 'This field is required.',
            'image1.max' => "Maximum file size to upload is 200 KB.",
            'image2.max' => "Maximum file size to upload is 100 KB.",
            'image3.max' => "Maximum file size to upload is 100 KB.",
            'image6.max' => "Maximum file size to upload is 10 KB.",
            'image7.max' => "Maximum file size to upload is 10 KB.",
            'image8.max' => "Maximum file size to upload is 10 KB.",
            'image9.max' => "Maximum file size to upload is 10 KB.",
            'video_image.max' => "Maximum file size to upload is 100 KB.",
            'video_link.max' => "Maximum file size to upload is 6 MB."

        ]);


        $data = [
            'page_title'            => 'Services - Home',
            'page_name'             => 'services_home',
            'title'                 => $request->title,
            'sub_title'             => $request->sub_title,
            'description'           => $request->description,
            'heading1'              => $request->heading1,
            'content1'              => $request->content1,
            'heading2'              => $request->heading2,
            'content2'              => $request->content2,
            'heading4'              => $request->heading4,
            'content4'              => $request->content4,
            'heading5'              => $request->heading5,
            'content5'              => $request->content5,
            'heading6'              => $request->heading6,
            'content6'              => $request->content6,
            'heading7'              => $request->heading7,
            'content7'              => $request->content7,
            'heading8'              => $request->heading8,
            'content8'              => $request->content8,
            'heading9'              => $request->heading9,
            'content9'              => $request->content9,
            'heading10'             => $request->heading10,
            'content10'             => $request->content10,
            'btn_text1'             => $request->btn_text1,
            'button_link_1'         => $request->button_link_1,
            'btn_text2'             => $request->btn_text2,
            'button_link_2'         => $request->button_link_2,
            'seotitle'              => $request->seotitle,
            'ogtitle'               => $request->ogtitle,
            'twtitle'               => $request->twtitle,
            'seodescription'        => $request->seodescription, 
            'og_description'        => $request->og_description,
            'twitter_description'   => $request->twitter_description,
            'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','services_home')->first();

        if ($request->hasFile('image1')) {
            $image1 = uploadImage($request, 'image1', 'pages/services_home');
            deleteImage($pageData->image1);
            $data['image1'] = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = uploadImage($request, 'image2', 'pages/services_home');
            deleteImage($pageData->image2);
            $data['image2'] = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = uploadImage($request, 'image3', 'pages/services_home');
            deleteImage($pageData->image3);
            $data['image3'] = $image3;
        }

        if ($request->hasFile('image6')) {
            $image6 = uploadImage($request, 'image6', 'pages/services_home');
            deleteImage($pageData->image6);
            $data['image6'] = $image6;
        }
        
        if ($request->hasFile('image7')) {
            $image7 = uploadImage($request, 'image7', 'pages/services_home');
            deleteImage($pageData->image7);
            $data['image7'] = $image7;
        }

        if ($request->hasFile('image8')) {
            $image8 = uploadImage($request, 'image8', 'pages/services_home');
            deleteImage($pageData->image8);
            $data['image8'] = $image8;
        }
        
        if ($request->hasFile('image9')) {
            $image9 = uploadImage($request, 'image9', 'pages/services_home');
            deleteImage($pageData->image9);
            $data['image9'] = $image9;
        }

        if ($request->hasFile('video_image')) {
            $image = uploadImage($request, 'video_image', 'pages/services_home');
            deleteImage($pageData->image4);
            $data['image4'] = $image;
        }

        if ($request->hasFile('video_link')) {
           
            $video_link = uploadImage($request, 'video_link', 'pages/services_home');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }else{
            $data['video_link'] = $pageData->video_link;
        }


        $this->savePageSettings($data);
       
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function faq()
    {
        $faqs = Faq::orderBy('id','desc')->get();
        return view('admin.faq.index')->with('faqs', $faqs);
    }

    public function createFaq()
    {
         return view('admin.faq.create')->with('faq', array());
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'sort_order' => 'nullable|integer',
        ],[
            '*.required' => 'This field is required'
        ]);
        $page = Faq::create([
            'title' => $request->get('title'),
            'description'    => $request->description,
            'status'    => $request->status,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
        ]);
        return redirect()->route('admin.faq.index')->with([
            'status' => "FAQ Created"
        ]);
    }
    public function editFaq($id)
    {
        $faqs = Faq::find($id);
         return view('admin.faq.edit')->with('faq', $faqs);
    }

    public function updateFaq(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'sort_order' => 'nullable|integer',
        ],[
            '*.required' => 'This field is required'
        ]);
       
        $faq = Faq::find($request->faq);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('admin.faq.index')->with([
            'status' => "FAQ details Updated"
        ]);
    }
    public function deleteFaq(Request $request){
        $faq = Faq::find($request->id);
        $faq->delete();
        return redirect()->route('admin.faq.index')->with([
            'status' => "FAQ details deleted"
        ]);
    }


    public function blogsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','blogs')->first();
      
        return view('admin.pages.blogs',compact('data'));
    }

    public function storeBlogsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required',
                        'image' => 'nullable|max:200'
                    ],[
                        '*.required' => 'This field is required.',
                        'image.max' => "Maximum file size to upload is 200 KB.",
                    ]);
        $data = [
                'page_title'            => 'Blogs',
                'page_name'             => 'blogs',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                // 'heading1'              => $request->heading1,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','blogs')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/blogs');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function privacyPage()
    {
        $data = Pages::with(['seo'])->where('page_name','privacy')->first();
      
        return view('admin.pages.privacy',compact('data'));
    }

    public function storePrivacyPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required'
                    ],[
                        '*.required' => 'This field is required.',
                    ]);
        $data = [
                'page_title'            => 'Privacy Policy',
                'page_name'             => 'privacy',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function termsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','terms')->first();
      
        return view('admin.pages.terms',compact('data'));
    }

    public function storeTermsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'sub_title' => 'required',
                        'description' => 'required'
                    ],[
                        '*.required' => 'This field is required.',
                    ]);
        $data = [
                'page_title'            => 'Terms & Conditions',
                'page_name'             => 'terms',
                'title'                 => $request->title,
                'sub_title'             => $request->sub_title,
                'description'           => $request->description,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }


}
