@props(['article'])

@php
$slug = $article->slug ?? 'slug-default';
$category = $article->category->name ?? 'Destaque';
$title = $article->title ?? 'Título Destaque';
$excerpt = $article->subtitle ?? '';
$image = $article->image_path ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200';
$author = $article->author->name ?? 'Redator Principal';
$authorAvatar = $article->author->avatar_path ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=100';
$date = $article->published_at ? $article->published_at->format('d M Y') : ($article->created_at ? $article->created_at->format('d M Y') : 'Junho 4, 2026');
$readingTime = $article->reading_time ?? '6 min';
@endphp

<article {{ $attributes->merge(['class' => 'group overflow-hidden rounded-none border border-slate-200/80 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-none transition-all duration-300']) }}>
    <div class="grid grid-cols-1 lg:grid-cols-12">
        <!-- Image block -->
        <a href="/article/{{ $slug }}" class="lg:col-span-7 relative block overflow-hidden min-h-[300px] lg:min-h-[420px] bg-slate-905">
            <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-700 ease-out" />
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/20 to-transparent"></div>
        </a>

        <!-- Content block -->
        <div class="lg:col-span-5 flex flex-col justify-center p-6 sm:p-8 lg:p-10">
            <div>
                <!-- Category Tag and Reading time -->
                <div class="flex items-center gap-3 mb-4">
                    <x-category-badge :category="$category" />
                    <span class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">{{ $readingTime }} leitura</span>
                </div>

                <!-- Big Title -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors duration-200 mb-4">
                    <a href="/article/{{ $slug }}">
                        {{ $title }}
                    </a>
                </h2>

                <!-- Excerpt -->
                @if($excerpt)
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        {{ $excerpt }}
                    </p>
                @endif
            </div>

            <!-- Author metadata block -->
            <div class="flex items-center gap-3.5 mt-auto pt-6 border-t border-slate-100 dark:border-slate-800">
                <a href="/author/{{ Str::slug($author) }}" class="relative shrink-0 w-10 h-10 rounded-none overflow-hidden border border-slate-200 dark:border-slate-700">
                    <img src="{{ $authorAvatar }}" alt="{{ $author }}" class="w-full h-full object-cover" />
                </a>
                <div>
                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">
                        <a href="/author/{{ Str::slug($author) }}" class="hover:text-primary transition-colors">
                            {{ $author }}
                        </a>
                    </h4>
                    <div class="flex items-center gap-1.5 text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-semibold">
                        <time datetime="{{ $date }}">{{ $date }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
