<?php

namespace App\View\Components\Navbar\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    public $menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = [
            ['name' => 'Home', 'url' => '/', 'active' => request()->is('/')],
            ['name' => 'Blog', 'url' => '/blog', 'active' => request()->is('blog')],
            ['name' => 'About', 'url' => '/about', 'active' => request()->is('about')],
            ['name' => 'Contact', 'url' => '/contact', 'active' => request()->is('contact')],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.navbar');
    }
}
