<x-layout>
    <x-slot name="title"> Categories</x-slot>
    <!-- Custom Styles -->
    <style>
        .category-card {
            overflow: hidden;
            position: relative;
            border-radius: 100px;
        }

        .category-icon {
            width: 100px;
            height: 100px;
            background: #2a2a2a;
            border: 2px solid #e83e8c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .category-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            filter: brightness(0) invert(1);
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon img {
            transform: scale(1.1);
        }

        .category-name {
            color: #000;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            margin: 1rem 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .category-desc {
            color: #000;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
    </style>
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-size: 1.5rem; font-family: 'Orbitron', sans-serif;">Kategori Product</h3>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach($categories as $category)
            @if($category->is_active)
            <div class="col">
                <a href="{{ URL::to('/category/'.$category->slug) }}" class="text-decoration-none">
                    <div class="h-100 py-4 category-card">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/64x64?text=No+Image' }}" alt="{{ $category->name }}" class="category-icon">
                        <div class="text-center px-3">
                            <h5 class="category-name">{{ $category->name }}</h5>
                            <p class="category-desc">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        <div class="d-flex justify-content-center w-100 mt-4">
            {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>
</x-layout>