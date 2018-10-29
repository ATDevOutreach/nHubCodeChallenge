<?php

namespace App\Repositories\Admin;
use App\Repositories\Admin\AdminContract;
use App\User;
use Sentinel;

class EloquentAdminRepository implements AdminContract
{
    public function create($request) {
        
        $adminDetails = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => $request->password,
            
        ];
        
        $admin = Sentinel::registerAndActivate($request->all(), true);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($admin);
        return $admin;
    }
    
    public function remove($userId) {
        $user = Sentinel::findById($userId);
        $user->delete();
        return true;
    }
    
    
    /**
     * Returns all user records from the database
     */
    public function findAll() {
        return DB::table('users')->get();
    }

    public function findById($id) {
        $user = Sentinel::findById($id);
        return $user;
    }
    

	private function setAdminProperties($admin, $request) {
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->password = $request->password;
    }
}
