<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return new ProductResource($product);
    }
}
