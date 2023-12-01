<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Str;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:blogs');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::orderBy('id','desc')->paginate(20);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image1' => 'required|max:200',
            'image2' => 'required|max:200',
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'blog_date' => 'required', 
            'status' => 'required',
        ],[
            'image1.max' => 'File size should be less than 200 KB',
            'image2.max' => 'File size should be less than 200 KB',
            '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->title);

        $checkSlug =  Blogs::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }


         $saveData = [
            'title' => $request->title,
            'slug' => $slug,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'status' => $request->status,
            'blog_date' => $request->blog_date,
            'seo_title' => $request->seotitle,
            'og_title' => $request->ogtitle, 
            'twitter_title' => $request->twtitle, 
            'seo_description' => $request->seodescription, 
            'og_description' => $request->og_description, 
            'twitter_description' => $request->twitter_description, 
            'keywords' => $request->seokeywords
        ];
       
        $blog = Blogs::create($saveData);

        $image1 = uploadImage($request, 'image1', 'blogs');
        $image2 = uploadImage($request, 'image2', 'blogs');

        $blog->image1 = $image1;
        $blog->image2 = $image2;
        $blog->save();

        return redirect()->route('admin.blogs.index')->with([
            'status' => "Blog Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blogs::find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $blog = Blogs::find($request->blog);
        $request->validate([
            'image1' => 'nullable|max:200',
            'image2' => 'nullable|max:200',
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'blog_date' => 'required', 
            'status' => 'required',
        ],[
            'image1.max' => 'File size should be less than 200 KB',
            'image2.max' => 'File size should be less than 200 KB',
            '*.required' => 'This field is required'
        ]);

        if($blog->title != $request->title){
            $slug = Str::slug($request->title);

            $checkSlug =  Blogs::where('slug',$slug)->count();
            if($checkSlug == 0){
                $blog->slug = $slug;
            }else{
                $blog->slug = $slug.'-'.rand(1,10);
            }
        }

        $blog->title = $request->title;
        $blog->description1 = $request->description1;
        $blog->description2 = $request->description2;
        $blog->status = $request->status;
        $blog->blog_date = $request->blog_date;
        $blog->seo_title = $request->seotitle;
        $blog->og_title = $request->ogtitle; 
        $blog->twitter_title = $request->twtitle;
        $blog->seo_description = $request->seodescription;
        $blog->og_description = $request->og_description;
        $blog->twitter_description = $request->twitter_description; 
        $blog->keywords = $request->seokeywords;
       

        if ($request->hasFile('image1')) {
            $image1 = uploadImage($request, 'image1', 'blogs');
            deleteImage($blog->image1);
            $blog->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = uploadImage($request, 'image2', 'blogs');
            deleteImage($blog->image2);
            $blog->image2 = $image2;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('status','Blog details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $blog = Blogs::find($request->blog);
        $image1 = $blog->image1;
        $image2 = $blog->image2;
        if ($blog->delete()) {
            deleteImage($image1);
            deleteImage($image2);
        }
        return redirect()->route('admin.blogs.index')->with([
            'status' => "Blog Deleted"
        ]);
    }
}
