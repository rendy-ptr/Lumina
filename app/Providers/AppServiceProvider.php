<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Home
        Blade::component('components.home.molecules.category-lists', 'home-category-lists');
        Blade::component('components.home.molecules.category-title', 'home-category-title');
        Blade::component('components.home.molecules.featured-post-main', 'home-featured-post-main');
        Blade::component('components.home.molecules.featured-post-secondary', 'home-featured-post-secondary');
        Blade::component('components.home.molecules.featured-post-title', 'home-featured-post-title');
        Blade::component('components.home.molecules.hero-badge', 'home-hero-badge');
        Blade::component('components.home.molecules.hero-button', 'home-hero-button');
        Blade::component('components.home.molecules.hero-paragraph', 'home-hero-paragraph');
        Blade::component('components.home.molecules.hero-title', 'home-hero-title');
        Blade::component('components.home.organisms.category', 'home-category');
        Blade::component('components.home.organisms.featured-post', 'home-featured-post');
        Blade::component('components.home.organisms.hero', 'home-hero');
        Blade::component('components.home.organisms.home-main', 'home-main');

        // Blog
        Blade::component('components.blog.molecules.blog-filter', 'blog-filter');
        Blade::component('components.blog.molecules.blog-search', 'blog-search');
        Blade::component('components.blog.molecules.blog-title', 'blog-title');
        Blade::component('components.blog.molecules.blog-post-card', 'blog-post-card');
        Blade::component('components.blog.organisms.blog-posts-grid', 'blog-posts-grid');
        Blade::component('components.blog.organisms.blog-hero', 'blog-hero');
        Blade::component('components.blog.organisms.main', 'blog-main');

        // Footer
        Blade::component('components.footer.footer-bar', 'footer-bar');
        Blade::component('components.footer.footer-links', 'footer-links');
        Blade::component('components.footer.footer-brand', 'footer-brand');
        Blade::component('components.footer.footer-newsletter', 'footer-newsletter');
        Blade::component('components.footer.footer-resources', 'footer-resources');

        // Navbar
        Blade::component('components.navbar.logo', 'navbar-logo');
        Blade::component('components.navbar.menu', 'navbar-menu');
        Blade::component('components.navbar.mobile-menu', 'navbar-mobile-menu');
        Blade::component('components.navbar.nav-item', 'navbar-item');
        Blade::component('components.navbar.profile', 'navbar-profile');

        // About
        Blade::component('components.about.organisms.main', 'about-main');
        Blade::component('components.about.organisms.hero', 'about-hero');
        Blade::component('components.about.organisms.author-cards-grid', 'about-author-cards-grid');
        Blade::component('components.about.molecules.author-card', 'about-author-card');
        Blade::component('components.about.molecules.author-title', 'about-author-title');
    }
}
