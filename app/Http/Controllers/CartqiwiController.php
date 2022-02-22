<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\orders;
use App\Orders_user;
use App\Order_products;
use DB;
use Auth;

class CartController extends Controller
{
    public function add(){
        $id = request('id');
        $product = Product::find($id);

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart', $cart);

        return response()->json($cart->totalQty);
    }

    // public function add22(){
    //     $id = request('id');
    //     $product = Product::find($id);

    //     $oldCart = session()->has('cart2') ? session()->get('cart2') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);

    //     request()->session()->put('cart2', $cart);

    //     return response()->json($cart->totalQty);
    // }

    public function add2($id)
    {
        $product = Product::find($id);

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart', $cart);

        // dd(session()->get('cart'));

        return back();
    }

    public function index(){
        if(session()->has('cart'))
        {
            $products = session()->get('cart')->items;
        }
        // elseif(session()->has('cart2'))
        // {
        //     $products = session()->get('cart2')->items;
        // }
        else
        {
            $products = 'nothing';
        }
        $currency = DB::table('currency')->get();
        return view('basket', compact('products', 'currency'));
    }

    public function order(){
        if(session()->has('cart'))
        {
            $products = session()->get('cart')->items;
        }
        // elseif(session()->has('cart2'))
        // {
        //     $products = session()->get('cart2')->items;
        // }
        else
        {
            $products = 'nothing';
        }
        $currency = DB::table('currency')->get();
        return view('order', compact('products', 'currency'));
        // return view('order');
    }
    public function store(Request $request){
		
		$cart = session()->get('cart');
		
		
        $currency = DB::table('currency')->where('id', 1)->get();
        // dd($currency[0]->coefficient);
        $this ->validate(request(), [
            'name'=>'required',
            'address'=>'required',
            'post'=>'required',
            'address_user'=>'required',
            'payment'=>'required',
        ]);
		
		
		
		//Запись заказа в базу данных
		 if(session()->has('cart'))
        {
			
			
			$order_save = orders_user::create([
					'userid' => $request['userid'],
					'name' => $request['name'],
					'phone' => $request['phone'],
					'email' => $request['email'],
					'city' => $request['city'],
					'address' => $request['address_user'],
					'totalprice' => (float)$cart->totalPrice,
					'status' => 1,
					'paymenttype' => $request['payment'],
					'shippingttype' => $request['post'],
				]);
				
			if (Auth::check()){
	            if (Auth::user()->hasRole('entity')) {
	                foreach($cart->items as $product) {
				 
					 $products_order = order_products::create([
						'orders_user_id' => $order_save->id,
						'name' => $product['item']['name'],
						'count' => $product['qty'],
						'entityprice' => $product['entityprice'],
				// 		'price' => $product['individualprice'],
        					]);   
                     }
	            }
	            else{
	                foreach($cart->items as $product) {
				 
					 $products_order = order_products::create([
						'orders_user_id' => $order_save->id,
						'name' => $product['item']['name'],
						'count' => $product['qty'],
				// 		'entityprice' => $product['entityprice'],
						'price' => $product['individualprice'],
        					]);   
                     }	                
	            }
	        }	
			 
			 
		
			
			$this->sendemail($request, $cart, $order_save->id);
				
		
		
		}
        // $order_save->id    номер заказа для терминала

         $ordername2 = $request['amount'];
        $delimeter2 = explode("|", $ordername2);
        $deletelastelement2 = array_pop($delimeter2);
        $ordercount2 = count($delimeter2) - 1;

        $ordername = $request['name_tov'];
        $delimeter = explode("|", $ordername);
        $deletelastelement = array_pop($delimeter);
        $ordercount = count($delimeter) - 1;

     /*    for ($i = 0; $i <= $ordercount; $i++) {
            $orders = orders::create([
                'userid' => $request['userid'],
                'staticprice' => $request['address'],
                'name' =>$delimeter[$i],
                'amount' => $delimeter2[$i],

            ]);
        }  */
 
        // $orders = orders::create([
        //     'userid' => $request['userid'],
        //     'staticprice' => $request['address'],
        //     'name' => $request['name_tov'],
        //     'amount' => $request['amount'],

        // ]);
       

       

        request()->session()->forget('cart');
         return view('thank', [
 'zakaz_id' => $order_save->id,
]);
    }
	
	
	
