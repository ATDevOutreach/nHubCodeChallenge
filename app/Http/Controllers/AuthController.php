<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Auth\AuthContract;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Sentinel;
use App\User;
use Reminder;
use Mail;

class AuthController extends Controller
{
	protected $repo;
	public function __construct(AuthContract $authContract) {
		$this->repo = $authContract;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin(){
        return view('auth.signin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        $user = Sentinel::authenticate($credentials);

        try {
            if($user) {
                
                Sentinel::login($user);
                session(['currentUser' => $user]);
                
                try {
                    if(Sentinel::getUser()->roles()->first()->slug == 'superadmin') {
                        session(['currentUserRole' => 'superadmin']);
                        session(['currentUserId' => $user->id]);
                        return redirect()->route('super_admin_dash');
                    }else if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                        session(['currentUserRole' => 'admin']);
                        session(['currentUserId' => $user->id]);
                        return redirect()->route('admin_dash');
                    }else if (Sentinel::getUser()->roles()->first()->slug == 'user') {
                        if (isset($user->package_id) != 0) {
                            session(['currentUserRole' => 'user']);
                            session(['currentUserId' => $user->id]);
                            return redirect()->route('user_dash');
                        } else {
                            session(['currentUserId' => $user->id]);
                            return redirect()->route('package.select');
                        }
                    }
                } catch (\BadMethodCallException $e) {
                    return redirect()->route('login')->with('error', 'Your Session has expired. Please login again!');
                }
            } else {                    
                return redirect()->back()->withInput()->with('error', 'Ops... Your Login Credentials did not match');
            }
        }catch(ThrottlingException $e){
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "Ops.. You have been banned for $delay seconds."]);
        }catch(NotActivatedException $e){
            return redirect()->back()->with(['error' => 'Ops... Your account is not yet activated, please check your email for activation code or link']);
        }
    }

    public function logout() {
        Sentinel::logout();
        return redirect()->route('get_login');
    }
}
