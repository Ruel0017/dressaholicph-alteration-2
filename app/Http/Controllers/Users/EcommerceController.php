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
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;


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
        
        if( $product->qty <= 0)
        {
            $cart = session()->get('cart');
            if(isset($cart[$id])) 
            {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Sorry item stock is not available.');
        }
        else
        {
            if(isset($cart[$id])) 
            {
                // $cart[$id]["quantity"] = $request->quantity; 
                if(  $cart[$id]["quantity"] + 1 > $product['qty']   )
                {
                    return redirect()->back()->with('success', 'Cant add more on this product');
                }
                else
                {
                    $cart[$id]['quantity']++;
                    session()->put('cart', $cart);
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }
            }
            else        
             {  
                    $cart[$id] = [
                        "product_name" => $product->product_name,
                        "quantity" => 1,
                        "product_price" => $product->product_price,
                        "image" => $product->image,
                        "product_id" => $product->id
                    ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
             }
        }
          
       
    }

    public function Ecommerce_CheckOut(Request $request)
    {

        
        $cart = session()->get('cart', []);
        
        session()->put('cart', $cart);

        $payment = new payment;
        $payment->user_id =  Auth::user()->id;
        $payment->appointment_id =  date('YmdHis'); //Create ID for shopping ID
        $payment->amount = $request->input('amount');
        $payment->type_of_payment = "ECOMMERCE PARTIAL PAYMENT";
        $payment->accountname = $request->input('accountname');
        $payment->accountnumber = $request->input('accountnumber'); 
        $payment->save();

        foreach ($cart as $p) 
        { 
            $product = ecommerce::find( $p['product_id']);
            // if($product->qty  - $p['quantity'] <= 0)
            // {
            //     return redirect()->back()->with('failed', 'Cant add more quantity on this product. Remaning stock is:  $product->product_namexam' );
            //     break;
            // }
         
          
            $product->qty = $product->qty  - $p['quantity'];
            $product->save(); 
        }

        session()->forget('cart');

        // dd($payment['appointment_id']);
        $mobileNumber = Auth::user()->mobilenumber;
        $MobileNumbers = (substr_replace($mobileNumber, "63", 0, 1));
      

            // dd($removeFirst);


        Nexmo::message()->send([
            'to' =>  $MobileNumbers,
            'from' => '639999999999',
            'text' => 'Order/Tracking No: '.''.$payment['appointment_id'].' '.'Ship to:'.Auth::user()->fname.' Please expect call for the delivery process.' 
        ]);

        return redirect()->back()->with('success', 'Payment successfully!');

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
            $product = ecommerce::findOrFail($request->id);
            // $product = ecommerce::find();
            if($product['qty'] <= 0)
            {
                if($request->id) {
                    $cart = session()->get('cart');
                    if(isset($cart[$request->id])) {
                        unset($cart[$request->id]);
                        session()->put('cart', $cart);
                    }
                    session()->flash('success', 'Sorry item stock is not available.');
                }
               
            }
            else
            {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
 
           
                if( $cart[$request->id]["quantity"] > $product['qty']   )
                {
                    session()->flash('success', 'Cant add more on this product');
                }
                else    
                {  
                    session()->put('cart', $cart);
                    session()->flash('success', 'Cart updated successfully');
                }
            }
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