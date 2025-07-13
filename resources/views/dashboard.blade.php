<?php

use App\Models\Product;
use App\Models\Categories;
use App\Models\Order;
?>

<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 p-4">
        <!-- Stats Cards -->
        <div class="grid gap-4 md:grid-cols-3">
            <!-- Products Card -->
            <div class="rounded-xl   bg-white p-6 shadow-sm  dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Products</h3>
                    <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-600/10 dark:bg-pink-900/30 dark:text-pink-500">
                        <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        Products
                    </span>
                </div>
                <p class="mt-2 text-3xl font-bold text-zinc-900 dark:text-white">{{ Product::count() }}</p>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Active Products: {{ Product::where('is_active', true)->count() }}</p>
            </div>

            <!-- Categories Card -->
            <div class="rounded-xl   bg-white p-6 shadow-sm  dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Categories</h3>
                    <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-600/10 dark:bg-pink-900/30 dark:text-pink-500">
                        <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </span>
                </div>
                <p class="mt-2 text-3xl font-bold text-zinc-900 dark:text-white">{{ Categories::count() }}</p>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">With Products: {{ Categories::whereHas('products')->count() }}</p>
            </div>

            <!-- Orders Card -->
            <div class="rounded-xl   bg-white p-6 shadow-sm  dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Orders</h3>
                    <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-600/10 dark:bg-pink-900/30 dark:text-pink-500">
                        <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Orders
                    </span>
                </div>
                <p class="mt-2 text-3xl font-bold text-zinc-900 dark:text-white">{{ Order::count() }}</p>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    Pending: {{ Order::where('status', 'pending')->count() }} |
                    Processing: {{ Order::where('status', 'processing')->count() }}
                </p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid gap-4 md:grid-cols-2">
            <!-- Recent Orders -->
            <div class="rounded-xl   bg-white p-6 shadow-sm  dark:bg-zinc-900">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-semibold text-zinc-900 dark:text-white">Recent Orders</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-sm text-pink-600 hover:text-pink-700 dark:text-pink-500 dark:hover:text-pink-400">View All</a>
                </div>
                <div class="space-y-4">
                    @forelse(Order::with('customer')->latest()->take(5)->get() as $order)
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-4 dark:border-zinc-800">
                        <div>
                            <p class="font-medium text-zinc-900 dark:text-white">#{{ $order->id }} - {{ $order->customer?->name ?? 'N/A' }}</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $order->created_at->diffForHumans() }}</p>
                        </div>
                        <span @class([ 'rounded-full px-2 py-1 text-xs font-medium' , 'bg-yellow-50 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-500'=> $order->status === 'pending',
                            'bg-blue-50 text-blue-800 dark:bg-blue-900/30 dark:text-blue-500' => $order->status === 'processing',
                            'bg-green-50 text-green-800 dark:bg-green-900/30 dark:text-green-500' => $order->status === 'completed',
                            'bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-500' => $order->status === 'cancelled',
                            ])>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">No orders found</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Products -->
            <div class="rounded-xl   bg-white p-6 shadow-sm  dark:bg-zinc-900">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-semibold text-zinc-900 dark:text-white">Recent Products</h3>
                    <a href="{{ route('products.index') }}" class="text-sm text-pink-600 hover:text-pink-700 dark:text-pink-500 dark:hover:text-pink-400">View All</a>
                </div>
                <div class="space-y-4">
                    @forelse(Product::with('category')->latest()->take(5)->get() as $product)
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-4 dark:border-zinc-800">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 flex-shrink-0">
                                @if($product->image_url)
                                <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-lg object-cover">
                                @else
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-pink-100 dark:bg-pink-900/30">
                                    <svg class="h-6 w-6 text-pink-600 dark:text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-zinc-900 dark:text-white">{{ $product->name }}</p>
                                <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $product->category?->name ?? 'No Category' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-medium text-zinc-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Stock: {{ $product->stock }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">No products found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>