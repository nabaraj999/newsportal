<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'Global News Network',
            'logo' => 'storage/company/global-news-logo.png',
            'phone' => '+977-1-4123456',
            'email' => 'contact@globalnews.com',
            'facebook' => 'https://facebook.com/globalnews',
            'instagram' => 'https://instagram.com/globalnews',
            'youtube' => 'https://youtube.com/globalnews',
        ]);
    }
}
