<?php

namespace App\Repositories\Sms;

interface SmsContract
{
	// public function sendSms($request);
	public function sendMessage($request);
	public function sendChatMessage($request);
}
