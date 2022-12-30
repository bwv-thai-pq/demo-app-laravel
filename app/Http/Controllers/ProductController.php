<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View returned
     */
    public function index()
    {
        //Get products by Query
        // $products = DB::table('products')->orderByRaw('updated_at - created_at DESC');

        // // Query where price > 1210000 or name = 'sp5
        // $products = DB::table('products')
        //             ->where('price', '>', 1210000)
        //             ->orWhere('name', 'sp5')
        //             ->get();
                    // ->dd()

        // // otherwise
        // $products = DB::table('products')
        //     ->whereNot(function ($query) {
        //         $query->where('price', '>', 1210000)
        //             ->orWhere('name', 'sp5');
        //        })
        //     ->get();

        // Get all the products by Eloquent model
        $products = Product::all(); // activated with accessor

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('products.add-product');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //after check input done

        // create new product
        Product::create([
            'name'  => $request->input('name'),
            'price' => $request->input('price'),
            'qty'   => $request->input('quantity'),
        ]);
        return redirect()->route('products.index')->with('message', 'Successfully added new product.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View returned
     */
    public function edit(Product $product)
    {
        // Show edit page
        return view('products.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //Update database
        Product::where('id', $product->id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'qty' => $request->input('quantity'),
        ]);

        return redirect()->route('products.index')->with('message', 'Successfully edited product.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse returned
     */
    public function destroy(Product $product)
    {
        //
        // $product->delete();
        // // return response()->json(['success' => true, 'message' => 'Successfully deleted product.', 'id'=> $product->id]);
        // return redirect()->route('products.index')->with('message', 'Successfully edited product.');
    }
}
