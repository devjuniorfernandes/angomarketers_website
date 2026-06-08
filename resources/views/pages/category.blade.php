@extends('layouts.app')

@section('title', 'AngoMarketers | ' . ($categoryName ?? 'Editorial'))

@section('content')

@php
$paths = [
    ['name' => $categoryName, 'url' => '/category/' . $category->slug]
];

// Extract featured and list articles from paginated list
$featuredArticle = $articles->first();
$categoryArticles = $articles->slice(1);
@endphp

<!-- Section 1: Breadcrumb & Category Hero -->
<div class="bg-light-gray dark:bg-slate-900/10 border-b border-slate-100 dark:border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8 md:py-12">
        <x-breadcrumb :paths="$paths" />
        
        <div class="mt-4 max-w-3xl">
            <h1 class="font-heading font-black text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-white leading-tight">
                {{ $categoryName }}
            </h1>
            @if($category->description)
                <p class="mt-3 text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
                    {{ $category->description }}
                </p>
            @endif
        </div>
    </div>
</div>

<!-- Section 2: Main Layout Grid with Sidebar -->
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        
        <!-- Category Articles Column (70% - 8 Cols) -->
        <div class="lg:col-span-8 space-y-10">
            @if($featuredArticle)
                <!-- Premium Wide Featured Story -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-4 select-none">História de Destaque</h3>
                    <x-featured-card :article="$featuredArticle" />
                </div>
            @endif

            @if(count($categoryArticles) > 0)
                <!-- Articles Grid listing -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6 select-none">Todos os Artigos</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                        @foreach($categoryArticles as $article)
                            <x-article-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            @else
                @if(!$featuredArticle)
                    <div class="py-12 text-center text-slate-400">
                        Nenhum artigo publicado nesta categoria atualmente.
                    </div>
                @endif
            @endif

            <!-- Pagination section -->
            @if($articles->hasPages())
                <div class="border-t border-slate-200 dark:border-slate-800 pt-8">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>

        <!-- Sidebar Column (30% - 4 Cols) -->
        <div class="lg:col-span-4">
            <x-sidebar :trendingArticles="$trendingArticles" />
        </div>

    </div>
</div>

<!-- Extra newsletter bottom block -->
<x-newsletter />

@endsection
