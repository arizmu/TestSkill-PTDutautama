<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::when(request()->filter, function ($query) {
            $query->where('reference_no', 'like', '%' . request()->filter . '%')
                ->orWhereHas('product', function ($product) {
                    $product->where('name', 'like', '%' . request()->filter . '%');
                });
        })->with('product')->paginate();
        return Inertia::render('Transaction/TrIndex', [
            'data' => $data
        ]);
    }

    public function api_store(Request $request)
    {
        try {
            $product = Product::find($request->product_id);
            $store = Transaction::create([
                'reference_no' => Str::random(10),
                'price' => $product->price,
                'quantity' => $request->quantity,
                'payment_amount' => $product->price * $request->quantity,
                'product_id' => $product->id
            ]);
            return response()->json([
                'status' => '200',
                'message' => 'success',
                'data' => $store
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
