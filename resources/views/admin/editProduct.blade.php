@extends('admin.adminBase')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}">

                            @error('title')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex">
                            <label class="me-3">Type:</label>

                            <input type="radio" class="form-check" name="isVeg" value="1"
                                {{ $product->isVeg == 1 ? 'checked' : '' }}> 
                            <span class="ms-1">Veg</span>

                            <input type="radio" class="form-check ms-3" name="isVeg" value="0"
                                {{ $product->isVeg == 0 ? 'checked' : '' }}>
                            <span class="ms-1">Non-Veg</span>

                            @error('isVeg')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Original Price</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">

                            @error('price')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Discount Price</label>
                            <input type="text" class="form-control" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}">

                            @error('discount_price')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description) }}</textarea>

                            @error('description')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Current Image</label><br>
                            <img src="{{ asset('storage/' . $product->image) }}" width="120px" class="mb-2" alt="">
                        </div>

                        <div class="mb-3">
                            <label>Change Image</label>
                            <input type="file" class="form-control" name="image">

                            @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Category</label>

                            <select class="form-control" name="category_id">
                                <option value="">Select Category Here</option>

                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->cat_title }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update Product" class="btn btn-success w-100">
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary w-100">
                                Back
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection