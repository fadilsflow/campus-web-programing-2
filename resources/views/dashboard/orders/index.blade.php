<x-layouts.app :title="__('Orders')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Orders Management</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage customer orders</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session('success'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Order ID
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Customer
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Total Amount
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            #{{ $order->id }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $order->customer->name }}
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">
                            {{ $order->customer->email }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $order->order_date->format('d M Y') }}
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">
                            {{ $order->order_date->format('H:i') }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ">
                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="status-form">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select status-select " style=" color: #000;" onchange="this.form.submit()" style="min-width: 140px;">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <flux:dropdown>
                            <flux:button icon:trailing="chevron-down">Actions</flux:button>

                            <flux:menu>
                                <flux:menu.item icon="eye" href="{{ route('admin.orders.show', $order->id) }}">View Details</flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $orders->links() }}
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