<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function add(){
        $id = request('id');
        $product = Product::find($id);

        $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart2', $cart);

        return response()->json($cart->totalQty);
    }

    public function add22(){
        $id = request('id');
        $product = Product::find($id);

        $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart2', $cart);

        return response()->json($cart->totalQty);
    }

    public function add2($id) 
    {
        $product = Product::find($id);
        
        $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart2', $cart);
        
        // dd(session()->get('cart2'));
        
        return back();
    }

    public function index(){
        if(session()->has('cart2'))
        {
            $products = session()->get('cart2')->items;
        }
        elseif(session()->has('cart2'))
        {
            $products = session()->get('cart2')->items;
        }
        else
        {
            $products = 'nothing';
        }
        return view('basket', compact('products'));
    }

    public function order(){
        return view('order');
    }
    public function store(){
        $this ->validate(request(), [
            'name'=>'required',
            'address'=>'required',
        ]);

        $cart = session()->get('cart2');

        $message = "Имя: ".request('name')."\nАдрес:".request('address')."\nЗаказанные товары:";
        foreach($cart->items as $product) {
            $message .= $product['item']['title']." * ".$product['qty'].", Цена - ".$product['item']['entityprice']*$product['qty']."\n";
        }
        $message .= "\nИтого: ".$cart->totalPrice." тг\n";
        $subject = "Заказ товара";
        
        $headers = 'From: info@hansolomed.kz' . "\r\n" .
            'Reply-To: info@hansolome.kz' . "\r\n".
            'X-Mailer: PHP/' . phpversion();

        mail('015@i-marketing.kz', $subject, $message, $headers);

        request()->session()->forget('cart2');
    }    

    public function remove($id){
        $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items) > 0){
            session()->put('cart2', $cart);
        }else{
            session()->forget('cart2', $cart);
        }
        return redirect()->back();
    }    

    public function redis($id){
        $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        
        session()->put('cart2', $cart);
        
        return redirect()->back();        
    }
}