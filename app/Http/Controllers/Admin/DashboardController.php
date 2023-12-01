<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Product\Product;
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
}
