<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminCredentials = [
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone_number' => '1234567890',
            'email' => 'superadmin@terminus.ng',
            'address' => 'Jos',
            'password' => 'secret',
            // 'sluger' => 'super',
            'bio_status' => '0'            
        ];
        
        $superAdmin = Sentinel::registerAndActivate($superAdminCredentials, true);
        $role = Sentinel::findRoleBySlug('superadmin');
        $role->users()->attach($superAdmin);
        
        $adminCredentials = [
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone_number' => '1234567890',
            'email' => 'admin@termimus.ng',
            'address' => 'Jos',
            'password' => 'secret',
            // 'sluger' => 'admin',
            'bio_status' => '1'
            
        ];
        
        $admin = Sentinel::registerAndActivate($adminCredentials, true);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($admin);
        
        $userCredentials = [
            'first_name' => 'Nani',
            'last_name' => 'User',
            'phone_number' => '1234567890',
            'email' => 'user@terminus.ng',
            'address' => 'Jos',
            'password' => 'secret',
            // 'sluger' => 'nani-user',
            'bio_status' => '1'
        ];
        
        $user = Sentinel::registerAndActivate($userCredentials, true);
        $role = Sentinel::findRoleBySlug('member');
        $role->users()->attach($user);
    }
}
