<?php

use App\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfile::create([
'name'=>'Aayokhana',
'pan_vat_no'=>'22',
'email'=>'admin@myself.com',
'address'=>'Butwal',
'phone_no'=>'071000000',
'mobile_no'=>'9867415849',
'website'=>'aayokhana.com',
'latitude'=>'34',
'longitude'=>'88'
        ]);
    }
}
