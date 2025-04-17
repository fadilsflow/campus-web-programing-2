<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    public function index()
    {
       $categories = Categories::all();

 return view('web.homepage',[
 'categories' => $categories,
 ]);
    }

    public function products()
    {
        return view('web.products');
    }

    public function product($slug)
    {
        return view('web.product', ['slug' => $slug]);
    }

    public function categories()
    {
        $categories = Categories::all();
        return view('web.categories', ['categories' => $categories]);
    }

    public function category($slug)
    {
        return view('web.category_by_slug', ['slug' => $slug]);
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