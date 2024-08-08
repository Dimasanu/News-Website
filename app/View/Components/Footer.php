<?php

// app/View/Components/Footer.php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Article;
use App\Models\Category;

class Footer extends Component
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
     */
    public function render(): View|Closure|string
    {
        return view('components.footer', [
            'latestArticles' => $this->latestArticles,
            'categories' => $this->categories,
        ]);
    }
}

