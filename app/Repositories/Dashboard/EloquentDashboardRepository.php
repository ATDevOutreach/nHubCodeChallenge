<?php
namespace App\Repositories\Dashboard;
use App\Repositories\Dashboard\DashboardContract;
use Sentinel;

class EloquentDashboardRepository implements DashboardContract
{
	public function findAll() {
        return DB::table('users')->get();
    }

    public function findById($id) {
        $user = Sentinel::findById($id);
        return $user;
    }

}
