<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Popups;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PopupsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popups = Popups::orderBy('id','asc')->paginate(15);

        return view('admin.popups.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.popups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:500',
            'name' => 'required',
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 200 KB'
        ]);
        $data = [
            'name'=> $request->name,
            'link'=> $request->link,
            'status' => $request->status,
        ];

        $popup = Popups::create($data);

        $image = uploadImage($request, 'image', 'popup');

        $popup->image = $image;
        $popup->save();

        return redirect()->route('admin.popups.index')->with([
            'status' => "popup Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Popups $popups)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Popups $popup)
    {
        return view('admin.popups.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Popups $popup)
    {
        $request->validate([
            'image' => 'nullable|max:500',
            'name' => 'required',
            'status' => 'required',
        ],[
            '*.required' => 'This field is required',
            'image.max' => 'File size should be less than 200 KB'
        ]);

        $popup->name = $request->name;
        $popup->link = $request->link;
        $popup->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'popup');
            deleteImage($popup->image);
            $popup->image = $image;
        }

        $popup->save();

        return redirect()->route('admin.popups.index')->with([
            'status' => "popups details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Popups $popup)
    {
        $img = $popup->image;
        if ($popup->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.popups.index')->with([
            'status' => "popups Deleted"
        ]);
    }
}
