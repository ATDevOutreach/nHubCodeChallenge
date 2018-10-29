<?php

namespace App\Repositories\Order;

interface OrderContract
{
	public function create($request);
  public function findAll();
  public function findById($id);
  public function update($request, $id);
  public function dispatchOrder($request, $id);
  public function remove($id);
  
}
