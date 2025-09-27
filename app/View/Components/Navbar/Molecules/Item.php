<?php

namespace App\View\Components\Navbar\Molecules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $href;
    public $active;
    /**
     * Create a new component instance.
     */
    public function __construct($href, $active = false)
    {
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.molecules.navbar-item');
    }
}
