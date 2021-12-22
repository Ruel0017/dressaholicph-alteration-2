<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ecommerce;
use Illuminate\Http\Request;

class AdminAddProductsController extends Controller
{
    public function index()
    {
        $product = ecommerce::all();
        return view('dashboards.admins.product', compact('product'));
    }

    public function store(Request $request)
    {
        $imageName = $request->file->hashName();
        $request->validate([
            'productName' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            // $request->file->store('product', 'public');
            $request->file->move(public_path('product'), $imageName);

            $product = new ecommerce([
                'product_name' => $request->get('productName'),
                'image' => $imageName,
                'product_price' => $request->get('price'),
                'qty' => $request->get('quantity')
            ]);
            $product->save(); // Finally, save the record.

            return redirect()->back()->with('success', 'Successfully Added!');
        } else {
            return redirect()->back()->with('error', 'Unsuccessfully, Please try again');
        }
    }
}
