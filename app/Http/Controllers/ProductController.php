<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('sku', 'like', '%' . $request->q . '%')
                    ->orWhere('description', 'like', '%' . $request->q . '%');
            })
            ->paginate(10);

        return view('dashboard.products.index', [
            'products' => $products,
            'q' => $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.products.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * cek validasi input
         */
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'sku' => 'required|string|max:50|unique:products',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        /**
         * jika validasi gagal,
         * maka redirect kembali dengan pesan error
         */
        if ($validator->fails()) {
            return redirect()->back()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, Silahkan lengkapi data terlebih dahulu'
            ]);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->back()->with([
            'successMessage' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Categories::all();

        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /**
         * cek validasi input
         */
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'sku' => 'required|string|max:50|unique:products,sku,' . $id,
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        /**
         * jika validasi gagal,
         * maka redirect kembali dengan pesan error
         */
        if ($validator->fails()) {
            return redirect()->back()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, Silahkan lengkapi data terlebih dahulu'
            ]);
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image_url) {
                Storage::delete('public/' . $product->image_url);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->back()->with([
            'successMessage' => 'Data Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product->image_url) {
            Storage::delete('public/' . $product->image_url);
        }

        $product->delete();

        return redirect()->back()->with([
            'successMessage' => 'Data Berhasil Dihapus'
        ]);
    }

    public function sync($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $response = Http::post('https://api.phb-umkm.my.id/api/product/sync', [
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'seller_product_id' => (string) $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'stock' => $product->stock,
            'sku' => $product->sku,
            'image_url' => $product->image_url,
            'weight' => $product->weight,
            'is_active' => $request->is_active == 1 ? false : true,
            'category_id' => (string) $product->category->hub_category_id,
        ]);

        if ($response->successful() && isset($response['product_id'])) {
            $product->hub_product_id = $request->is_active == 1 ? null : $response['product_id'];
            $product->save();
        }

        session()->flash('successMessage', 'Product Synced Successfully');
        return redirect()->back();
    }
}
