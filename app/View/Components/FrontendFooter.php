<?php

namespace App\View\Components;

use App\Models\Company;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontendFooter extends Component
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
        $categories = Category::all();
        return view('components.frontend-footer', ['company' => $company, 'categories' => $categories]);
    }
}
