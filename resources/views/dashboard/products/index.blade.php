<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Products</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Products</flux:heading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex justify-between items-center mb-4">
        <div>
            <flux:input icon="magnifying-glass" placeholder="Search Products" />
        </div>
        <div>
            <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Add New Product
            </a>
        </div>
    </div>

    
</x-layouts.app>