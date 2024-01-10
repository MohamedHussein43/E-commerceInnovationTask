<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;
class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id' => 1, 'vendor_id' =>1, 'account_holder_name' => 'John', 'bank_name'=> 'ICIC', 'account_number'=> '021654545545', 'bank_ifsc_code' => '65415166'],
        ];
        VendorsBankDetail::insert($vendorRecords);

    }
}
