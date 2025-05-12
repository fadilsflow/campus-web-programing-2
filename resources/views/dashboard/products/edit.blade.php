<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage Products Data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{session()->get('successMessage')}}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <flux:input label="Name" name="name" :value="$product->name" class="mb-3" required />
                <flux:input label="SKU" name="sku" :value="$product->sku" class="mb-3" required />
                <flux:input label="Slug" name="slug" :value="$product->slug" class="mb-3" required />
                <flux:input type="number" label="Price" name="price" :value="$product->price" min="0" step="0.01" class="mb-3" required />
                <flux:input type="number" label="Stock" name="stock" :value="$product->stock" min="0" class="mb-3" required />
            </div>
            <div>
                <flux:select label="Category" name="category_id" class="mb-3">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </flux:select>
                <flux:textarea label="Description" name="description" :value="$product->description" class="mb-3" />
                <flux:input type="file" label="Product Image" name="image" class="mb-3" />
                @if($product->image_url)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif
                <flux:select label="Active Status" name="is_active" class="mb-3">
                    <option value="1" {{ $product->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Inactive</option>
                </flux:select>
            </div>
        </div>

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update Product</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app> 