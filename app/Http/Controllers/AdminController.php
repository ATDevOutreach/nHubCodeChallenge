<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Repositories\Admin\AdminContract;
	use Sentinel;

	class AdminController extends Controller {

		protected $repo;

		public function __construct(AdminContract $adminContract) {
			$this->repo = $adminContract;
		}

	    /**
	     * Display a listing of the resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function index() {
	        
	        // check if user is logged in
	        if (Sentinel::check()) {	        	
	        	$user = Sentinel::getUser();
	        	// $users = $this->repo->findAll();
	        	return view('admin.index')->with('user', $user);
	        } else {
	        	return redirect()->route('get_login');
	        }
	        
	    }


	    public function profile($id) {

	    	if (Sentinel::check()) {
	    		$profile = $this->repo->findById($id);
		    	$url_encode= Crypt::encrypt($profile);
		    	dd($profile);
		    	return view('admin.profile')->with('url_encode', $url_encode);
	    	} else {
	    		return redirect()->route('get_login');
	    	}
	    	
	    }

	    /**
	     * Show the form for creating a new resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function create()
	    {
	        return view('admin.create');
	    }

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function store(Request $request) {
	    	// dd($request->all());
	    	
	    	$this->validate($request, [
            	'first_name' => 'required',
            	'last_name' => 'required',
            	'username' => 'required',
            	'email' => 'required',
            	'phone_number' => 'required'
        	]);

        	try {
            	$admin = $this->repo->create($request);
        		
            	if ($admin->id) {
             
            		return redirect()->back()
                	->with('success', 'User successfully added');
            	} else {
                	return back()
                    ->withInput()
                    ->with('error', 'Could not add User. Try again!');
            	}
        	
        		
        	} catch (QueryException $e) {
            	if ($e->errorInfo[1] == 1062) {
                	return back()
                    ->withInput()
                    ->with('error', 'User exists!');
            	}
        	}
	    }
	   
	    /**
	     * Display the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function show($id)
	    {
	        //
	    }

	    /**
	     * Show the form for editing the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function edit($id)
	    {
	        //
	    }

	    /**
	     * Update the specified resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function update(Request $request, $id)
	    {
	        //
	    }

	    /**
	     * Remove the specified resource from storage.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function delete($id)
	    {
	        //
	    }
	}
