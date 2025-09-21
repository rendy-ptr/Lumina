<main class="relative z-10 pb-16 py-20">
    @php
        if (!isset($posts)) {
            $posts = collect([
                (object) [
                    'id' => 1,
                    'title' => 'Work-Life Balance: Strategies for Modern Professionals',
                    'excerpt' =>
                        'Discover practical strategies to maintain a healthy work-life balance in the digital age.',
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&q=80',
                    'author' => (object) [
                        'name' => 'Lisa Park',
                        'avatar_url' =>
                            'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=40&h=40&fit=crop&crop=face',
                    ],
                    'category' => (object) ['name' => 'Lifestyle'],
                    'created_at' => \Carbon\Carbon::parse('2024-12-03'),
                    'likes_count' => 192,
                    'reading_time' => 4,
                ],
                (object) [
                    'id' => 2,
                    'title' => 'The Future of Artificial Intelligence in Business',
                    'excerpt' => 'How AI is transforming decision making, customer experience, and automation.',
                    'slug' => 'future-ai-business',
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80',
                    'author' => (object) [
                        'name' => 'Michael Chen',
                        'avatar_url' =>
                            'https://images.unsplash.com/photo-1527980965255-d3b416303d12?w=40&h=40&fit=crop&crop=face',
                    ],
                    'category' => (object) ['name' => 'Technology'],
                    'created_at' => \Carbon\Carbon::parse('2024-11-25'),
                    'likes_count' => 305,
                    'reading_time' => 6,
                ],
                (object) [
                    'id' => 3,
                    'title' => 'Startup Survival Guide: Scaling Your Business',
                    'excerpt' => 'Essential tips for scaling your startup sustainably and avoiding common pitfalls.',
                    'slug' => 'startup-survival-guide',
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&q=80',
                    'author' => (object) [
                        'name' => 'Sarah Johnson',
                        'avatar_url' =>
                            'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=40&h=40&fit=crop&crop=face',
                    ],
                    'category' => (object) ['name' => 'Business'],
                    'created_at' => \Carbon\Carbon::parse('2024-11-15'),
                    'likes_count' => 128,
                    'reading_time' => 5,
                ],
            ]);
        }
    @endphp

    <!-- Header Section -->
    <x-blog-hero />

    <!-- Blog Posts Grid -->
    <x-blog-posts-grid :posts="$posts" />
</main>
