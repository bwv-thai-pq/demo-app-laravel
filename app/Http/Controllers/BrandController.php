<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View returned
     */
    public function create()
    {


        return view('brands.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        //
        Brand::firstOrCreate([
            'name'  => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        return redirect()->route('brands.index')->with('message', 'Successfully added new brand.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function edit(Brand $brand)
    {
        //
        return view('products.edit-product', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
        //Update database
        Brand::where('id', $brand->id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('products.index')->with('message', 'Successfully edited brand.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        Brand::destroy($id);
        return response()->json(['success' => true, 'message' => 'Successfully deleted product.', 'id'=> $id]);

    }
}
