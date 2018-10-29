<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'slug' => 'superadmin',
            'name' => 'Super Admin',
        ]);
        
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Admin',
        ]);
        
        DB::table('roles')->insert([
            'slug' => 'member',
            'name' => 'Member',
        ]);
    }
}
