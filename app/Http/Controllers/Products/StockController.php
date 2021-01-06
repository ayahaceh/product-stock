<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockHistory;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Product $product, Request $request)
    {
        if ($request->has('add_stock')) {
            StockHistory::create([
                'product_id' => $product->id,
                'amount'     => $request->get('amount'),
            ]);
        }

        return back();
    }
}
