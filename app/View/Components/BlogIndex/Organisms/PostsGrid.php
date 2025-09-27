<?php

namespace App\View\Components\BlogIndex\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsGrid extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-index.organisms.blog-index-posts-grid');
    }
}
