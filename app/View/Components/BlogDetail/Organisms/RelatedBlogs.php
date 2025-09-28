<?php

namespace App\View\Components\BlogDetail\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedBlogs extends Component
{
    public $relatedBlogs;
    /**
     * Create a new component instance.
     */
    public function __construct($relatedBlogs)
    {
        $this->relatedBlogs = $relatedBlogs;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-detail.organisms.blog-detail-related-posts');
    }
}
