<?php

namespace App\View\Components\BlogDetail\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedPosts extends Component
{
    public $relatedPosts;
    /**
     * Create a new component instance.
     */
    public function __construct($relatedPosts)
    {
        $this->relatedPosts = $relatedPosts;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-detail.organisms.blog-detail-related-posts');
    }
}
