<?php

	namespace App\Repositories\Registration;
	use App\Repositories\Registration\RegistrationContract;
	use Sentinel;
	use Activation;
	use App\User;
	use Mail;

	class EloquentRegistrationRepository implements RegistrationContract {
		
		public function create($request) {
      
      $credentials = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email'    => $request->email,
        'password' => $request->password,
        'phone_number' => $request->phoneNumber,
        'address' => $request->address,
        'twitter' => $request->twitter,
        'facebook' => $request->facebook,
        'gplus' => $request->twitter
      ];

      $user = Sentinel::register($credentials);
      $activation = Activation::create($user);
      $role = Sentinel::findRoleBySlug('member');
      $role->users()->attach($user);

      $this->sendEmail($user, $activation->code);

      return $user;
  	}

    private function setUserProperties($user, $request) {
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
      // $user->phone_number = $request->phone_number;
      // $user->location = $request->location;
      $user->password = $request->password;
    }

    private function sendEmail($user, $code) {
    	try {
    		Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, activate your account.");
        });
    	} 
    	catch (\Swift_TransportException $e) {
    		dd($e);
    	}
        
    }
	}
