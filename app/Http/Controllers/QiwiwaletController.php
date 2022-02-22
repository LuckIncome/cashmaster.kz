<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Response;
use App\Order_products;
use App\Orders_user;
use App\Product;
use App\Cart;
use App\orders;
use Auth;


class QiwiwaletController extends Controller
{
	
	public function index(Request $request){
		
		//Добавление в базуданных товаров 
		
		$qiwi = "0";
		
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
				
			//Редактирование номера телефона и приведение его в вид приемлемый для отправки в запросе
		    $products_name_full = "";
		    $vowels = array("(", ")", "+", " ", "-");
		    $trimmed = str_replace($vowels, "", $request['phone']);
		    $sub_str_firts = substr($trimmed, 0, 1);
		    
		    if ($sub_str_firts == "8"){
		        $trimmed = substr($trimmed, 1, 15);
		        $trimmed = "7".$trimmed;
		    }
		    
			foreach($cart->items as $product) {
				
				    $products_name_full = $products_name_full.', '.$product['item']['name'];
				
			    	order_products::create([
						'orders_user_id' => $order_save->id,
						'name' => $product['item']['name'],
						'count' => $product['qty'],
						'price' => $product['individualprice'],
					]);   
             }
		}
		
		
		
		//Выставление счета через киви
		
        //Идентификатор магазина из вкладки "Данные магазина"
        $SHOP_ID = "35310";
        //API ID из вкладки "Данные магазина"
        $REST_ID = "107039843";
        //API пароль из вкладки "Данные магазина"
        $PWD = "mQ1fvNJPQ";
        //ID счета
        $BILL_ID = "order_id_".$order_save->id;
        $PHONE = $request['phone'];
        
        $data = array(
            "user" => "tel:+".$trimmed,
            "amount" => $order_save->totalprice.".00",
            "ccy" => "KZT",
            "comment" => $products_name_full,
            "lifetime" => "2020-05-21T18:00:00",
            "account" => $order_save->id
        );
        
        $ch = curl_init('https://qwproxy.qiwi.com/api/v2/prv/'.$SHOP_ID.'/bills/'.$BILL_ID);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $REST_ID.":".$PWD);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));
        $results = curl_exec ($ch) or die(curl_error($ch));
        /*echo $results;
        echo curl_error($ch);*/
        curl_close ($ch);
        
        $url = 'https://bill.qiwi.com/order/external/main.action?shop='.$SHOP_ID.'&transaction='.$BILL_ID.'&successUrl=https://cashmaster.kz/&failUrl=https://cashmaster.kz/';
        
        echo '<br><br><b>Ваш запрос обрабатывается</b>';
        
        if(session()->has('cart'))
        {
			$this->sendemail($request['email'], $request, $cart, $order_save->id);
        }
		
        
        header( 'Refresh: 1; url='.$url );
        
    }
    
    function sendemail($mail, $request, $cart, $order_id){
		
	$currency = DB::table('currency')->where('id', 1)->get();
		
		$message = "Имя: ".$request['name']."\n";
				$message .= "Сумма заказа: ".(float)$cart->totalPrice." тг\n";
				$message .= "Email: ".$request['email']."\n";
				$message .= "Телефон: ".$request['phone']."\n";
				$message .= "Город: ".$request['city']."\n";
				$message .= "Улица, дом, квартира: ".$request['address_user']."\n";
				$message .= "\nЗаказанные товары: ";
				if(Auth::check())
				{
					if(Auth::user()->hasRole('entity'))
					{
						foreach($cart->items as $product) {
							$message .= $product['item']['name']." * ".$product['qty']."\n";
						}
					}else{
						foreach($cart->items as $product) {
							$message .= $product['item']['name']." * ".$product['qty']."\n";
						}
					}
				}else
				{
					foreach($cart->items as $product) {
						$message .= $product['item']['name']." * ".$product['qty']."\n";
					}

				}
				
				$subject = "Заказ №".$order_id;

				$headers = 'From: info@cashmaster.kz' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				$to = "info@cashmaster.kz,".$mail;
				
				mail($to, $subject, $message, $headers);
	}
	
}