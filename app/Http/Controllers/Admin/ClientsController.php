<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ClientsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::orderBy('sort_order','asc')->paginate(15);

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
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
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'status' => $request->status,
        ];

        $client = Clients::create($data);

        $image = uploadImage($request, 'image', 'client');

        $client->image = $image;
        $client->save();

        return redirect()->route('admin.clients.index')->with([
            'status' => "Clients Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $client)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clients $client)
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

        $client->name = $request->name;
        $client->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $client->status = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'client');
            deleteImage($client->image);
            $client->image = $image;
        }

        $client->save();

        return redirect()->route('admin.clients.index')->with([
            'status' => "Client details Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client)
    {
        $img = $client->image;
        if ($client->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.clients.index')->with([
            'status' => "Banner Deleted"
        ]);
    }
}
