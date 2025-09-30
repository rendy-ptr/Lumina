<?php

namespace App\View\Components\BlogAuthor\Container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
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

        view()->share('blogs', $this->blogs);
        return view('components.blog-by-author.container.blog-by-author-main');
    }
}
