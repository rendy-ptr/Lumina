<?php

namespace App\View\Components\BlogDetail\Container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    public $post;
    public $relatedPosts;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $relatedPosts)
    {
        $this->post = $post;
        $this->relatedPosts = $relatedPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-detail.container.blog-detail-main');
    }
}
