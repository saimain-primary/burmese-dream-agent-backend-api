<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'wholesale' => 'required',
            'images' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return 'fail';
        }

        $product = new Product();
        $product->slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->wholesale = json_encode($request->wholesale);
        $product->weight = $request->weight;
        $product->features = $request->features;
        $product->how_to_use = $request->how_to_use;
        $product->ingredients = $request->ingredients;

        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $path = 'BurmeseDream/Products/Images';
                Storage::disk('ln_spaces')->putFileAs($path, $file, $name, 'public');
                $files[] = $name;
            }
        }

        $product->images = json_encode($files);

        $product->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ssd()
    {
        $products = Product::query();

        return Datatables::of($products)->addColumn('action', function ($row) {
            $html = '<a href="' . url('admin/products/' . $row->id . '/edit') . '" class="btn btn-sm btn-secondary">Edit</a><a href="' . url('admin/products/' . $row->id) . '" class="mx-2 btn btn-sm btn-primary">View</a> ';
            return $html;
        })->addColumn('category', function ($row) {
            return $row->category->name;
        })->editColumn('created_at', function ($request) {
            return $request->created_at->format('Y-m-d'); // human readable format
        })->editColumn('updated_at', function ($request) {
            return $request->updated_at->format('Y-m-d'); // human readable format
        })->make(true);
    }
}
