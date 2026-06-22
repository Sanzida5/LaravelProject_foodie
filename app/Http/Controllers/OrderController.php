<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function manageCarts()
    {
        $data['carts'] = Order::with(['users', 'address', 'orderItem.product'])
            ->orderBy("id", "desc")
            ->paginate(100);

        return view("admin.manageCart", $data);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = Auth::user();

        if (!$product) {
            return redirect()->route('home.index')->with("error", "Product not found");
        }

        $order = Order::where([
            ["status", false],
            ["user_id", $user->id]
        ])->first();

        if (!$order) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->status = false;
            $order->save();
        }

        $orderItem = OrderItem::where("status", false)
            ->where("product_id", $id)
            ->where("order_id", $order->id)
            ->first();

        if ($orderItem) {
            $orderItem->qty += 1;
            $orderItem->save();
        } else {
            $oi = new OrderItem();
            $oi->status = false;
            $oi->product_id = $id;
            $oi->order_id = $order->id;
            $oi->qty = 1;
            $oi->save();
        }

        return redirect()->route('cart')->with('success', "Product added to cart successfully");
    }

    public function removeFormCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = Auth::user();

        if (!$product) {
            return redirect()->route('home.index')->with("error", "Product not found");
        }

        $order = Order::where([
            ["status", false],
            ["user_id", $user->id]
        ])->first();

        if ($order) {
            $orderItem = OrderItem::where("status", false)
                ->where("product_id", $id)
                ->where("order_id", $order->id)
                ->first();

            if ($orderItem) {
                if ($orderItem->qty > 1) {
                    $orderItem->qty -= 1;
                    $orderItem->save();
                } else {
                    $orderItem->delete();
                }
            }
        }

        return redirect()->route('cart')->with('success', "Product updated on cart successfully");
    }

    public function cart()
    {
        $data['order'] = Order::where([
            ["user_id", Auth::id()],
            ["status", false]
        ])->first();

        return view("home.cart", $data);
    }

    public function checkout(Request $req)
    {
        $data['addresses'] = Address::where("user_id", Auth::id())->get();

        $data['order'] = Order::where([
            ["user_id", Auth::id()],
            ["status", false]
        ])->first();

        if ($req->isMethod("post")) {
            $addressData = $req->validate([
                'alt_contact' => 'required|digits:11',
                'street_name' => 'required',
                'landmark' => 'required',
                'area' => 'required',
                'pincode' => 'required',
                'city' => 'required',
                'type' => 'required',
            ], [
                'alt_contact.required' => 'Phone number is required.',
                'alt_contact.digits' => 'Phone number must be 11 digits.',
                'street_name.required' => 'Delivery place is required.',
            ]);

            $addressData['user_id'] = Auth::id();
            $addressData['fullname'] = null;

            Address::create($addressData);

            return redirect()->back()->with("success", "Delivery address saved successfully");
        }

        return view("home.checkout", $data);
    }

    public function placeOrder(Request $req)
    {
        $req->validate([
            'address_id' => 'required'
        ]);

        $order = Order::where([
            ["user_id", Auth::id()],
            ["status", false]
        ])->first();

        if (!$order || count($order->orderItem) == 0) {
            return redirect()->route('cart')->with("error", "Cart is empty");
        }

        $order->address_id = $req->address_id;
        $order->status = true;
        $order->save();

        OrderItem::where("order_id", $order->id)->update([
            "status" => true
        ]);

        return redirect()->route("home.index")->with("success", "Order placed successfully");
    }
}