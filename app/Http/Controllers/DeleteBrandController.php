<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class DeleteBrandController extends Controller
{
    //
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();
        return redirect()->back()->with('message', 'Successfully deleted brand.');

    }
}
