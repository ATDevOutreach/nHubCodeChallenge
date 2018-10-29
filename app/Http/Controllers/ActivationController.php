<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Activation\ActivationContract;
use Activation;
use Sentinel;
use App\User;

class ActivationController extends Controller
{
    
    protected $repo;

    public function __construct(ActivationContract $activationContract) {
        $this->repo = $activationContract;
    }
    
    public function activate($email, $activationCode) {

        // $this->repo->AccountActivation()
        
        $user = User::whereEmail($email)->first();

        if (Activation::complete($user, $activationCode)) {
            return redirect()->route('get_login');
        }else {
            return redirect()->back()->with(['error' => 'Wrong Credentials']);
        }

    }
    
}
