<?php

use App\User;
use App\UserPassword;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdministratorUser = User::create([
            'first_name' => 'Super',
            'last_name' => 'Administrator',
            'username' => 'superadministrator',
            'email' => 'super@administrator.com',
            'mobile_no' => '9816491822',
            'address' => 'Devdaha-10, Charange',
            'gender' => 'male',
            'password' => bcrypt('nct@dhakrefood100%'),
            'display_name' => 'Super Administrator',
            'status' => 1
        ]);
        $superAdministratorUser->assignRole('Super Administrator');

        $administratorUser = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Myself',
            'username' => 'adminmyself',
            'email' => 'admin@myself.com',
            'mobile_no' => '9843986469',
            'address' => 'Butwal',
            'gender' => 'male',
            'password' => bcrypt('ajakcha123'),
            'display_name' => 'Admin Myself',
            'status' => 1
        ]);
        UserPassword::create([
            'user_id' => $administratorUser->id,
            'password' => 'ajakcha123'
        ]);
        $administratorUser->assignRole('Administrator');
    }
}
