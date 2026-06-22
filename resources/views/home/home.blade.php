@extends('home.base')

@section('content')

<style>
    .category-section {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .category-title {
        font-size: 30px;
        font-weight: 700;
        color: #5f6f7a;
        margin-bottom: 18px;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        background: #fff;
        transition: 0.2s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .product-img {
        width: 100%;
        height: 190px;
        object-fit: contain;
        background: #f8f8f8;
        padding: 10px;
    }

    .product-title {
        font-size: 20px;
        font-weight: 700;
        color: #111;
        margin-bottom: 8px;
    }

    .product-description {
        font-size: 15px;
        color: #333;
        line-height: 1.5;
        margin-bottom: 12px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .discount-price {
        font-size: 22px;
        font-weight: 700;
        color: #07834b;
    }

    .original-price {
        font-size: 16px;
        color: #777;
        margin-left: 6px;
    }

    .cart-btn {
        font-size: 15px;
        padding: 7px 14px;
        border-radius: 4px;
    }

    .veg-icon {
        width: 30px;
        height: 30px;
    }
</style>

<div class="container">

    @foreach ($categories as $cat)

        <div class="category-section">

            <div class="row">
                <div class="col-12">
                    <h2 class="text-capitalize category-title">
                        {{ $cat->cat_title }}
                    </h2>
                </div>
            </div>

            <div class="row">

                @foreach ($cat->products as $item)

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="card product-card">

                            <img src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->title }}"
                                 class="product-img">

                            <div class="card-body d-flex flex-column">

                                <h5 class="product-title">
                                    {{ $item->title }}
                                </h5>

                                <p class="product-description">
                                    {{ $item->description }}
                                </p>

                                <div class="mt-auto">

                                    <div class="mb-3">
                                        <span class="discount-price">
                                            {{ $item->discount_price }}/-
                                        </span>

                                        <del class="original-price">
                                            {{ $item->price }}/-
                                        </del>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">

                                        <span>
                                            @if ($item->isVeg)
                                                <img src="{{ asset('icons/v.png') }}"
                                                     class="veg-icon"
                                                     alt="Veg">
                                            @else
                                                <img src="{{ asset('icons/nv.png') }}"
                                                     class="veg-icon"
                                                     alt="Non Veg">
                                            @endif
                                        </span>

                                        <a href="{{ route('addToCart', $item->id) }}"
                                           class="btn btn-success cart-btn">
                                            Add to Cart
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        <hr>

    @endforeach

</div>

@endsection