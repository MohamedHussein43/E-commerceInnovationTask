<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id' => 1, 'name' => 'John','email' => 'john@admin.com','password' => '$2y$10$YbxEd6hZY5v2E4u28O4Av.8Bi5vx2ZvVsGo9EWY7La3ImO/.rZ3hK', 'mobile' => '12345678', 'status' => 0],
        ];
        Vendor::insert($vendorRecords);
    }
}
