<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Jobs\ProductOrderJob;

class OrderController extends Controller
{
    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' =>'required',

        ]);
        $validatedData['product_id'] = $request->product_id;

        Order::create($validatedData);
//        ProductOrderJob::dispatch($validatedData);
        return back()->with('success', 'Müraciətiniz qəbul olundu');
    }
}
