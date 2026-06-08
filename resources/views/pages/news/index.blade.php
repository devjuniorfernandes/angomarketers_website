@extends('layouts.app')

@section('title', 'Notícias e Artigos de Marketing e Tecnologia em Angola | AngoMarketers')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Page Header -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">Atualidade & Opinião</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl text-slate-900 dark:text-white mt-4 tracking-tight leading-tight">
            Notícias de Marketing, Tecnologia e Negócios
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg">
            Fique por dentro das últimas novidades do ecossistema corporativo, inovação digital e tendências em Angola.
        </p>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Articles Grid -->
        <div class="lg:col-span-8 space-y-8">
            @if(count($articles) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="bg-slate-50 dark:bg-slate-900/40 rounded-3xl p-12 text-center border border-dashed border-slate-200 dark:border-slate-800">
                    <p class="text-slate-400 dark:text-slate-500">De momento não temos notícias registadas para esta secção.</p>
                </div>
            @endif
        </div>

        <!-- Sidebar Layout -->
        <aside class="lg:col-span-4 space-y-10">
            <!-- Newsletter Widget -->
            <x-newsletter-box />

            <!-- Trending Articles Component -->
            <x-trending :articles="$trendingArticles" />
        </aside>
    </div>
</div>
@endsection
