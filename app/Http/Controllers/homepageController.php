<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class homepageController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        return view('web.homepage', [
            'categories' => $categories,
        ]);
    }
    public function product($slug)
    {
        return view('web.product', ['slug' => $slug]);
    }
    public function categories()
    {
        return view('web.categories');
    }
    public function category($slug)
    {
        $category = Categories::find($slug);
        
        return view('web.category_by_slug', ['slug' => $slug, 'category' =>
        $category]);
    }
    public function cart()
    {
        return view('web.cart');
    }
    public function checkout()
    {
        return view('web.checkout');
    }
}
