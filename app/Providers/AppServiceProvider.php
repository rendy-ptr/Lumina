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
        // Blog Detail
        Blade::component('components.blog-detail.main', 'blog-detail-main');
        Blade::component('components.blog-detail.molecules.back-button', 'blog-back-button');
        Blade::component('components.blog-detail.molecules.category-badge', 'blog-category-badge');
        Blade::component('components.blog-detail.molecules.content', 'blog-content');
        Blade::component('components.blog-detail.molecules.author-profile', 'blog-author-profile');
        Blade::component('components.blog-detail.molecules.comments-list', 'blog-comments-list');
        Blade::component('components.blog-detail.molecules.comment-form', 'blog-comment-form');
        Blade::component('components.blog-detail.organisms.article', 'blog-article');
        Blade::component('components.blog-detail.organisms.sidebar', 'blog-sidebar');

        // Contact
        Blade::component('components.contact.organisms.contact-main', 'contact-main');
        Blade::component('components.contact.organisms.hero', 'contact-hero');
        Blade::component('components.contact.organisms.author-cards-grid', 'contact-author-cards-grid');
        Blade::component('components.contact.molecules.author-card', 'contact-author-card');

        // Blog - Index
        Blade::component('components.blog-index.molecules.blog-filter', 'blog-filter');
        Blade::component('components.blog-index.molecules.blog-search', 'blog-search');
        Blade::component('components.blog-index.molecules.blog-title', 'blog-title');
        Blade::component('components.blog-index.molecules.blog-post-card', 'blog-post-card');
        Blade::component('components.blog-index.organisms.blog-posts-grid', 'blog-posts-grid');
        Blade::component('components.blog-index.organisms.blog-hero', 'blog-hero');
        Blade::component('components.blog-index.main', 'blog-index-main');

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
    }
}
