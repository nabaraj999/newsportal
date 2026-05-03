<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Frontend\BaseController;

class PageController extends BaseController
{
    public function home()
    {
        $company = Company::first();
        $latest_articles = Article::orderBy('id', 'desc')->where('status', 'approved')->limit(5)->get();
        $trending_articles = Article::orderBy('views', 'desc')->where('status', 'approved')->limit(8)->get();

        $siteName = $company?->name ?? config('app.name', 'Global News');
        $topHeadline = optional($latest_articles->first())->title;

        $metaTitle = $topHeadline
            ? "{$siteName} | {$topHeadline}"
            : "{$siteName} | Latest Breaking News and Updates";

        $metaDescription = $topHeadline
            ? "{$siteName}: {$topHeadline}. Read trusted breaking news, trends, and in-depth stories."
            : "{$siteName} brings you trusted breaking news, trending stories, and in-depth coverage from around the world.";

        $metaKeywords = Category::where('status', true)
            ->take(6)
            ->pluck('title')
            ->push('breaking news')
            ->push('latest news')
            ->push($siteName)
            ->implode(', ');

        return view('Frontend.home', compact(
            'latest_articles',
            'trending_articles',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->where('status', 'approved')->latest()->paginate(12);
        return view('Frontend.category', compact('articles', 'category'));
    }

    public function article($id)
    {
        $article = Article::find($id);
        $data = Cookie::get("article$id");
        if (!$data) {
            $article->increment('views');
            Cookie::queue("article$id", $id);
        }
        return view('Frontend.article', compact('article'));
    }
}
