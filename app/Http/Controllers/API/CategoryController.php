<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json(
            [
                'status' => 200,
                'success' => true,
                'data' =>  CategoryCollection::collection($categories),
            ]
        );
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => new CategoryResource($category),
        ]);
    }
}
