<?php

namespace App\View\Components\BlogDetail\Container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    public $blog;
    public $relatedBlogs;
    /**
     * Create a new component instance.
     */
    public function __construct($blog, $relatedBlogs)
    {
        $this->blog = $blog;
        $this->relatedBlogs = $relatedBlogs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-detail.container.blog-detail-main');
    }
}
