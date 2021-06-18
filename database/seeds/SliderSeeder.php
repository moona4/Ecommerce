<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Slider::create([
            'title' => 'Happy Teej',
            'image' => 'image',
            'type' => 'Type',
            'expires_on' => '2020-08-11 12:00:00'
        ]);

        Slider::create([
            'title' => 'Happy Dashain',
            'image' => 'image',
            'type' => 'Type',
            'expires_on' => '2020-08-11 12:00:00'
        ]);

        Slider::create([
            'title' => 'Happy Tihar',
            'image' => 'image',
            'type' => 'Type',
            'expires_on' => '2020-08-11 12:00:00'
        ]);
    }
}
