<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Accreditations;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class AccreditationsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accreditations = Accreditations::orderBy('sort_order','asc')->paginate(15);

        return view('admin.accreditations.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accreditations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:200',
            'name' => 'required',
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 200 KB'
        ]);
        $data = [
            'name'=> $request->name,
            'link'=> $request->link,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
        ];

        $accreditation = Accreditations::create($data);

        $image = uploadImage($request, 'image', 'accreditation');

        $accreditation->image = $image;
        $accreditation->save();

        return redirect()->route('admin.accreditations.index')->with([
            'status' => "Accreditations Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accreditations $accreditations)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accreditations $accreditation)
    {
        return view('admin.accreditations.edit', compact('accreditation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accreditations $accreditation)
    {
        $request->validate([
            'image' => 'nullable|max:200',
            'name' => 'required',
            'status' => 'required',
        ],[
            '*.required' => 'This field is required',
            'image.max' => 'File size should be less than 200 KB'
        ]);

        $accreditation->name = $request->name;
        $accreditation->sort_order = $request->sort_order;
        $accreditation->link = $request->link;
        $accreditation->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'accreditation');
            deleteImage($accreditation->image);
            $accreditation->image = $image;
        }

        $accreditation->save();

        return redirect()->route('admin.accreditations.index')->with([
            'status' => "accreditations details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accreditations $accreditation)
    {
        $img = $accreditation->image;
        if ($accreditation->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.accreditations.index')->with([
            'status' => "Accreditations Deleted"
        ]);
    }
}
