<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Politics',
            'Technology',
            'Sports',
            'Entertainment',
            'Business',
            'Health',
            'World',
            'Opinion',
            'Local',
            'Science',
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
