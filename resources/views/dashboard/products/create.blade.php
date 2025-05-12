<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage Products Data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{session()->get('successMessage')}}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <flux:input label="Name" name="name" class="mb-3" required />
                <flux:input label="SKU" name="sku" class="mb-3" required />
                <flux:input label="Slug" name="slug" class="mb-3" required />
                <flux:input type="number" label="Price" name="price" min="0" step="0.01" class="mb-3" required />
                <flux:input type="number" label="Stock" name="stock" min="0" class="mb-3" required />
            </div>
            <div>
                <flux:select label="Category" name="category_id" class="mb-3">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </flux:select>
                <flux:textarea label="Description" name="description" class="mb-3" />
                <flux:input type="file" label="Product Image" name="image" class="mb-3" />
                <flux:select label="Active Status" name="is_active" class="mb-3">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </flux:select>
            </div>
        </div>

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Save Product</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app> 