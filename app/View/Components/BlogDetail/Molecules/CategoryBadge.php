<?php

namespace App\View\Components\BlogDetail\Molecules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryBadge extends Component
{
    public $post;
    /**
     * Create a new component instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-detail.molecules.blog-detail-category-badge');
    }
}
