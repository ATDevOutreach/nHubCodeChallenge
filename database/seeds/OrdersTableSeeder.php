<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'items' => 'Bread - 2, Tooth paste - 1, Dettol Soap - 5',
            'phone' => '2347035039214',
            'packaged' => '0',
            'dispatched' => '0'            
        ]);
        
        DB::table('orders')->insert([
            'items' => 'Salt - 2, Maggi - 3, Sardine - 1, detergent - 8',
            'phone' => '2347035039214',
            'packaged' => '0',
            'dispatched' => '0'
        ]);
        
        DB::table('orders')->insert([
            'items' => 'Tissue paper - 7, Body spray - 2',
            'phone' => '2347035039214',
            'packaged' => '1',
            'dispatched' => '1'
        ]);
    }
}
