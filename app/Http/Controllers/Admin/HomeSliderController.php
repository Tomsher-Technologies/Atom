<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSliders;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Str;

class HomeSliderController extends Controller
{
   
    public function index()
    {
        $home_sliders = HomeSliders::orderBy('sort_order','asc')->get();
        return view('admin.home_slider.index', compact('home_sliders'));
    }

    public function create()
    {
        return view('admin.home_slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:500',
            // 'title' => 'required',
            // 'sub_title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 500 KB',
            '*.required' => 'This field is required'
        ]);
        $data = [
            // 'title'=> $request->title,
            // 'sub_title'=> $request->sub_title,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $home_slider = HomeSliders::create($data);

        if ($request->hasFile('image')) {
            $name = uploadImage($request, 'image', 'home_slider');
            $home_slider->image = $name;
            $home_slider->save();
        }
        return redirect()->route('admin.home_slider.index')->with('status', 'Home Slider created successfully');
    }

  
    public function show(HomeSliders $home_slider)
    {
        
    }

   
    public function edit(HomeSliders $home_slider)
    {
        return view('admin.home_slider.edit')->with([
            'home_slider' => $home_slider
        ]);
    }

   
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|max:500',
            // 'title' => 'required',
            // 'sub_title' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 500 KB',
            '*.required' => 'This field is required'
        ]);

        $home_slider = HomeSliders::find($request->home_slider);

        // $home_slider->title         = $request->title ?? '';
        // $home_slider->sub_title     = $request->sub_title ?? '';
        $home_slider->status        = $request->status ?? '';
        $home_slider->sort_order    = ($request->sort_order != '') ? $request->sort_order : 0;

        if ($request->hasFile('image')) {
            deleteImage($home_slider->image);
            $name = uploadImage($request, 'image', 'home_slider');
            $home_slider->image = $name;
        }
        $home_slider->save();

        return redirect()->route('admin.home_slider.index')->with('status', 'Home Slider updated successfully');
    }

    
    public function destroy(Request $request)
    {
        $home_slider = HomeSliders::find($request->home_slider);
        $image = $home_slider->image;
        if ($home_slider->delete()) {
            deleteImage($image);
        }

        return redirect()->route('admin.home_slider.index')->with('status', 'Home Slider deleted successfully');
    }
}
