<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'locale' => 'en',
                'name' => 'English',
            ],

            [
                'locale' => 'zh_CN',
                'name' => '中国',
            ],

            [
                'locale' => 'km',
                'name' => 'ខ្មែរ',
            ],
        ];

        Language::upsert($languages, 'locale', ['name']);
    }
}
