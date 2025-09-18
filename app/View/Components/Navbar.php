<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
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
        return view('components.organisms.navbar', [
            'menus' => [
                ['title' => 'Home', 'url' => '/', 'active' => request()->is('/')],
                ['title' => 'Blog', 'url' => '/blog', 'active' => request()->is('blog')],
                ['title' => 'About', 'url' => '/about', 'active' => request()->is('about')],
                ['title' => 'Contact', 'url' => '/contact', 'active' => request()->is('contact')],
            ]
        ]);
    }
}
