<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_settings')->truncate();

        $app_settings = [
            // Site Name, LOGO & URL Settings
            ['setting_name' => 'site_title', 'setting_value' => 'Forebel Education', 'created_at' => now(), 'updated_at' => now(),],
            ['setting_name' => 'tag_line', 'setting_value' => 'Parent end School commcunication', 'created_at' => now(), 'updated_at' => now(),],
            ['setting_name' => 'admin_email', 'setting_email' => 'im@shaz3e.com', 'created_at' => now(), 'updated_at' => now(),],
            ['setting_name' => 'time_zone', 'setting_email' => '', 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('app_settings')->insert($app_settings);
    }
}
