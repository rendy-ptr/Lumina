<?php

namespace App\View\Components\Navbar\Shared;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    public $menus;
    public $user;
    public $avatar;
    public $displayName;
    public $email;

    public function __construct()
    {
        $this->menus = [
            ['name' => 'Home', 'url' => '/', 'active' => request()->is('/')],
            ['name' => 'Blog', 'url' => '/blog', 'active' => request()->is('blog')],
            ['name' => 'About', 'url' => '/about', 'active' => request()->is('about')],
            ['name' => 'Contact', 'url' => '/contact', 'active' => request()->is('contact')],
        ];

        $this->user = Auth::user();

        $this->displayName = $this->user?->name ?? 'Guest';
        $this->email = $this->user?->email ?? 'guest@example.com';

        $this->avatar =
            $this->user?->profile_photo_url
            ?? ($this->user?->visitorProfile?->avatar_url
                ?? ($this->user?->authorProfile?->avatar_url
                    ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->displayName)));

        view()->share([
            'menus' => $this->menus,
            'user' => $this->user,
            'avatar' => $this->avatar,
            'displayName' => $this->displayName,
            'email' => $this->email,
        ]);
    }

    public function render(): View|Closure|string
    {
        return view('components.shared.navbar');
    }
}
