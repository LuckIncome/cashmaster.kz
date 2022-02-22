<?php 
 
namespace App; 

use Auth;
 
class Cart 
{ 
    public $items = null; 
    public $totalQty = 0; 
    public $totalPrice = 0; 
 
    public function __construct($oldCart) 
    { 
        if($oldCart) 
        { 
            $this->items = $oldCart->items; 
            $this->totalQty = $oldCart->totalQty; 
            $this->totalPrice = $oldCart->totalPrice; 
        } 
    } 
 
    public function add($item, $id) 
    {
        if(Auth::check())
        {
        if(Auth::user()->hasRole('entity'))
        {
            $storedItem = [ 
                'qty' => 0, 
                'entityprice' => $item->entityprice,
                'item' => $item 
            ];

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
        }
        if(Auth::user()->hasRole('individual'))
        {
            $storedItem = [ 
                'qty' => 0, 
                'entityprice' => $item->entityprice,
                'item' => $item 
            ];

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
        }
    }
        
        if(Auth::guest())
        {
            // dd('something');
            $storedItem = [ 
                'qty' => 0, 
                'individualprice' => $item->individualprice,
                'item' => $item 
            ];

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
        }
        
            
        // $storedItem = [ 
        //     'qty' => 0, 
        //     'individualprice' => $item->individualprice,
        //     'entityprice' => $item->entityprice,
        //     'item' => $item 
        // ];

        // dd($storedItem);
        // if($this->items) 
        // { 
        //     if(array_key_exists($id, $this->items)) 
        //     { 
        //         $storedItem = $this->items[$id]; 
 
        //     } 
        // } 
        // $storedItem['qty']++; 
        // $storedItem['individualprice'] = $item->individualprice * $storedItem['qty']; 
        // $this->items[$id] = $storedItem; 
        // $this->totalQty++; 
        // $this->totalPrice += $item->individualprice; 
    } 
 
    public function reduceByOne($id) 
    { 
        if(Auth::check())
        {
            if(Auth::user()->hasRole('entity'))
            {
                $this->items[$id]['qty']--; 
                $this->items[$id]['entityprice'] -= $this->items[$id]['item']['entityprice']; 
                $this->totalQty--; 
                $this->totalPrice -= $this->items[$id]['item']['entityprice']; 
         
                if($this->items[$id]['qty'] <= 0) 
                { 
                    unset($this->items[$id]); 
                } 
            }
            if(Auth::user()->hasRole('individual'))        
            {
                $this->items[$id]['qty']--; 
                $this->items[$id]['individualprice'] -= $this->items[$id]['item']['individualprice']; 
                $this->totalQty--; 
                $this->totalPrice -= $this->items[$id]['item']['individualprice']; 
         
                if($this->items[$id]['qty'] <= 0) 
                { 
                    unset($this->items[$id]); 
                }             
            }
        }else
        {
                $this->items[$id]['qty']--; 
                $this->items[$id]['individualprice'] -= $this->items[$id]['item']['individualprice']; 
                $this->totalQty--; 
                $this->totalPrice -= $this->items[$id]['item']['individualprice']; 
         
                if($this->items[$id]['qty'] <= 0) 
                { 
                    unset($this->items[$id]); 
                }            
        }
    } 
    public function removeItem($id) 
    { 
        if(Auth::check())
        {
            if(Auth::user()->hasRole('entity'))
            {
                $this->totalQty -= $this->items[$id]['qty']; 
                $this->totalPrice -= $this->items[$id]['entityprice']; 
         
                unset($this->items[$id]); 
            }
            if(Auth::user()->hasRole('individual'))        
            {
                $this->totalQty -= $this->items[$id]['qty']; 
                $this->totalPrice -= $this->items[$id]['individualprice']; 
         
                unset($this->items[$id]); 
            }
        }
        else
        {
                $this->totalQty -= $this->items[$id]['qty']; 
                $this->totalPrice -= $this->items[$id]['individualprice']; 
         
                unset($this->items[$id]);             
        }
    } 
}