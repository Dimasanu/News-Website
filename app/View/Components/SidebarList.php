<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Article;
use App\Models\Category;

class SidebarList extends Component
{
    public $latestArticles;
    public $categories;

    public function __construct()
    {
        $this->latestArticles = Article::orderBy('created_at', 'desc')->take(5)->get();
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-list');
    }
}
