@extends('admin.adminBase')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">

            <div class="container mb-3">
                <h2 class="display-6 float-start">
                    Manage Product ({{ count($products) }})
                </h2>

                <a href="{{ route('admin.product.insert') }}" class="btn btn-success float-end mt-1">
                    Insert Product
                </a>
            </div>

            <div class="clearfix"></div>

            @if(session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>IsVeg</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>

                        <td>{{ $item->title }}</td>

                        <td>
                            @if($item->isVeg)
                                <img src="{{ asset('icons/v.png') }}" width="30" height="30" alt="Veg">
                            @else
                                <img src="{{ asset('icons/nv.png') }}" width="30" height="30" alt="Non Veg">
                            @endif
                        </td>

                        <td>
                            <span class="text-success fw-bold">
                                {{ $item->discount_price }}
                            </span>
                            <del>{{ $item->price }}</del>
                        </td>

                        <td>
                            <img src="{{ asset('storage/' . $item->image) }}" width="100px" alt="">
                        </td>

                        <td>{{ $item->description }}</td>

                        <td>{{ $item->status }}</td>

                        <td>{{ $item->category->cat_title }}</td>

                        <td>
                            <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection