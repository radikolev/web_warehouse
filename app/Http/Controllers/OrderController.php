<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\WarehouseProduct;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');
    }

    public function create()
    {
        $products = WarehouseProduct::with('warehouse', 'product')->where('quantity', '>' , 0)->get();

        return view('vendor.voyager.order')->with('products', $products);
    }

    public function store(Request $request)
    {
        $products = WarehouseProduct::with('warehouse', 'product')->where('quantity', '>' , 0)->get();

        $order = new Order();
        $order->total_price = 0;
        $order->save();

        foreach ($request->quantity as $k => $quantity) {
            if($quantity > 0) {
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $products[$k]->id;
                $orderDetails->quantity = $quantity;
                $orderDetails->price = $products[$k]->price;
                $orderDetails->save();

                $products[$k]->quantity = $products[$k]->quantity - $quantity;
                $products[$k]->update();

                $order->total_price = $order->total_price + ($products[$k]->price * $quantity);
            }
        }

        $order->update();


        return redirect()->back()->with('success', 'Order successfully created. Total price: '. $order->total_price .'');
    }

}
