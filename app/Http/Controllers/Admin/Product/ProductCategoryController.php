<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductCategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.products.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::where('parent_id', 0)->get();
        return view('admin.products.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_image' => [
                'required',
                File::image()
                    ->max(2 * 1024)
            ],
            'banner_image' => [
                'required',
                File::image()
                    ->max(2 * 1024)
            ],
            'image_1' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'image_2' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'home_image' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'title' => 'required',
            'ar_title' => 'required',
            'content' => 'required',
            'ar_content' => 'required',
            'menu_text' => 'required',
            'ar_menu_text' => 'required',
            'status' => 'required',
        ]);

        $saveData = [
            'title' => $request->title,
            'status' => $request->status,
            'seo_title' => $request->seotitle,
            'og_title' => $request->ogtitle, 
            'twitter_title' => $request->twtitle, 
            'seo_description' => $request->seodescription, 
            'og_description' => $request->og_description, 
            'twitter_description' => $request->twitter_description, 
            'keywords' => $request->seokeywords
        ];
        
        $category = ProductCategory::create($saveData);

        $menu_image = uploadImage($request, 'menu_image', 'category');
        $banner_image = uploadImage($request, 'banner_image', 'category');
        $image_1 = uploadImage($request, 'image_1', 'category');
        $image_2 = uploadImage($request, 'image_2', 'category');
        $home_image = uploadImage($request, 'home_image', 'category');

        $category->menu_image = $menu_image;
        $category->banner_image = $banner_image;
        $category->image_1 = $image_1;
        $category->image_2 = $image_2;
        $category->home_image = $home_image;
        $category->slug = Str::slug($request->title);
        $category->parent_id = $request->parent_id;
        $category->save();

        ProductCategoryTranslation::create([
            'product_category_id' => $category->id,
            'title' => $request->title,
            'menu_text' => $request->menu_text,
            'description' => $request->content,
            'lang' => 'en'
        ]);
        ProductCategoryTranslation::create([
            'product_category_id' => $category->id,
            'title' => $request->ar_title,
            'menu_text' => $request->ar_menu_text,
            'description' => $request->ar_content,
            'lang' => 'ar'
        ]);

        return redirect()->route('admin.category.index')->with([
            'status' => "Category Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $category)
    {
        $categories = ProductCategory::where('parent_id', 0)->get();
        return view('admin.products.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $category)
    {


        $request->validate([
            'menu_image' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'banner_image' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'image_1' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'image_2' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'home_image' => [
                'nullable',
                File::image()
                    ->max(2 * 1024)
            ],
            'title' => 'required',
            'ar_title' => 'required',
            'content' => 'required',
            'ar_content' => 'required',
            'menu_text' => 'required',
            'ar_menu_text' => 'required',
            'status' => 'required',
        ]);


        $category->title = $request->title;
        $category->status = $request->status;
        $category->seo_title = $request->seotitle;
        $category->og_title = $request->ogtitle; 
        $category->twitter_title = $request->twtitle;
        $category->seo_description = $request->seodescription;
        $category->og_description = $request->og_description;
        $category->twitter_description = $request->twitter_description; 
        $category->keywords = $request->seokeywords;

        if ($request->hasFile('menu_image')) {
            $image = uploadImage($request, 'menu_image', 'category');
            deleteImage($category->menu_image);
            $category->menu_image = $image;
        }
        if ($request->hasFile('banner_image')) {
            $image = uploadImage($request, 'banner_image', 'category');
            deleteImage($category->banner_image);
            $category->banner_image = $image;
        }
        if ($request->hasFile('image_1')) {
            $image = uploadImage($request, 'image_1', 'category');
            deleteImage($category->image_1);
            $category->image_1 = $image;
        }
        if ($request->hasFile('image_2')) {
            $image = uploadImage($request, 'image_2', 'category');
            deleteImage($category->image_2);
            $category->image_2 = $image;
        }
        if ($request->hasFile('home_image')) {
            $image = uploadImage($request, 'home_image', 'category');
            deleteImage($category->home_image);
            $category->home_image = $image;
        }
        $category->slug = Str::slug($request->title);
        $category->save();

        ProductCategoryTranslation::updateOrCreate([
            'lang' => 'en',
            'product_category_id' => $category->id
        ], [
            'title' => $request->title,
            'menu_text' => $request->menu_text,
            'description' => $request->content,
        ]);

        ProductCategoryTranslation::updateOrCreate([
            'lang' => 'ar',
            'product_category_id' => $category->id
        ], [
            'title' => $request->ar_title,
            'menu_text' => $request->ar_menu_text,
            'description' => $request->ar_content,
        ]);

        return redirect()->route('admin.category.index')->with([
            'status' => 'Category Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $category)
    {
        $menu_image = $category->menu_image;
        $banner_image = $category->banner_image;
        $image_1 = $category->image_1;
        $image_2 = $category->image_2;
        $home_image = $category->home_image;

        ProductCategoryTranslation::where([
            'product_category_id' => $category->id
        ])->delete();

        if ($category->delete()) {
            deleteImage($menu_image);
            deleteImage($banner_image);
            deleteImage($image_1);
            deleteImage($image_2);
            deleteImage($home_image);
        }
        return redirect()->route('admin.category.index')->with([
            'status' => "ProductCategory Deleted"
        ]);
    }
}
