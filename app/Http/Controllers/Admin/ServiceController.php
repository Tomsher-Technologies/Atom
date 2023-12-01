<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Str;
use Artisan;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::orderBy('sort_order','asc')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createService()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeService(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'banner_description'=>'nullable',
            'title'=>'required',
            'description'=>'nullable',
            'heading1'=>'required',
            'content1'=>'required',
            'heading2'=>'required',
            'content2'=>'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'header_display' => 'required',
            'footer_display' => 'required',
            'banner_image'=>'required|max:500',
            'list_image'=>'required|max:100',
            'image1'=>'required|max:200',
            'image2'=>'required|max:200',
            ],[
                'banner_image.max' => 'File size should be less than 500 Kb',
                'image1.max' => 'File size should be less than 200 Kb',
                'image2.max' => 'File size should be less than 200 Kb',
                'list_image.max' => 'File size should be less than 100 Kb',
                '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->name);

        $checkSlug =  Services::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }
        
         $saveData = [
            'name'                  => $request->name,
            'slug'                  => $slug,
            'banner_content'        => $request->banner_description,
            'title'                 => $request->title,
            'description'           => $request->description,
            'heading1'              => $request->heading1,
            'content1'              => $request->content1,
            'heading2'              => $request->heading2,
            'content2'              => $request->content2,
            'status'                => $request->status,
            'header_display'        => $request->header_display,
            'footer_display'        => $request->footer_display,
            'sort_order'            => $request->sort_order,
            'seo_title'             => $request->seotitle,
            'og_title'              => $request->ogtitle,
            'twitter_title'         => $request->twtitle,
            'seo_description'       => $request->seodescription,
            'og_description'        => $request->og_description,
            'twitter_description'   => $request->twitter_description,
            'keywords'              => $request->seokeywords
        ];
        
        $service = Services::create($saveData);

        $banner_image = uploadImage($request, 'banner_image', 'services');
        $list_image = uploadImage($request, 'list_image', 'services');
        $image1 = uploadImage($request, 'image1', 'services');
        $image2 = uploadImage($request, 'image2', 'services');

        $service->banner_image  = $banner_image;
        $service->listing_image    = $list_image;
        $service->image1        = $image1;
        $service->image2        = $image2;
        $service->save();

        return redirect()->route('admin.consultancy.services')->with([
            'status' => "Service Created"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editService(string $id)
    {
        $service = Services::find($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateService(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'banner_description'=>'nullable',
            'title'=>'required',
            'description'=>'nullable',
            'heading1'=>'required',
            'content1'=>'required',
            'heading2'=>'required',
            'content2'=>'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'header_display' => 'required',
            'footer_display' => 'required',
            'banner_image'=>'nullable|max:500',
            'list_image'=>'nullable|max:100',
            'image1'=>'nullable|max:200',
            'image2'=>'nullable|max:200',
            ],[
                'banner_image.max' => 'File size should be less than 500 Kb',
                'image1.max' => 'File size should be less than 200 Kb',
                'image2.max' => 'File size should be less than 200 Kb',
                'list_image.max' => 'File size should be less than 100 Kb',
                '*.required' => 'This field is required'
        ]);

        $service = Services::find($request->service);

        $name = $service->name;
       
        $service->name                = $request->name ?? '';
        $service->banner_content      = $request->banner_description ?? '';
        $service->title               = $request->title ?? '';
        $service->description         = $request->description ?? '';
        $service->heading1            = $request->heading1 ?? '';
        $service->content1            = $request->content1 ?? '';
        $service->heading2            = $request->heading2 ?? '';
        $service->content2            = $request->content2 ?? '';
        $service->status              = $request->status ?? '';
        $service->header_display      = $request->header_display ?? '';
        $service->footer_display      = $request->footer_display ?? '';
        $service->sort_order          = ($request->sort_order != '') ? $request->sort_order : 0;
        $service->seo_title           = $request->seotitle ?? '';
        $service->og_title            = $request->ogtitle ?? '';
        $service->twitter_title       = $request->twtitle ?? '';
        $service->seo_description     = $request->seodescription ?? '';
        $service->og_description      = $request->og_description ?? '';
        $service->twitter_description = $request->twitter_description ?? '';
        $service->keywords            = $request->seokeywords ?? '';

        if($name != $request->name){
            $slug = Str::slug($request->name);

            $checkSlug =  Services::where('slug',$slug)->count();
            if($checkSlug == 0){
                $service->slug = $slug;
            }else{
                $service->slug = $slug.'-'.rand(1,10);
            }
        }
        
        if ($request->hasFile('banner_image')) {
            $banner_image = uploadImage($request, 'banner_image', 'services');
            deleteImage($service->banner_image);
            $service->banner_image = $banner_image;
        }

        if ($request->hasFile('list_image')) {
            $list_image = uploadImage($request, 'list_image', 'services');
            deleteImage($service->listing_image);
            $service->listing_image = $list_image;
        }

        if ($request->hasFile('image1')) {
            $image1 = uploadImage($request, 'image1', 'services');
            deleteImage($service->image1);
            $service->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = uploadImage($request, 'image2', 'services');
            deleteImage($service->image2);
            $service->image2 = $image2;
        }

        $service->save();
        Artisan::call('cache:clear');
        return redirect()->route('admin.consultancy.services')->with('status','Service details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteService(Request $request)
    {
        $service = Services::find($request->id);
        $image1 = $service->image1;
        $image2 = $service->image2;
        $banner_image = $service->banner_image;
        if ($service->delete()) {
            deleteImage($image1);
            deleteImage($image2);
            deleteImage($banner_image);
        }
        return redirect()->route('admin.consultancy.services')->with([
            'status' => "Service Deleted"
        ]);
    }
}
