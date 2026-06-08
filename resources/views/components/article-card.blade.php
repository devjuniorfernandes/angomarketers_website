@props(['article'])

@php
$slug = $article->slug ?? 'slug-default';
$category = $article->category->name ?? 'Geral';
$title = $article->title ?? 'Título do Artigo';
$excerpt = $article->subtitle ?? '';
$image = $article->image_path ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800';
$author = $article->author->name ?? 'Redação';
$date = $article->published_at ? $article->published_at->format('d M Y') : ($article->created_at ? $article->created_at->format('d M Y') : 'Jan 1, 2026');
$readingTime = $article->reading_time ?? '4 min';
@endphp

<article {{ $attributes->merge(['class' => 'group flex flex-col h-full bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-none overflow-hidden shadow-none hover:-translate-y-1 transition-all duration-300']) }}>
    <!-- Image Header -->
    <a href="/article/{{ $slug }}" class="relative block overflow-hidden aspect-video bg-slate-905">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy" />
        
        <!-- Hover overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </a>

    <!-- Card Body -->
    <div class="flex flex-col flex-grow p-5 md:p-6">
        <!-- Category & Time -->
        <div class="flex items-center justify-between mb-3.5">
            <x-category-badge :category="$category" />
            <span class="text-xs text-slate-400 dark:text-slate-500 font-medium">{{ $readingTime }} de leitura</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white leading-snug group-hover:text-primary transition-colors line-clamp-2 mb-2.5">
            <a href="/article/{{ $slug }}">
                {{ $title }}
            </a>
        </h3>

        <!-- Excerpt -->
        @if($excerpt)
            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed line-clamp-3 mb-5">
                {{ $excerpt }}
            </p>
        @endif

        <!-- Footer / Meta -->
        <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-100 dark:border-slate-800/60">
            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Por {{ $author }}</span>
            <time class="text-xs text-slate-400 dark:text-slate-500" datetime="{{ $date }}">{{ $date }}</time>
        </div>
    </div>
</article>
