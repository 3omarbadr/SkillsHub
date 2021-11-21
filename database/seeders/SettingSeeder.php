<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            'email' => 'contact@skillshub',
            'phone' => '01067642806',
            'facebook' => 'https://www.facebook.com/3omarBadr',
            'linkedin' => 'https://www.linkedin.com/in/3omarbadr/',
            'twitter' => 'https://www.twitter.com/3omrbadr',
            'instagram' => 'https://www.instagram.com/3omrbadr',
            'youtube' => 'https://www.youtube.com/channel/UC9A9W4foksnXtB7veK4wv0Q',

        ]);
    }
}
