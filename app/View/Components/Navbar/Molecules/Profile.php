<?php

namespace App\View\Components\Navbar\Molecules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{

    public function __construct()
    {
       //
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar.molecules.navbar-profile');
    }
}
