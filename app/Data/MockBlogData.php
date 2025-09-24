<?php

namespace App\Data;

use Carbon\Carbon;

class MockBlogData
{
    public static function getPosts()
    {
        return collect([
            (object) [
                'id' => 1,
                'slug' => 'work-life-balance-strategies',
                'title' => 'Work-Life Balance: Strategies for Modern Professionals',
                'excerpt' => 'Discover practical strategies to maintain a healthy work-life balance in the digital age.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&q=80',
                'author' => (object) [
                    'name' => 'Lisa Park',
                    'avatar_url' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=40&h=40&fit=crop&crop=face',
                ],
                'category' => (object) ['name' => 'Lifestyle'],
                'created_at' => Carbon::parse('2024-12-03'),
                'likes_count' => 192,
                'views_count' => 4,
                'comments_count' => 8,
            ],
            (object) [
                'id' => 2,
                'slug' => 'future-ai-business',
                'title' => 'The Future of Artificial Intelligence in Business',
                'excerpt' => 'How AI is transforming decision making, customer experience, and automation.',
                'slug' => 'future-ai-business',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80',
                'author' => (object) [
                    'name' => 'Michael Chen',
                    'avatar_url' => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?w=40&h=40&fit=crop&crop=face',
                ],
                'category' => (object) ['name' => 'Technology'],
                'created_at' => Carbon::parse('2024-11-25'),
                'likes_count' => 305,
                'views_count' => 6,
                'comments_count' => 5,
            ],
            (object) [
                'id' => 3,
                'slug' => 'startup-survival-guide',
                'title' => 'Startup Survival Guide: Scaling Your Business',
                'excerpt' => 'Essential tips for scaling your startup sustainably and avoiding common pitfalls.',
                'slug' => 'startup-survival-guide',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&q=80',
                'author' => (object) [
                    'name' => 'Sarah Johnson',
                    'avatar_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=40&h=40&fit=crop&crop=face',
                ],
                'category' => (object) ['name' => 'Business'],
                'created_at' => Carbon::parse('2024-11-15'),
                'likes_count' => 128,
                'views_count' => 5,
                'comments_count' => 3,
            ],
        ]);
    }

    // Mock data untuk komentar
    public static function getComments()
    {
        return collect([
            (object) [
                'id' => 1,
                'content' => 'This article really opened my eyes to new possibilities. The insights about work-life balance are incredibly valuable!',
                'created_at' => Carbon::parse('2024-12-01'),
                'likes_count' => 24,
                'author' => (object) [
                    'name' => 'Alex Rivera',
                    'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face'
                ]
            ],
            (object) [
                'id' => 2,
                'content' => 'I\'ve been struggling with productivity for months. These strategies are exactly what I needed. Thank you for sharing!',
                'created_at' => Carbon::parse('2024-11-30'),
                'likes_count' => 18,
                'author' => (object) [
                    'name' => 'Maya Chen',
                    'avatar_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=40&h=40&fit=crop&crop=face'
                ]
            ],
            (object) [
                'id' => 3,
                'content' => 'The section about maintaining focus was particularly helpful. I\'m going to implement these tips right away.',
                'created_at' => Carbon::parse('2024-11-29'),
                'likes_count' => 12,
                'author' => (object) [
                    'name' => 'Jordan Smith',
                    'avatar_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=40&h=40&fit=crop&crop=face'
                ]
            ],
            (object) [
                'id' => 4,
                'content' => 'Great read! I especially liked the part about setting boundaries. It\'s so important in today\'s always-connected world.',
                'created_at' => Carbon::parse('2024-11-28'),
                'likes_count' => 8,
                'author' => (object) [
                    'name' => 'Emma Wilson',
                    'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=40&h=40&fit=crop&crop=face'
                ]
            ]
        ]);
    }

    // Mock data untuk popular posts
    public static function getPopularPosts()
    {
        return self::getPosts()->sortByDesc('likes_count')->take(3);
    }
}
