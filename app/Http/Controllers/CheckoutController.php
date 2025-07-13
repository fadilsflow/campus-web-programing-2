<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::query()
            ->with(['items', 'items.itemable'])
            ->where('user_id', auth()->guard('customer')->user()->id)
            ->first();

        return view('web.checkout', [
            'cart' => $cart
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Get the user's cart
        $cart = Cart::query()
            ->with(['items', 'items.itemable'])
            ->where('user_id', auth()->guard('customer')->user()->id)
            ->first();

        if (!$cart || count($cart->items) === 0) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang belanja Anda kosong.');
        }

        try {
            DB::beginTransaction();

            // Create order
            $order = Order::create([
                'customer_id' => auth()->guard('customer')->user()->id,
                'order_date' => now(),
                'total_amount' => $cart->calculatedPriceByQuantity(),
                'status' => 'pending'
            ]);

            // Create order details
            foreach ($cart->items as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->itemable->id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->itemable->price,
                    'subtotal' => $item->itemable->price * $item->quantity
                ]);
            }

            // Clear the cart
            $cart->items()->delete();
            $cart->delete();

            DB::commit();

            return redirect()->route('orders.index')
                ->with('success', 'Pesanan Anda telah berhasil diproses. Terima kasih telah berbelanja!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.');
        }
    }
}
