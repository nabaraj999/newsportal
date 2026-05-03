<?php

namespace App\View\Components;

use App\Models\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontendHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $company = Company::first();
        $categories = \App\Models\Category::all();
        $latest_news = \App\Models\Article::latest()->take(5)->get();
        return view('components.frontend-header', [
            'company' => $company,
            'categories' => $categories,
            'latest_news' => $latest_news,
        ]);
    }
}
