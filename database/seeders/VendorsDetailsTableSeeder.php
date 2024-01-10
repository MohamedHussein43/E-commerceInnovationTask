<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;
class VendorsDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id' => 1, 'vendor_id' =>1, 'shop_name'=> 'John Electronics Store', 'shop_mobile' => '12345678', 'shop_email' => 'john@admin.com', 'business_license_number' => '123456', 'gst_number' => '65415641', 'pan_number' => '94594565'],
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
