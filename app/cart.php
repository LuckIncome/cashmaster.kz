<?php

namespace App;

use Auth;
use App\Currency;
use App\Product;
use DB;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalValut = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalValut = $oldCart->totalValut;
        }
    }

    public function add($item, $id)
    {
        $products = Product::where('is_active', 1)->get();
        $currency = DB::table('currency')->where('id', 1)->get();
        if(Auth::check())
        {
            if(Auth::user()->hasRole('entity'))
            {
                $storedItem = [
                    'qty' => 0,
                    'entityprice' => $item->entityprice,
                    'valut' => $item->valut,
                    'item' => $item
                ];
                if($storedItem['valut']==1){
                    if($this->items)
                    {
                        if(array_key_exists($id, $this->items))
                        {
                            $storedItem = $this->items[$id];

                        }
                    }
                    $storedItem['qty']++;
                    $storedItem['entityprice'] = $item->entityprice * $storedItem['qty'];
                    $this->items[$id] = $storedItem;
                    $this->totalQty++;
                    $this->totalPrice += $item->entityprice * $currency[0]->coefficient;
                    // dd($this);
                }else{
                    if($this->items)
                    {
                        if(array_key_exists($id, $this->items))
                        {
                            $storedItem = $this->items[$id];

                        }
                    }
                    $storedItem['qty']++;
                    $storedItem['entityprice'] = $item->entityprice * $storedItem['qty'];
                    $this->items[$id] = $storedItem;
                    $this->totalQty++;
                    $this->totalPrice += $item->entityprice;
                    // dd($this);
                }

            }
            else
            {
                $storedItem = [
                    'qty' => 0,
                    'individualprice' => $item->individualprice,
                    'valut' => $item->valut,
                    'item' => $item
                ];
                if($storedItem['valut']==1){
                    if($this->items)
                    {
                        if(array_key_exists($id, $this->items))
                        {
                            $storedItem = $this->items[$id];

                        }
                    }
                    $storedItem['qty']++;
                    $storedItem['individualprice'] = $item->individualprice * $storedItem['qty'];
                    $this->items[$id] = $storedItem;
                    $this->totalQty++;
                    $this->totalPrice += $item->individualprice * $currency[0]->coefficient;
                    // dd($this);
                }else{
                    if($this->items)
                    {
                        if(array_key_exists($id, $this->items))
                        {
                            $storedItem = $this->items[$id];

                        }
                    }
                    $storedItem['qty']++;
                    $storedItem['individualprice'] = $item->individualprice * $storedItem['qty'];
                    $this->items[$id] = $storedItem;
                    $this->totalQty++;
                    $this->totalPrice += $item->individualprice;
                    // dd($this);
                }
            }

        }
        else
        {
            $storedItem = [
                'qty' => 0,
                'individualprice' => $item->individualprice,
                'valut' => $item->valut,
                'item' => $item
            ];
            if($storedItem['valut']==1){
                if($this->items)
                {
                    if(array_key_exists($id, $this->items))
                    {
                        $storedItem = $this->items[$id];

                    }
                }
                $storedItem['qty']++;
                $storedItem['individualprice'] = $item->individualprice * $storedItem['qty'];
                $this->items[$id] = $storedItem;
                $this->totalQty++;
                $this->totalPrice += $item->individualprice * $currency[0]->coefficient;
                // dd($this);
            }else{
                if($this->items)
                {
                    if(array_key_exists($id, $this->items))
                    {
                        $storedItem = $this->items[$id];

                    }
                }
                $storedItem['qty']++;
                $storedItem['individualprice'] = $item->individualprice * $storedItem['qty'];
                $this->items[$id] = $storedItem;
                $this->totalQty++;
                $this->totalPrice += $item->individualprice;
                // dd($this);
            }
        }
    }


    public function reduceByOne($id)
    {
        $currency = DB::table('currency')->where('id', 1)->get();
        if(Auth::check())
        {
            if(Auth::user()->hasRole('entity'))
            {

                    $this->items[$id]['qty']--;
                    // dd($this->items[$id]['valut']);
                    $this->items[$id]['entityprice']  -= $this->items[$id]['item']['entityprice'];
                    $this->totalQty--;
                    if($this->items[$id]['valut']==1){
                        $this->totalPrice  -= $this->items[$id]['item']['entityprice'] * $currency[0]->coefficient;
                    }
                    else{
                        $this->totalPrice  -= $this->items[$id]['item']['entityprice'];
                    }
                    if($this->items[$id]['qty'] <= 0)
                    {
                        unset($this->items[$id]);
                    }

            }
            if(Auth::user()->hasRole('individual'))
            {
                $this->items[$id]['qty']--;
                // dd($this->items[$id]['valut']);
                $this->items[$id]['individualprice']  -= $this->items[$id]['item']['individualprice'];
                $this->totalQty--;
                if($this->items[$id]['valut']==1){
                    $this->totalPrice  -= $this->items[$id]['item']['individualprice'] * $currency[0]->coefficient;
                }
                else{
                    $this->totalPrice  -= $this->items[$id]['item']['individualprice'];
                }
                if($this->items[$id]['qty'] <= 0)
                {
                    unset($this->items[$id]);
                }
            }
        }else
        {
            $this->items[$id]['qty']--;
            // dd($this->items[$id]['valut']);
            $this->items[$id]['individualprice']  -= $this->items[$id]['item']['individualprice'];
            $this->totalQty--;
            if($this->items[$id]['valut']==1){
                $this->totalPrice  -= $this->items[$id]['item']['individualprice'] * $currency[0]->coefficient;
            }
            else{
                $this->totalPrice  -= $this->items[$id]['item']['individualprice'];
            }
            if($this->items[$id]['qty'] <= 0)
            {
                unset($this->items[$id]);
            }
        }
    }
    public function removeItem($id)
    {
        $currency = DB::table('currency')->where('id', 1)->get();
        if(Auth::check())
        {
            if(Auth::user()->hasRole('entity'))
            {
                $this->totalQty -= $this->items[$id]['qty'];
                if($this->items[$id]['valut']==1){
                    $this->totalPrice -= $this->items[$id]['entityprice'] * $currency[0]->coefficient;
                }
                else{
                    $this->totalPrice -= $this->items[$id]['entityprice'];
                }

                unset($this->items[$id]);
            }
            if(Auth::user()->hasRole('individual'))
            {
                $this->totalQty -= $this->items[$id]['qty'];
                if($this->items[$id]['valut']==1){
                    $this->totalPrice -= $this->items[$id]['individualprice'] * $currency[0]->coefficient;
                }
                else{
                    $this->totalPrice -= $this->items[$id]['individualprice'];
                }
                unset($this->items[$id]);
            }
        }
        else
        {
                $this->totalQty -= $this->items[$id]['qty'];
                // dd($this->items[$id]['valut']);
                if($this->items[$id]['valut']==1){
                    $this->totalPrice -= $this->items[$id]['individualprice'] * $currency[0]->coefficient;
                }else{
                    $this->totalPrice -= $this->items[$id]['individualprice'];
                }


                unset($this->items[$id]);
        }
    }
}
