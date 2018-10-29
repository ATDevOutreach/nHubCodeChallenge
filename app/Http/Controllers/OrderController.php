<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Repositories\Order\OrderContract;
	use App\Repositories\Sms\SmsContract;
	use App\Order;

	class OrderController extends Controller
	{

		protected $repo;
		protected $smsRepo;

		public function __construct(OrderContract $orderContract, SmsContract $smsContract) {
			$this->repo = $orderContract;
			$this->smsRepo = $smsContract;
		}

	    /**
	     * Display a listing of the resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function index()
	    {
			// $orders = Order::all();
			$orders = $this->repo->findAll();
			// dd($orders);
	        return view('order.index')->with('orders', $orders);
		}
		
		public function dispatchOrder(Request $request, $id) {
       		$this->validate($request, [
        		'dispatched' => 'required',
				'packaged' => 'required',
				'phone' => 'required',
			  ]);
			  
			//   dd($request->all());

        	try {
				  $order = $this->repo->dispatchOrder($request, $id); 
				  $sms = $this->smsRepo->sendMessage($request);
				//   dd($sms);
          		if ($order->id && $sms) {
            		return redirect()->back()->with('success', 'Order Dispatched successfully');
				} else {
					return redirect()->back()->with('error', 'Could not dispatch. Try again!');
				}
        	} catch (Exception $e) {
          		return redirect()->back()->with('error', 'Unknown error occured. Try again!');
        	}
	    }

	    /**
	     * Show the form for creating a new resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function create()
	    {
	        //
	    }

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function store(Request $request)
	    {
	        //
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
