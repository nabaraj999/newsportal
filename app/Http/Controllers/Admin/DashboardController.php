<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $articleCount = Article::count();
        $approvedCount = Article::where('status', 'approved')->count();
        $pendingCount = Article::where('status', 'pending')->count();
        $rejectedCount = Article::where('status', 'rejected')->count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $company = Company::first();

        $statsCards = [
            [
                'label' => 'Total Articles',
                'value' => $articleCount,
                'meta' => 'All stories in your system',
                'class' => 'stat-card-blue',
            ],
            [
                'label' => 'Approved',
                'value' => $approvedCount,
                'meta' => $articleCount > 0
                    ? round(($approvedCount / $articleCount) * 100) . '% approval rate'
                    : 'No articles yet',
                'class' => 'stat-card-green',
            ],
            [
                'label' => 'Pending Review',
                'value' => $pendingCount,
                'meta' => $pendingCount > 0 ? 'Needs editorial action' : 'All caught up',
                'class' => 'stat-card-orange',
            ],
            [
                'label' => 'Rejected',
                'value' => $rejectedCount,
                'meta' => $rejectedCount > 0 ? 'Needs content rework' : 'No rejected items',
                'class' => 'stat-card-red',
            ],
        ];

        $quickActions = [
            [
                'route' => route('admin.article.index'),
                'icon' => 'fas fa-newspaper',
                'label' => 'Manage Articles',
                'count' => $articleCount,
            ],
            [
                'route' => route('admin.category.index'),
                'icon' => 'fas fa-tags',
                'label' => 'Manage Categories',
                'count' => $categoryCount,
            ],
            [
                'route' => route('admin.company.index'),
                'icon' => 'fas fa-building',
                'label' => 'Company Settings',
                'count' => $company ? 1 : 0,
            ],
            [
                'route' => route('profile.edit'),
                'icon' => 'fas fa-user-cog',
                'label' => 'Admin Profile',
                'count' => $userCount,
            ],
        ];

        $portalSummary = [
            [
                'label' => 'Total Categories',
                'value' => (string) $categoryCount,
                'class' => '',
            ],
            [
                'label' => 'Admin Users',
                'value' => (string) $userCount,
                'class' => '',
            ],
            [
                'label' => 'Company Profile',
                'value' => $company ? 'Configured' : 'Pending Setup',
                'class' => $company ? 'text-success' : 'text-warning',
            ],
        ];

        $latestArticles = Article::latest()->take(6)->get(['id', 'title', 'status', 'created_at']);
        $topCategories = Category::withCount('articles')->orderByDesc('articles_count')->take(5)->get(['id', 'title']);

        return view('dashboard', compact(
            'statsCards',
            'quickActions',
            'portalSummary',
            'latestArticles',
            'topCategories',
            'company'
        ));
    }
}
