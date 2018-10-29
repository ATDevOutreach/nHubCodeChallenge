<?php

namespace App\Repositories\Order;
use App\Repositories\Order\OrderContract;
use App\Order;

class EloquentOrderRepository implements OrderContract
{

	public function create($request) {
    
  }

  // return all Orders
  public function findAll() {
    $order = Order::all();
    return $order;
  }

  // return a Order by ID
  public function findById($id) {
    return Order::where('id', $id)->first();
  }

  public function findBySlug($slug){
    return User::where('sluger', $slug)->first();
  }

  // Update an Order
  public function update($request, $id) {
    $order = $this->findById($id);
    $order->phone_number = $request->phone_number;    
    $order->save();
    return $order;
	}
	
	// Update an Order
  public function dispatchOrder($request, $id) {
    $order = $this->findById($id);
    $order->dispatched = $request->dispatched;
    $order->packaged = $request->packaged;
    $order->save();
    return $order;
  } 

  // Remove an Order
  public function remove($id) {
    $removeOrder= $this->findById($id);
    return $removeOrder->delete();
  }
}
