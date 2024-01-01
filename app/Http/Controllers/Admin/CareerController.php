<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth()->user()->user_type === 1){
                return $next($request);
            }else{
                return redirect()->route('account');
            }
        });
    }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::orderBy('sort_order','asc')->paginate(15);

        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'position' => 'required',
            'description' => 'required',
            'status' => 'required',
        ],);
        $data = [
            'title'=> $request->title,
            'position'=> $request->position,
            'description'=> $request->description,
            'last_date'=> date('Y-m-d',strtotime($request->last_date)),
            'status' => $request->status,
        ];

        $careers = Career::create($data);
        $careers->save();

        return redirect()->route('admin.careers.index')->with([
            'status' => "Careers Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $careers)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ],);

        $career->title = $request->title;
        $career->position = $request->position;
        $career->description = $request->description;
        $career->last_date = date('Y-m-d',strtotime($request->last_date));
        $career->status = $request->status;
        $career->save();

        return redirect()->route('admin.careers.index')->with([
            'status' => "Careers details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $careers)
    {
        return redirect()->route('admin.careers.index')->with([
            'status' => "Careers Deleted"
        ]);
    }
}
