<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Breaking: New Healthcare Policy Launched',
                'content' => '<p>In a significant move to improve healthcare accessibility, the government has launched a comprehensive new healthcare policy aimed at providing better medical services to rural areas. The policy includes groundbreaking initiatives and funding mechanisms to ensure equitable healthcare distribution across the nation.</p><p>Key highlights include: expanded telemedicine services, increased funding for rural hospitals, and improved pharmaceutical supply chains. Healthcare experts have praised the move as a step forward in addressing long-standing healthcare disparities.</p><p>The implementation is expected to begin in the coming quarter with a phased rollout across different regions. Initial focus will be on infrastructure development and training of healthcare workers in underserved areas.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Healthcare+Policy',
                'views' => 1250,
                'status' => 'approved',
            ],
            [
                'title' => 'Tech Giants Announce Joint AI Initiative',
                'content' => '<p>Leading technology companies have joined forces to announce a groundbreaking collaborative AI initiative aimed at advancing artificial intelligence research and development.</p><p>The partnership will focus on: responsible AI development, ethical guidelines, and workforce training programs. Industry experts believe this collaboration will accelerate innovation while ensuring ethical standards in AI development.</p><p>This move comes as global interest in AI capabilities continues to surge, with significant implications for various sectors including healthcare, finance, and manufacturing.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=AI+Initiative',
                'views' => 2100,
                'status' => 'approved',
            ],
            [
                'title' => 'National Sports Champion Crowned',
                'content' => '<p>In an exciting conclusion to the national championship series, the crowning of this year\'s national sports champion has brought celebrations across the nation. The winning team displayed exceptional talent, strategy, and determination throughout the tournament.</p><p>The journey to victory included: thrilling playoff matches, record-breaking performances, and memorable moments. The champion team received widespread acclaim from sports analysts and fans alike for their outstanding display of athleticism and teamwork.</p><p>Coach and team members have attributed their success to rigorous training, strategic planning, and unwavering team spirit throughout the competition.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Sports+Championship',
                'views' => 3450,
                'status' => 'approved',
            ],
            [
                'title' => 'Economic Growth Exceeds Expectations',
                'content' => '<p>Recent economic data has shown impressive growth rates that have exceeded analyst expectations. The robust performance is attributed to multiple factors including increased exports, foreign investment, and domestic consumption.</p><p>Key economic indicators show: GDP growth, employment rates improvement, and inflation control. Economists attribute this positive trend to strategic fiscal policies and market-friendly reforms implemented over the past year.</p><p>Looking ahead, experts project continued economic momentum with potential for further expansion in key sectors including manufacturing, services, and technology.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Economic+Growth',
                'views' => 1890,
                'status' => 'approved',
            ],
            [
                'title' => 'Climate Change Summit Reaches Agreement',
                'content' => '<p>Nations participating in the international climate change summit have reached a historic agreement on emission reduction targets and climate action initiatives. The accord represents a significant step forward in global climate cooperation.</p><p>The agreement includes: binding emission reduction targets, renewable energy investments, and climate adaptation programs. Environmental organizations have welcomed the accord as a positive development in addressing climate challenges.</p><p>Implementation mechanisms and funding arrangements have been established to ensure effective execution of the agreed measures across participating nations.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Climate+Summit',
                'views' => 2200,
                'status' => 'approved',
            ],
            [
                'title' => 'Education Sector Gets Major Boost',
                'content' => '<p>The government has announced a comprehensive education reform package aimed at modernizing curricula and improving educational infrastructure. The initiative will benefit millions of students across the nation.</p><p>The reform includes: updated curriculum standards, digital learning infrastructure, teacher training programs, and scholarship opportunities. Education experts have praised the reforms for their focus on holistic development and practical skill-building.</p><p>New learning centers and libraries are expected to be established across all regions, with priority given to underserved communities.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Education+Sector',
                'views' => 1560,
                'status' => 'approved',
            ],
            [
                'title' => 'Entertainment Industry Celebrates Awards Season',
                'content' => '<p>The entertainment industry gathered for a grand celebration of talent and creativity at the annual awards ceremony. Outstanding performances and creative achievements were recognized and celebrated.</p><p>Notable awards went to: acclaimed actors, innovative filmmakers, and talented musicians. The event showcased the best of entertainment across multiple genres and categories.</p><p>Industry insiders noted the diversity of award winners and the recognition of emerging talents, signaling a vibrant and evolving entertainment landscape.</p>',
                'image' => 'https://via.placeholder.com/400x250?text=Entertainment+Awards',
                'views' => 1750,
                'status' => 'approved',
            ],
        ];

        $categories = Category::all();

        foreach ($articles as $articleData) {
            $article = Article::create($articleData);
            $article->categories()->attach(
                $categories->random(rand(2, 3))->pluck('id')->toArray()
            );
        }
    }
}
