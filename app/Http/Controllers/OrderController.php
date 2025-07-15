<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->user()->id)
            ->with(['orderDetails', 'orderDetails.product'])
            ->latest()
            ->get();

        return view('web.orders.index', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::where('customer_id', auth()->guard('customer')->user()->id)
            ->with(['orderDetails', 'orderDetails.product'])
            ->findOrFail($id);

        return view('web.orders.show', [
            'order' => $order
        ]);
    }

    public function cancel($id)
    {
        $order = Order::where('customer_id', auth()->guard('customer')->user()->id)
            ->findOrFail($id);

        if ($order->status === 'completed') {
            return redirect()->back()->with('error', 'Pesanan yang sudah selesai tidak dapat dibatalkan');
        }

        $order->status = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan');
    }
}
