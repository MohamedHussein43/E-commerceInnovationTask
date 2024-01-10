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
            ['id' =>1,
            'name' =>'Super Admin',
            'type' =>'superadmin',
            'vendor_id' =>0,
            'mobile' =>'01215105',
            'email' =>'admin@admin.com',
            'password' =>'$2y$10$YbxEd6hZY5v2E4u28O4Av.8Bi5vx2ZvVsGo9EWY7La3ImO/.rZ3hK',
            'image' => '',
            'status' => 1],
        ];
        Admin::insert($adminRecords);
    }
}
