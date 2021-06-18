<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'first_name' => 'Rahul',
            'last_name' => 'Thapa',
            'username' => 'rahulthapa',
            'email' => 'rahulthapa043@gmail.com',
            'mobile_no' => '9816491822',
            'address' => 'Devdaha-10, Charange',
            'gender' => 'male',
            'password' => bcrypt('rahulthapa043'),
            'display_name' => 'Rahul Thapa'
        ]);
    }
}
