<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Repositories\Sms\SmsContract;

	class SmsController extends Controller
	{

		protected $repo;

		public function __construct(SmsContract $smsContract) {
			$this->repo = $smsContract;
		}

	    

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function sendChatMessage(Request $request)
	    {
			$sms = $this->smsRepo->sendMessage($request);
			if($sms) {
				return redirect()->back()->with('success', 'Thank you for your interest, someone from our team would contact you soon');
			}
	    }

	    
	}
