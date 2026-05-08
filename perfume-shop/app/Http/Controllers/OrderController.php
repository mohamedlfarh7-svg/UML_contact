<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Parfum;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirm(Parfum $parfum) {
        return view('parfums.confirm_order', compact('parfum'));
    }


    public function store(Request $request) {
        Order::create([
            'user_id' => auth()->id(),
            'parfum_id' => $request->parfum_id,
            'requested_quantity' => $request->requested_quantity,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->route('home')->with('success', 'Commande envoyée à l\'admin !');
    }


    public function adminIndex() {
        $orders = Order::with(['user', 'parfum'])->where('status', 'en_attente')->get();
        return view('admin.orders', compact('orders'));
    }
    public function validateOrder(Order $order) {
        $parfum = $order->parfum;
        if($parfum->quantity >= $order->requested_quantity) {
            $parfum->decrement('quantity', $order->requested_quantity);
            $order->update(['status' => 'validee']);
            return back()->with('success', 'Commande validée et stock mis à jour !');
        }
        return back()->with('error', 'Stock insuffisant !');
    }

   public function myOrders() {
    $orders = Order::with('parfum')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();
    return view('orders.my_orders', compact('orders'));
}
}
