<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' =>2,
            'name' =>'John',
            'type' =>'vendor',
            'vendor_id' =>1,
            'mobile' =>'12345678',
            'email' =>'john@admin.com',
            'password' =>'$2y$10$YbxEd6hZY5v2E4u28O4Av.8Bi5vx2ZvVsGo9EWY7La3ImO/.rZ3hK',
            'image' => '',
            'status' => 0],
        ];
        Admin::insert($adminRecords);
    }
}
