<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $company = Company::first();

        $categories = Category::where('status', true)->get();
        $latest_news = \App\Models\Article::where('status', 'approved')->latest()->take(10)->get();
        $trending_news = \App\Models\Article::where('status', 'approved')->orderBy('views', 'desc')->take(10)->get();

        View::share([
            'company' => $company,
            'categories' => $categories,
            'latest_news' => $latest_news,
            'trending_news' => $trending_news
        ]);
    }
}
