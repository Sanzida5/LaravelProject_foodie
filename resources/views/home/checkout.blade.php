@extends('home.base')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4 fw-bold">Checkout</h2>

    <div class="row">

        <div class="col-lg-8 col-md-12">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <div class="h5 mb-1">Enter Delivery Details</div>
                    <div class="text-danger">* Required Fields</div>
                </div>

                <div class="card-body">

                    <form action="{{ route('checkout') }}" method="post">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="alt_contact"
                                    value="{{ old('alt_contact') }}"
                                    placeholder="Example: 01700000000"
                                    maxlength="11">

                                @error('alt_contact')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Landmark <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="landmark"
                                    value="{{ old('landmark') }}"
                                    placeholder="Example: Near college">

                                @error('landmark')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label>Delivery Place <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="street_name"
                                    value="{{ old('street_name') }}"
                                    placeholder="House / Road / Building">

                                @error('street_name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Area <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="area"
                                    value="{{ old('area') }}"
                                    placeholder="Example: Dhanmondi">

                                @error('area')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label>Pincode <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="pincode"
                                    value="{{ old('pincode') }}"
                                    placeholder="Example: 1209">

                                @error('pincode')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>City <span class="text-danger">*</span></label>

                                <select class="form-control" name="city">
                                    <option value="">Select City</option>
                                    <option value="satkhira" {{ old('city') == 'satkhira' ? 'selected' : '' }}>Satkhira</option>
                                    <option value="khulna" {{ old('city') == 'khulna' ? 'selected' : '' }}>Khulna</option>
                                    <option value="dhaka" {{ old('city') == 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                                </select>

                                @error('city')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label>Delivery Type</label>
                                <br>

                                <input type="radio" name="type" value="o" {{ old('type') == 'o' ? 'checked' : '' }}>
                                Office

                                <input type="radio" name="type" value="h" {{ old('type', 'h') == 'h' ? 'checked' : '' }}>
                                Home

                                @error('type')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success w-100 btn-lg">
                            Save Delivery Address
                        </button>

                    </form>

                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Select Saved Delivery Address</h5>
                </div>

                <div class="card-body">

                    @if(count($addresses) > 0)

                        <form action="{{ route('placeOrder') }}" method="post">
                            @csrf

                            <select name="address_id" class="form-select form-select-lg mb-3">
                                <option value="">Select Saved Address</option>

                                @foreach ($addresses as $add)
                                    <option value="{{ $add->id }}">
                                        Phone: {{ $add->alt_contact }} |
                                        {{ $add->street_name }},
                                        {{ $add->area }},
                                        {{ $add->landmark }},
                                        {{ ucfirst($add->city) }} -
                                        {{ $add->pincode }}
                                    </option>
                                @endforeach
                            </select>

                            @error('address_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Place Order
                            </button>
                        </form>

                    @else

                        <p class="text-danger mb-0">
                            No saved delivery address found. Please save delivery address first.
                        </p>

                    @endif

                </div>
            </div>

        </div>

        <div class="col-lg-4 col-md-12">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Order Summary</h5>
                </div>

                <div class="card-body">

                    @if($order && count($order->orderItem) > 0)

                        @php
                            $total_price = 0;
                            $total_discount_price = 0;
                        @endphp

                        @foreach($order->orderItem as $item)

                            @php
                                $total_price += $item->product->price * $item->qty;
                                $total_discount_price += $item->product->discount_price * $item->qty;
                            @endphp

                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>{{ $item->product->title }} x {{ $item->qty }}</span>
                                <span>{{ $item->product->discount_price * $item->qty }}/-</span>
                            </div>

                        @endforeach

                        @php
                            $discount = $total_price - $total_discount_price;
                            $gst = $total_discount_price * 0.18;
                            $delivery_charge = ($total_discount_price + $gst <= 500) ? 50 : 0;
                            $net_payable = $total_discount_price + $gst + $delivery_charge;
                        @endphp

                        <div class="d-flex justify-content-between mt-3">
                            <span>Total Price</span>
                            <span>{{ $total_price }}/-</span>
                        </div>

                        <div class="d-flex justify-content-between text-success">
                            <span>Discount</span>
                            <span>{{ $discount }}/-</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Tax 18%</span>
                            <span>{{ $gst }}/-</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Delivery Charge</span>

                            <span>
                                @if($delivery_charge)
                                    {{ $delivery_charge }}/-
                                @else
                                    FREE
                                @endif
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between h4 text-success">
                            <span>Net Payable</span>
                            <span>{{ $net_payable }}/-</span>
                        </div>

                    @else

                        <p class="text-danger">Your cart is empty.</p>

                        <a href="{{ route('home.index') }}" class="btn btn-dark w-100">
                            Shop Now
                        </a>

                    @endif

                </div>
            </div>

        </div>

    </div>

</div>

@endsection