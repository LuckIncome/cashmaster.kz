<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Response;
use App\Order_products;
use App\Orders_user;

class QiwitermController extends Controller
{
	
	public function index(Request $request){
		
		$ip = array('89.218.54.34', '89.218.54.36', '212.154.215.82', '79.142.55.227', '91.204.114.67');
		    //if(!empty($_GET['account']) and !empty($_GET['txn_id']) and in_array($request->ip(),$ip)){
			if(!empty($_GET['account']) and !empty($_GET['txn_id'])){
			
			$id = preg_replace("/[^0-9]/", '', $_GET['account']);
			$order = Orders_user::find($_GET['account']);
			$xml = new \DOMDocument( "1.0", "UTF-8" );
			$xml_response = $xml->createElement( "response" );
			if(!empty($order->totalprice)){
			switch ($_GET['command']) {
				case 'check':
						
						if($order->status == 1){
							$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
							$xml_result = $xml->createElement( "result", 0 );
							$xml_fields = $xml->createElement( "fields" );
							$xml_field1 = $xml->createElement( "field1" , $order['totalprice']);
							$xml_field1->setAttribute( "name" , "sum" );
							$xml_fields->appendChild( $xml_field1 );
							$xml_field2 = $xml->createElement( "field2" , $order['name']);
							$xml_field2->setAttribute( "name" , "name" );
							$xml_fields->appendChild( $xml_field2 );
							$xml_field3 = $xml->createElement( "field3" , $order['phone']);
							$xml_field3->setAttribute( "name" , "phone" );
							$xml_fields->appendChild( $xml_field3 );
							$xml_comment = $xml->createElement( "comment", "ОК" );
							$xml_response->appendChild( $xml_osmp_txn_id );
							$xml_response->appendChild( $xml_result );
							$xml_response->appendChild( $xml_fields );
							$xml_response->appendChild( $xml_comment );
							$xml->appendChild( $xml_response );
						}else{
							$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
							$xml_result = $xml->createElement( "result", 7 );
							$xml_comment = $xml->createElement( "comment", "Прием платежа запрещен провайдером" );
							$xml_response->appendChild( $xml_osmp_txn_id );
							$xml_response->appendChild( $xml_result );
							$xml_response->appendChild( $xml_comment );
							$xml->appendChild( $xml_response );
						}
					  break;
				case 'pay':
					  if((float)$order->totalprice == (float)$_GET['sum']){
						    $info = "Заявка - ".$_GET['account']." Сумма - ".$_GET['sum']." Дата - ".$_GET['txn_date']." Номер платежа - ".$_GET['txn_id'];
						    $order->description = $info;
						    $order->status = 2;
						    $order->save();
							$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
							$xml_prv_txn = $xml->createElement( "prv_txn", $_GET['account'] );
							$xml_sum = $xml->createElement( "sum", $_GET['sum'] );
							$xml_result = $xml->createElement( "result", 0 );
							$xml_comment = $xml->createElement( "comment", "ОК" );
							$xml_response->appendChild( $xml_osmp_txn_id );
							$xml_response->appendChild( $xml_prv_txn );
							$xml_response->appendChild( $xml_sum );
							$xml_response->appendChild( $xml_result );
							$xml_response->appendChild( $xml_comment );
							$xml->appendChild( $xml_response );
							$this->sendemail($order);
					  }else{
						  if((float)$order->totalprice > (float)$_GET['sum']){
							$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
							$xml_prv_txn = $xml->createElement( "prv_txn", $_GET['account'] );
							$xml_sum = $xml->createElement( "sum", $_GET['sum'] );
							$xml_result = $xml->createElement( "result", 241 );
							$xml_comment = $xml->createElement( "comment", "Сумма слишком мала" );
							$xml_response->appendChild( $xml_osmp_txn_id );
							$xml_response->appendChild( $xml_prv_txn );
							$xml_response->appendChild( $xml_sum );
							$xml_response->appendChild( $xml_result );
							$xml_response->appendChild( $xml_comment );
							$xml->appendChild( $xml_response );
						  }elseif((float)$order->totalprice < (float)$_GET['sum']){
							$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
							$xml_prv_txn = $xml->createElement( "prv_txn", $_GET['account'] );
							$xml_sum = $xml->createElement( "sum", $_GET['sum'] );
							$xml_result = $xml->createElement( "result", 242 );
							$xml_comment = $xml->createElement( "comment", "Сумма слишком велика" );
							$xml_response->appendChild( $xml_osmp_txn_id );
							$xml_response->appendChild( $xml_prv_txn );
							$xml_response->appendChild( $xml_sum );
							$xml_response->appendChild( $xml_result );
							$xml_response->appendChild( $xml_comment );
							$xml->appendChild( $xml_response ); 
						  }
					  }
					  break;
			}
			$answer = $xml->saveXML();	
		}else{
			$xml_osmp_txn_id = $xml->createElement( "osmp_txn_id", $_GET['txn_id']);
			$xml_result = $xml->createElement( "result", 5 );
			$xml_comment = $xml->createElement( "comment", "Идентификатор абонента не найден (Ошиблись номером)" );
			$xml_response->appendChild( $xml_osmp_txn_id );
			$xml_response->appendChild( $xml_result );
			$xml_response->appendChild( $xml_comment );
			$xml->appendChild( $xml_response );
			$answer = $xml->saveXML();	
		}
	

			$response = Response::make($answer, '200');
			$response->header('Content-Type', 'text/xml');

			return $response;
			}
    }
	
	function sendemail($order){
		
		        
				$message  = "ЗАКАЗ ОПЛАЧЕН\n";
		        $message .= "Имя: ".$order->name."\n";
				$message .= "Сумма заказа: ".(float)$order->totalprice." тг\n";
				$message .= "Email: ".$order->email."\n";
				$message .= "Телефон: ".$order->phone."\n";
				$message .= "Город: ".$order->city."\n";
				$message .= "Улица, дом, квартира: ".$order->address."\n";
				$message .= "\nЗаказанные товары:";
				
				foreach ($order->order_products as $order_products) {
					$message .= $order_products->name." * ".$order_products->count.", Цена - ".$order_products->price * $order_products->count."\n";
				}
				
				$message .= "Способ оплаты: Qiwi-терминал\n";
		
				
				$subject = "Заказ ОПЛАЧЕН №".$order->id;

				$headers = 'From: info@cashmaster.kz' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				$to = "info@cashmaster.kz,".$order->email;
				
				mail($to, $subject, $message, $headers); //015@i-marketing.kz
				
				return true;
	}
	
}