	public function qiwiterminal(Request $request){
		
		$cart = session()->get('cart');
		
		
        $currency = DB::table('currency')->where('id', 1)->get();
        // dd($currency[0]->coefficient);
        $this ->validate(request(), [
            'name'=>'required',
            'address'=>'required',
            'post'=>'required',
            'address_user'=>'required',
            'payment'=>'required',
        ]);
		
		
		
		//Запись заказа в базу данных
		 if(session()->has('cart'))
        {
			
			
			$order_save = orders_user::create([
					'userid' => $request['userid'],
					'name' => $request['name'],
					'phone' => $request['phone'],
					'email' => $request['email'],
					'city' => $request['city'],
					'address' => $request['address_user'],
					'totalprice' => (float)$cart->totalPrice ,
					'status' => 1,
					'paymenttype' => $request['payment'],
					'shippingttype' => $request['post'],
				]);
				
			 foreach($cart->items as $product) {
				
					 order_products::create([
						'orders_user_id' => $order_save->id,
						'name' => $product['item']['name'],
						'count' => $product['qty'],
						'price' => $product['individualprice'],
					]);   
             }
		}
      
       
		 if(session()->has('cart'))
        {
			
			$this->sendemail($request, $cart, $order_save->id);
				
		}
		

        request()->session()->forget('cart');
         return view('qiwiterminal', [
 'zakaz_id' => $order_save->id,
  'order_total' => $order_save->totalprice,
]);
    }
	
	function sendemail($request, $cart, $order_id){
		
		$currency = DB::table('currency')->where('id', 1)->get();
		
		$message = "Имя: ".$request['name']."\n";
				$message .= "Сумма заказа: ".(float)$cart->totalPrice." тг\n";
				$message .= "Email: ".$request['email']."\n";
				$message .= "Телефон: ".$request['phone']."\n";
				$message .= "Город: ".$request['city']."\n";
				$message .= "Улица, дом, квартира: ".$request['address_user']."\n";
				$message .= "\nЗаказанные товары:";
				if(Auth::check())
				{
					if(Auth::user()->hasRole('entity'))
					{
						foreach($cart->items as $product) {
							$message .= $product['item']['name']." * ".$product['qty'].", Цена - ".$product['item']['entityprice']* $currency[0]->coefficient*$product['qty']."\n";
						}
					}else{
						foreach($cart->items as $product) {
							$message .= $product['item']['name']." * ".$product['qty'].", Цена - ".$product['item']['individualprice']* $currency[0]->coefficient*$product['qty']."\n";
						}
					}
				}else
				{
					foreach($cart->items as $product) {
						$message .= $product['item']['name']." * ".$product['qty'].", Цена - ".$product['item']['individualprice']* $currency[0]->coefficient *$product['qty']."\n";
					}

				}
			  
				
				$subject = "Заказ №".$order_id;

				$headers = 'From: no-reply@cashmaster.kz' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				mail('015@i-marketing.kz', $subject, $message, $headers);
				mail($request['email'], $subject, $message, $headers);
		
	}

