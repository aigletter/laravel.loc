<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * CRUD
 * Create
 * Read
 * Update
 * Delete
 */
class OrderController
{
    public function show($id)
    {
        //$order1 = DB::table('orders')->where('id', $id)->first();
        $order = Order::query()->where('id', $id)->first();

        $user = $order->user;

        $address = $order->address;
        $order->address = 'Hello world';

        print_r($order);
    }

    public function test($param = null)
    {
        return 'Test method with param ' . $param;
    }

    public function create(Request $request)
    {
        session_start();
        return view('orders.create');
    }

    public function store(OrderStoreRequest $request)
    {
        // validation
        /*$request->validate([
            'deadline' => ['required', 'date'],
            'product' => ['required', 'string'],
            'comment' => ['string', 'min:5', 'max:100'],
            'user_id' => ['exists:users,id']
        ]);*/

        $deadline = $request->input('deadline');
        $product = $request->input('product');

        $order = new Order();
        $order->user_id = 105;
        $order->status = 0;
        $order->deadline = $deadline;
        $order->product = $product;
        $order->comment = $request->input('comment');

        $order->save();

        return redirect()->back()->with('message', 'Order was created successfully');
    }
}
