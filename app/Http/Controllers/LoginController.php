<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Repositories\Login\LoginContract;
    use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
    use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
    use Sentinel;
    use App\User;
    use Reminder;
    use Mail;

    class LoginController extends Controller {
        protected $repo;

        public function __construct(LoginContract $loginContract) {
            $this->repo = $loginContract;
        }
        
        public function getLogin(){
            return view('auth.login');
        }
        
        public function doLogin(Request $request) {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = [
                'email'    => $request->email,
                'password' => $request->password,
            ];
            
            try {

                if(Sentinel::authenticate($credentials)) {
                    $authUser = Sentinel::getUser();
                    $bioStatus = Sentinel::getUser()->bio_status;
                    try {
                        if(Sentinel::getUser()->roles()->first()->slug == 'superadmin') {
                            return redirect()->route('super_admin_dash');
                        }
                        else if (Sentinel::getUser()->roles()->first()->slug == 'admin') {

                            if($bioStatus == '0') {
                                return redirect()->route('account.update', $authUser->id);
                            }
                            elseif ($bioStatus == '1'){
                                return redirect()->route('admin_dash');
                            }                 
                        }
                        else if (Sentinel::getUser()->roles()->first()->slug == 'member') {
                            
                            if($bioStatus == '0') {
                                return redirect()->route('account.update', $authUser->id);
                            }
                            else if ($bioStatus == '1'){
                                return redirect()->route('user_dash');
                            }
                        }
                    } 
                    catch (\BadMethodCallException $e) {
                        return redirect()->route('get_login')->with('error', 'Your Session has expired. Please login again!');
                    }
                }
                else{                    
                    return redirect()->back()->withInput()->with('error', 'Ops... Your Login Credentials did not match');
                }
            }
            catch(ThrottlingException $e){
                $delay = $e->getDelay();
                return redirect()->back()->with(['error' => "Ops.. You have been banned for $delay seconds."]);
            }
            catch(NotActivatedException $e){
                return redirect()->back()->with(['error' => 'Ops... Your account is not yet activated, please check your email for activation code or link']);
            }
        }

        public function logout() {
            Sentinel::logout(null, true);
            return redirect()->route('get_login');
        }
        
    }
