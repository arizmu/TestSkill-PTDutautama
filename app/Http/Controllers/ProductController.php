<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ProductController extends Controller
{
    public function index() {
        $data = Product::when(request()->search, function($query) {
            $query->where('name', 'like', '%'.request()->search.'%')
            ->orWhere('price', 'like', '%'.request()->search.'%');
        })->paginate(1);
        return Inertia::render('Product/ProductIndex', ['data' => $data]);
    }

    public function create() {
        return Inertia::render('Product/ProductCreate');
    }

    public function store(Request $request) {
        Product::create($request->all());
        return redirect()->back();
    }
}
