<x-layouts.app :title="__('Order Detail')">
    <div class="relative mb-6 w-full">
        <div class="flex justify-between items-center">
            <div>
                <flux:heading size="xl">Order #{{ $order->id }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">Order details and management</flux:subheading>
            </div>
            <flux:button icon="arrow-left">
                <flux:link href="{{ route('admin.orders.index') }}" variant="subtle">Back to Orders</flux:link>
            </flux:button>
        </div>
        <flux:separator variant="subtle" />
    </div>

    @if(session('success'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-600">Order Information</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Order Date</p>
                        <p class="font-medium text-gray-600">{{ $order->order_date->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Status</p>
                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="status-form">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select status-select text-black" onchange="this.form.submit()" style="min-width: 140px;">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Amount</p>
                        <p class="font-medium text-gray-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-600">Customer Information</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-medium text-gray-600">{{ $order->customer->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium text-gray-600">{{ $order->customer->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-600">Order Items</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b text-left text-gray-600">Product</th>
                                <th class="px-4 py-2 border-b text-right text-gray-600">Price</th>
                                <th class="px-4 py-2 border-b text-right text-gray-600">Quantity</th>
                                <th class="px-4 py-2 border-b text-right text-gray-600">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $detail)
                            <tr>
                                <td class="px-4 py-4 border-b">
                                    <div class="flex items-center">
                                        <img src="{{ Storage::url($detail->product->image_url) }}" alt="{{ $detail->product->name }}" class="w-12 h-12 object-cover rounded mr-3">
                                        <div>
                                            <p class="font-medium text-gray-600">{{ $detail->product->name }}</p>
                                            <p class="text-sm text-gray-600">SKU: {{ $detail->product->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 border-b text-right text-gray-600">
                                    Rp {{ number_format($detail->unit_price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-4 border-b text-right text-gray-600">
                                    {{ $detail->quantity }}
                                </td>
                                <td class="px-4 py-4 border-b text-right font-medium text-gray-600">
                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-right font-semibold text-gray-600">Total:</td>
                                <td class="px-4 py-4 text-right font-semibold text-gray-600">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order Timeline -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-600">Order Timeline</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="bi bi-clock text-white"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-600">Order Created</p>
                            <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @if($order->status !== 'pending')
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center">
                                <i class="bi bi-gear text-white"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-600">Processing Started</p>
                            <p class="text-sm text-gray-600">{{ $order->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    @if($order->status === 'completed')
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="bi bi-check-lg text-white"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium">Order Completed</p>
                            <p class="text-sm text-gray-600">{{ $order->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    @if($order->status === 'cancelled')
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center">
                                <i class="bi bi-x-lg text-white"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-600">Order Cancelled</p>
                            <p class="text-sm text-gray-600">{{ $order->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .status-select {
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
            border: 1px solid #e2e8f0;
            background-color: #fff;
            cursor: pointer;
        }

        .status-select option {
            padding: 0.5rem;
        }

        .status-select[value="pending"] {
            color: #f59e0b;
        }

        .status-select[value="processing"] {
            color: #3b82f6;
        }

        .status-select[value="completed"] {
            color: #10b981;
        }

        .status-select[value="cancelled"] {
            color: #ef4444;
        }
    </style>
</x-layouts.app>