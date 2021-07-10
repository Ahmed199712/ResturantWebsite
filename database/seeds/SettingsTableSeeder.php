<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        $settings = new Setting;
        $settings->website_name = 'Resturant';
        $settings->website_logo = 'uploads/website/logo.png';
		$settings->website_email ='resturant@gmail.com';
		$settings->website_phone = '01145987854';
		$settings->website_address = 'Abdelsalam Aref';
		$settings->website_desc = 'Welcome To Resturant Management System';
		$settings->save();
    }
}
