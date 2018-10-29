<?php

namespace App\Repositories\Admin;

interface AdminContract
{
	public function create($request);
	public function findAll();
	// public function findById($id);
}
