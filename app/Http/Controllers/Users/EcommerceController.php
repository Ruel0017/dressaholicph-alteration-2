<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\repair;
use App\Models\repair_price;
use App\Models\payment;
use App\Models\Ecommerce;
use Illuminate\Http\Request;


class EcommerceController extends Controller
{
    public function index()
    { 
        $product = ecommerce::all();
        return view('dashboards.users.ecommerce', compact('product')); 
    }

    public function cart()
    {
        return view('dashboards.users.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = ecommerce::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "quantity" => 1,
                "product_price" => $product->product_price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        /** lagay mo muna pre kung ilan yung qty na meron sa product. Tapos if > na sa qty, di siya mag susuccess */
        // $qty = Ecommerce::select('qty')
        // ->get();

        // dd($qty);

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
             
            session()->flash('success', 'Product removed successfully');
        }
    }

}   