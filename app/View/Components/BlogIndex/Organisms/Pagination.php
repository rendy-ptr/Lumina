<?php

namespace App\View\Components\BlogIndex\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $blogs;
    /**
     * Create a new component instance.
     */
    public function __construct($blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-index.organisms.blog-index-pagination');
    }
}
