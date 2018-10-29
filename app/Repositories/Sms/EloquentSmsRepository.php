<?php

namespace App\Repositories\Sms;
use App\Repositories\Sms\SmsContract;
use App\Repositories\Sms\AfricasTalkingGateway;

class EloquentSmsRepository implements SmsContract
{

	
	public function sendMessage($request) {
		$username   = "sandbox";
		$apikey     = "62c81e27bf56cdbd40286ddab299a217588ad97c407000c2508a8a3d0911bb4c";
		$recipients = $request->phone;		
		$message    = "Hi, Your order is ready for pick-up";
		
		$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");
		
		try { 
			$results = $gateway->sendMessage($recipients, $message);
			return $results;
		} catch ( AfricasTalkingGatewayException $e ) {
			echo "Encountered an error while sending: ".$e->getMessage();
		}
	}

	public function sendChatMessage($request) {
		$username   = "sandbox";
		$apikey     = "62c81e27bf56cdbd40286ddab299a217588ad97c407000c2508a8a3d0911bb4c";
		$recipients = $request->phone;

		$message    = "Thank you for your order, someone from our team would contact you soon";
		
		$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");
		
		try { 
			$results = $gateway->sendMessage($recipients, $message);
			return $results;
		} catch ( AfricasTalkingGatewayException $e ) {
			echo "Encountered an error while sending: ".$e->getMessage();
		}
	}
}
