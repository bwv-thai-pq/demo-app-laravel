<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    //

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->back()->with('message', 'Successfully deleted product.');

    }
}
