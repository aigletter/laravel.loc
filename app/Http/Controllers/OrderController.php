<?php

namespace App\Http\Controllers;

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
        // TODO
        return 'Order with id ' . $id . '. Link: <a href="' . route('orders.show', ['id' => $id]) . '">' . $id . '</a>';
    }

    public function test($param = null)
    {
        return 'Test method with param ' . $param;
    }
}
