<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Downloads;
use App\Models\States;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countEnquiry = Contact::count();
        $countClients = Clients::count();

        return view('admin.dashboard')->with([
            'countEnquiry' => $countEnquiry,
            'countClients' => $countClients
        ]);
    }

    public function search(Request $request)
    {
        $searchResults = [];
        // $searchResults = (new Search())
        //     ->registerModel(News::class, 'title')
        //     ->registerModel(Pages::class, ['title', 'page_name'])
        //     ->search($request->q);

        return view('admin.search')->with(['searchResults' => $searchResults]);
    }

    public function ajaxLocations(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $query = States::orderBy('name','ASC');
           
            if($search){
                $query->Where(function ($query) use ($search) {
                    $query->orWhere('name', 'LIKE', "%$search%");   
                }); 
            }           
            $data = $query->get();
        }
        return response()->json($data);
    }

    public function downloads(Request $request){
        $downloads = Downloads::orderBy('id','desc')->paginate(10);
        return view('admin.downloads.index')->with('downloads', $downloads);
    }

    public function createDownloads()
    {
         return view('admin.downloads.create');
    }

    public function storeDownloads(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_file' => 'required|max:2048',
            'status' => 'required',
            'sort_order' => 'nullable|integer',
        ],[
            '*.required' => 'This field is required',
            'pdf_file.max' => "Maximum file size to upload is 2MB.",
        ]);
        

        $file = NULL;
        if ($request->hasFile('pdf_file')) {
            $file = uploadImage($request, 'pdf_file', 'downloads');
        }

        $page = Downloads::create([
            'title' => $request->get('title'),
            'status'    => $request->status,
            'file' => $file,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
        ]);

        return redirect()->route('admin.downloads.index')->with([
            'status' => "New Download File Created"
        ]);
    }

    public function editDownloads($id){
        $downloads = Downloads::find($id);
        return view('admin.downloads.edit')->with('downloads', $downloads);
    }

    public function updateDownloads(Request $request){
        $request->validate([
            'title' => 'required',
            'pdf_file' => 'nullable|max:2048',
            'status' => 'required',
            'sort_order' => 'nullable|integer',
        ],[
            '*.required' => 'This field is required',
            'pdf_file.max' => "Maximum file size to upload is 2MB.",
        ]);

        $download = Downloads::find($request->download);
        $download->title = $request->title;
        $download->status = $request->status;
        $download->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        // Update Image
        if ($request->hasFile('pdf_file')) {
            deleteImage($download->file);
            $download->file = uploadImage($request,'pdf_file','downloads');
        }
        $download->save();
       
        return redirect()->route('admin.downloads.index')->with([
            'status' => "Details Updated Successfully"
        ]);
    }

    public function deleteDownloads(Request $request){
        $download = Downloads::find($request->download);
        $file = $download->file;
        if ($download->delete()) {
            deleteImage($file);
        }

        return redirect()->route('admin.downloads.index')->with('status', 'File deleted successfully');
    }
}
