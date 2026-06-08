@extends('layouts.app')

@section('title', ($authorName ?? 'Autor') . ' | AngoMarketers')

@section('content')

@php
$paths = [
    ['name' => 'Autores', 'url' => '#'],
    ['name' => $author->name, 'url' => '#']
];
@endphp

<!-- Author Header Section -->
<div class="bg-light-gray dark:bg-slate-900/10 border-b border-slate-100 dark:border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-16">
        <x-breadcrumb :paths="$paths" />
        
        <div class="mt-8 flex flex-col md:flex-row items-center md:items-start gap-8">
            <!-- Author Profile Avatar -->
            <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-none overflow-hidden border-4 border-white dark:border-slate-800 shrink-0">
                @if($author->avatar_path)
                    <img src="{{ $author->avatar_path }}" alt="{{ $author->name }}" class="w-full h-full object-cover" />
                @else
                    <div class="w-full h-full bg-slate-200 text-slate-700 font-bold flex items-center justify-center uppercase text-4xl">{{ substr($author->name, 0, 1) }}</div>
                @endif
            </div>

            <!-- Profile Meta details -->
            <div class="flex-grow text-center md:text-left">
                <span class="text-xs font-extrabold uppercase tracking-widest text-primary">{{ $author->role }}</span>
                <h1 class="font-heading font-black text-3xl sm:text-4xl text-slate-900 dark:text-white mt-2 leading-none">
                    {{ $author->name }}
                </h1>
                
                @if($author->bio)
                    <p class="mt-4 text-slate-650 dark:text-slate-400 text-sm sm:text-base leading-relaxed max-w-3xl">
                        {{ $author->bio }}
                    </p>
                @endif

                <!-- Stats & Tags -->
                <div class="mt-6 flex flex-wrap items-center justify-center md:justify-start gap-5 text-xs text-slate-450 dark:text-slate-500 font-semibold">
                    <span class="flex items-center gap-1.5">
                        <!-- Location Icon -->
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Luanda, Angola
                    </span>
                    <span class="flex items-center gap-1.5">
                        <!-- Article Icon -->
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        {{ $articles->total() }} Artigos Publicados
                    </span>

                    <!-- Author Social profiles -->
                    <div class="flex items-center gap-3 md:ml-4">
                        @if($author->linkedin_url)
                            <a href="{{ $author->linkedin_url }}" class="text-slate-400 hover:text-primary transition-colors">LinkedIn</a>
                        @endif
                        @if($author->twitter_url)
                            <span class="text-slate-300">|</span>
                            <a href="{{ $author->twitter_url }}" class="text-slate-400 hover:text-primary transition-colors">Twitter</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Split Container -->
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        
        <!-- Published articles list (70% - 8 Cols) -->
        <div class="lg:col-span-8 space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6 select-none">Artigos Escritos por {{ $author->name }}</h3>
            
            @if(count($articles) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 mb-8">
                    @foreach($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>

                <!-- Pagination links -->
                @if($articles->hasPages())
                    <div class="border-t border-slate-200 dark:border-slate-800 pt-8">
                        {{ $articles->links() }}
                    </div>
                @endif
            @else
                <p class="text-slate-400 text-sm">Este autor ainda não publicou artigos.</p>
            @endif
        </div>

        <!-- Sidebar Column (30% - 4 Cols) -->
        <div class="lg:col-span-4">
            <x-sidebar :trendingArticles="$trendingArticles" />
        </div>

    </div>
</div>

<x-newsletter />

@endsection
