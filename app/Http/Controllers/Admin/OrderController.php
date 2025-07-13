<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'orderDetails', 'orderDetails.product'])
            ->latest()
            ->paginate(10);

        return view('dashboard.orders.index', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::with(['customer', 'orderDetails', 'orderDetails.product'])
            ->findOrFail($id);

        return view('dashboard.orders.show', [
            'order' => $order
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}
