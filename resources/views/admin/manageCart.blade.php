@extends('admin.adminBase')

@section('content')

<div class="container mt-4">

    <h2 class="display-6 mb-4">
        Manage Carts / Orders ({{ count($carts) }})
    </h2>

    @foreach ($carts as $item)

        <div class="card mt-4 shadow-sm">

            <div class="card-header bg-light">

                <h4 class="mb-3">
                    Order #{{ $item->id }}
                </h4>

                <table class="table table-bordered mb-0">
                    <tr>
                        <th style="width: 180px;">Customer Name</th>
                        <td>{{ $item->users->name ?? 'N/A' }}</td>

                        <th style="width: 180px;">Email</th>
                        <td>{{ $item->users->email ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <th>Phone Number</th>
                        <td>
                            @if($item->address && $item->address->alt_contact)
                                {{ $item->address->alt_contact }}
                            @else
                                <span class="text-danger">Phone number not saved</span>
                            @endif
                        </td>

                        <th>Order Status</th>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Order Placed</span>
                            @else
                                <span class="badge bg-warning text-dark">Cart Pending</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Delivery Place</th>
                        <td colspan="3">
                            @if($item->address)
                                {{ $item->address->street_name }},
                                {{ $item->address->area }},
                                {{ $item->address->landmark }},
                                {{ ucfirst($item->address->city) }} -
                                {{ $item->address->pincode }}

                                @if($item->address->type == 'h')
                                    <span class="badge bg-primary ms-2">Home</span>
                                @else
                                    <span class="badge bg-secondary ms-2">Office</span>
                                @endif
                            @else
                                <span class="text-danger">
                                    Delivery place not saved yet
                                </span>
                            @endif
                        </td>
                    </tr>
                </table>

            </div>

            <div class="card-body">

                <h5 class="mb-3">Ordered Products</h5>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Item Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Product Image</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $grandTotal = 0;
                        @endphp

                        @foreach ($item->orderItem as $i)

                            @php
                                $itemTotal = $i->product->discount_price * $i->qty;
                                $grandTotal += $itemTotal;
                            @endphp

                            <tr>
                                <td>{{ $i->id }}</td>
                                <td>{{ $i->product->title }}</td>
                                <td>{{ $i->qty }}</td>
                                <td>{{ $i->product->discount_price }}/-</td>
                                <td>{{ $itemTotal }}/-</td>

                                <td>
                                    <img src="{{ asset('storage/' . $i->product->image) }}"
                                         width="70"
                                         height="70"
                                         style="object-fit: contain;"
                                         alt="">
                                </td>
                            </tr>

                        @endforeach

                        <tr>
                            <th colspan="4" class="text-end">Grand Total</th>
                            <th colspan="2" class="text-success">
                                {{ $grandTotal }}/-
                            </th>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

    @endforeach

</div>

@endsection