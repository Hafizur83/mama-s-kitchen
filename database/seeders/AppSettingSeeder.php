<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppSetting;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSetting::updateOrInsert([
            'title' => 'title',
            'favicon' => 'favicon.ico',
            'logo' => 'logo.png',
            'email' => 'example@gmail.com',
            'phone' => '0170000000',
            'social' => 'www.facebook.com,www.youtube.com',
            'address' => 'Rajshahi,Bangladesh',
        ]);
    }
}
