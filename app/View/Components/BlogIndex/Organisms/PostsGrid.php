<?php

namespace App\View\Components\BlogIndex\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsGrid extends Component
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
        return view('components.blog-index.organisms.blog-index-posts-grid');
    }
}
