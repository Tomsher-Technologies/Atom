<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teams;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class TeamsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams::orderBy('sort_order','asc')->paginate(15);

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|max:200',
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.max' => 'File size should be less than 200 KB'
        ]);
        $data = [
            'name'=> $request->name,
            'description'=> $request->description,
            'designation'=> $request->designation,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $team = Teams::create($data);

        $image = uploadImage($request, 'image', 'team');

        $team->image = $image;
        $team->save();

        return redirect()->route('admin.teams.index')->with([
            'status' => "Teams Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teams $team)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teams $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teams $team)
    {
        $request->validate([
            'image' => 'nullable|max:200',
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            '*.required' => 'This field is required',
            'image.max' => 'File size should be less than 200 KB'
        ]);

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $team->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'team');
            deleteImage($team->image);
            $team->image = $image;
        }

        $team->save();

        return redirect()->route('admin.teams.index')->with([
            'status' => "Team details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teams $team)
    {
        $img = $team->image;
        if ($team->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.teams.index')->with([
            'status' => "Team Deleted"
        ]);
    }
}
