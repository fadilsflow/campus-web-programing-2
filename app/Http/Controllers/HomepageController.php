<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'pria',
                'slug' => 'Pakaian Pria',
                'description' => 'Ini adalah produk pakaian pria',
                'image' => 'https://placehold.co/300x300?text=Pakaian+Pria',
            ],
            [
                'id' => 2,
                'name' => 'wanita',
                'slug' => 'Pakaian Wanita',
                'description' => 'Ini adalah produk pakaian wanita',
                'image' => 'https://placehold.co/300x300?text=Pakaian+Wanita',
            ],
            [
                'id' => 3,
                'name' => 'anak-anak',
                'slug' => 'Pakaian Anak-Anak',
                'description' => 'Ini adalah produk pakaian anak-anak',
                'image' => 'https://placehold.co/300x300?text=Pakaian+Anak-Anak',
            ],
            [
                'id' => 4,
                'name' => 'aksesori',
                'slug' => 'Aksesori',
                'description' => 'Ini adalah produk aksesori',
                'image' => 'https://placehold.co/300x300?text=Aksesori',
            ],
            [
                'id' => 5,
                'name' => 'sepatu',
                'slug' => 'Sepatu',
                'description' => 'Ini adalah produk sepatu',
                'image' => 'https://placehold.co/300x300?text=Sepatu',
            ]
        ];

        return view('web.homepage', [
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
        return view('web.categories');
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