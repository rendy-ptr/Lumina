<x-layouts.app-layout title="Lumina — Detail Blog Post">
    <x-blog-detail.container.blog-detail-main :blog="$blog" :relatedBlogs="$relatedBlogs" :is-following-author="$isFollowingAuthor" :is-liked="$isLiked" />
</x-layouts.app-layout>