    public function remove($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            session()->put('cart', $cart);
        }else{
            session()->forget('cart', $cart);
        }
        return redirect()->back();
    }

    public function redis($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        session()->put('cart', $cart);

        return redirect()->back();
    }
    
    public function paybox(Request $request){
        $this ->validate(request(), [
            'name'=>'required',
            'address'=>'required',
        ]);
		$currency = DB::table('currency')->where('id', 1)->get();
		
        $cart = session()->get('cart');
		
		 if(session()->has('cart'))
        {
			
			
			$order_save = orders_user::create([
					'userid' => $request['userid'],
					'name' => $request['name'],
					'phone' => $request['phone'],
					'email' => $request['email'],
					'city' => $request['city'],
					'address' => $request['address_user'],
					'totalprice' => (float)$cart->totalPrice,
					'status' => 1,
					'paymenttype' => $request['payment'],
					'shippingttype' => $request['post'],
				]);
				
			 foreach($cart->items as $product) {
				 
					 $products_order = order_products::create([
						'orders_user_id' => $order_save->id,
						'name' => $product['item']['name'],
						'count' => $product['qty'],
						'price' => $product['individualprice'],
					]);   
             }
		}
      
       
		 if(session()->has('cart'))
        {
			
			$this->sendemail($request, $cart, $order_save->id);
				
		}

        // $message = "Имя: ".request('name')."\nАдрес:".request('address')."\nЗаказанные товары:";
        // foreach($cart->items as $product) {
        //     $message .= $product['item']['title']." * ".$product['qty'].", Цена - ".$product['item']['price']*$product['qty']."\n";
        // }
        // $message .= "\nИтого: ".$cart->totalPrice." тг\n";
        // $subject = "Заказ товара";

        // $headers = 'From: info@hansolomed.kz' . "\r\n" .
        //     'Reply-To: info@hansolome.kz' . "\r\n".
        //     'X-Mailer: PHP/' . phpversion();

        // mail('015@i-marketing.kz', $subject, $message, $headers);

        // request()->session()->forget('cart');

        $strOrderDescription = 'Заказ товара Cashmaster';
        $strCurrency = 'KZT';
        $merchant_id = 514141;
        $secretWord = 'zkW8DAiX5MMbEQt8';
        
        $request = [
            'pg_amount' => $cart->totalPrice, //общая сумма платежа
            'pg_description' => $strOrderDescription,
            'pg_encoding' => 'UTF-8',
            'pg_currency' => $strCurrency, //валюта платежа, например KZT
            'pg_user_ip' => $_SERVER['REMOTE_ADDR'],
            'pg_lifetime' => !empty($lifetime) ? $lifetime * 3600 : 86400, //время жизни платежа
            'pg_merchant_id' => $merchant_id, //id магазина в нашей системе
            'pg_result_url' => 'http://laravel-shop/', //url куда отсылается результат проведения платежа
            'pg_request_method' => 'POST',
            'pg_salt' => rand(21, 43433), //соль, которая будет использоваться в шифровании запроса
            'pg_success_url' => 'http://test10.testkz.ru/', //сюда вернем клиента, если оплата прошла успешно
            'pg_failure_url' => 'http://test9.testkz.ru/', //сюда вернем клиента, если оплата провалилась
            'pg_user_phone' => '+'.preg_replace("/[^,.0-9]/", '', request('phone')), //телефон клиента, который он увидит в форме оплаты на нашем портале
            'pg_user_contact_email' => request('email') //email клиента, куда ему пришлется уведомление о статусе оплаты
            ];


        foreach ($_POST as $k => $v) {
            $request[$k] = $v;
        }

        //определяете куда отправить запрос, например payment.php
        $url = 'payment.php';

        //генерируете сигнатуру и добавляете ее в массив

        ksort($request); //сортируем массив по ключам
        array_unshift($request, $url); //добавляем в начало массива имя скрипта
        array_push($request, $secretWord); //добавляем свой секретный ключ (его можно взять в личном кабинете)
        $signature = md5(implode(';', $request)); //склеиваем массив в строку и хэшируем ее для получения сигнатуры

        $request['pg_sig'] = $signature;

        unset($request[0], $request[1]);
        //создаем http-строку
        $query = http_build_query($request);

        request()->session()->forget('cart');

        //отправляем клиента на страницу оплаты
        return redirect('https://api.paybox.money/' . $url . '?' . $query);
		
    }
}
