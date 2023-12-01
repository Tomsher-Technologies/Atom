<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Str;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::orderBy('sort_order','asc')->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'position'=>'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'image'=>'required|max:10'
            ],[
                'image.max' => 'File size should be less than 10 Kb',
                '*.required' => 'This field is required'
        ]);

        
         $saveData = [
            'name'                  => $request->name,
            'comment'                  => $request->comment,
            'position'        => $request->position,
            'status'                => $request->status,
            'sort_order'            => $request->sort_order
        ];
        
        $review = Reviews::create($saveData);
        $image = uploadImage($request, 'image', 'reviews');

        $review->image        = $image;
        $review->save();

        return redirect()->route('admin.reviews.index')->with([
            'status' => "Review Created"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = Reviews::find($id);
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'position'=>'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
            'image'=>'nullable|max:10'
            ],[
                'image.max' => 'File size should be less than 10 Kb',
                '*.required' => 'This field is required'
        ]);

        $review = Reviews::find($request->review);

        $review->name                = $request->name ?? '';
        $review->comment      = $request->comment ?? '';
        $review->position               = $request->position ?? '';
        $review->status              = $request->status ?? '';
        $review->sort_order          = ($request->sort_order != '') ? $request->sort_order : 0;

       
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'reviews');
            deleteImage($review->image);
            $review->image = $image;
        }

        $review->save();

        return redirect()->route('admin.reviews.index')->with('status','Review details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $review = Reviews::find($request->review);
        $image = $review->image;
        if ($review->delete()) {
            deleteImage($image);
        }
        return redirect()->route('admin.reviews.index')->with([
            'status' => "Review Deleted"
        ]);
    }
}
