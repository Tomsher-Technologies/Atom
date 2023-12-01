<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinars;
use App\Models\WebinarBookings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Str;

class WebinarController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:webinars');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webinars = Webinars::with(['bookings'])->orderBy('id','desc')->paginate(15);
        return view('admin.webinars.index', compact('webinars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.webinars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:200',
            'image2' => 'nullable|max:100',
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'webinar_date' => 'required', 
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 200 KB',
            'image2.max' => 'File size should be less than 100 KB',
            '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->title);

        $checkSlug =  Webinars::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }

         $saveData = [
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'location' => $request->location,
            'presented_title' => $request->presented_title,
            'presented_description' => $request->presented_description,
            'status' => $request->status,
            'webinar_date' => $request->webinar_date,
            'seo_title' => $request->seotitle,
            'og_title' => $request->ogtitle, 
            'twitter_title' => $request->twtitle, 
            'seo_description' => $request->seodescription, 
            'og_description' => $request->og_description, 
            'twitter_description' => $request->twitter_description, 
            'keywords' => $request->seokeywords
        ];
        
        $webinar = Webinars::create($saveData);

        $image = uploadImage($request, 'image', 'webinars');
        $presented_image = NULL;
        if($request->hasFile('image2')){
            $presented_image = uploadImage($request, 'image2', 'webinars');
        }
    
        $webinar->image = $image;
        $webinar->presented_image = $presented_image;
        $webinar->save();

        return redirect()->route('admin.webinars.index')->with([
            'status' => "Webinar Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Webinars $webinar)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $webinar = Webinars::find($id);
        return view('admin.webinars.edit', compact('webinar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $webinar = Webinars::find($request->webinar);
        $request->validate([
            'image' => 'nullable|max:200',
            'image2' => 'nullable|max:100',
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'webinar_date' => 'required', 
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 200 KB',
            'image2.max' => 'File size should be less than 100 KB',
            '*.required' => 'This field is required'
        ]);

        if($webinar->title != $request->title){
            $slug = Str::slug($request->title);

            $checkSlug =  Webinars::where('slug',$slug)->count();
            if($checkSlug == 0){
                $webinar->slug = $slug;
            }else{
                $webinar->slug = $slug.'-'.rand(1,10);
            }
        }

        $webinar->title = $request->title;
        $webinar->description = $request->description;
        $webinar->location = $request->location;
        $webinar->video_link = $request->video_link;

        $webinar->presented_title = $request->presented_title;
        $webinar->presented_description = $request->presented_description;

        $webinar->status = $request->status;
        $webinar->webinar_date = $request->webinar_date;
        $webinar->seo_title = $request->seotitle;
        $webinar->og_title = $request->ogtitle; 
        $webinar->twitter_title = $request->twtitle;
        $webinar->seo_description = $request->seodescription;
        $webinar->og_description = $request->og_description;
        $webinar->twitter_description = $request->twitter_description; 
        $webinar->keywords = $request->seokeywords;
       

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'webinars');
            deleteImage($webinar->image);
            $webinar->image = $image;
        }

        if ($request->hasFile('image2')) {
            $image2 = uploadImage($request, 'image2', 'webinars');
            deleteImage($webinar->presented_image);
            $webinar->presented_image = $image2;
        }

        $webinar->save();

        return redirect()->route('admin.webinars.index')->with('status','Webinar details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $webinar = Webinars::find($request->webinar);
        $image = $webinar->image;
        $presented_image = $webinar->presented_image;
        if ($webinar->delete()) {
            deleteImage($image);
            deleteImage($presented_image);
        }
        return redirect()->route('admin.webinars.index')->with([
            'status' => "Webinar Deleted"
        ]);
    }

    public function bookings(Request $request){
        $webinar = Webinars::find($request->id);
      
        $bookings = WebinarBookings::with(['webinar'])->where("webinar_id", $request->id)->orderBy('id','ASC')->get();
        return view('admin.webinars.bookings', compact('bookings','webinar'));
    }
}
