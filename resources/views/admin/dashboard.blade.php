@extends('layouts.admin')

@section('title', 'Painel Geral | AngoMarketers CMS')
@section('page_title', 'Painel Geral')

@section('content')
<div class="space-y-8">
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card: Articles -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Artigos</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['articles_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 00-2-2v3m2-3V9m0 0a2 2 0 012 2v7a2 2 0 01-2 2h-2a2 2 0 01-2-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
            </div>
        </div>

        <!-- Stat Card: Categories -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Categorias</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['categories_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card: Events -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Eventos</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['events_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card: Trainings -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Formações</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['trainings_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card: Pending Comments -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Moderação</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1 {{ $stats['pending_comments_count'] > 0 ? 'text-primary animate-pulse' : '' }}">{{ $stats['pending_comments_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card: Subscribers -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Subscritores WhatsApp</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['subscribers_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-emerald-500 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.012 2c-5.506 0-9.988 4.476-9.988 9.976 0 1.764.462 3.42 1.267 4.872L2 22l5.364-1.398c1.4.764 2.99 1.198 4.648 1.198 5.506 0 9.988-4.476 9.988-9.976S17.518 2 12.012 2zm6.262 14.22c-.258.72-1.506 1.404-2.07 1.458-.564.054-1.128.252-3.648-.756-3.216-1.29-5.274-4.506-5.436-4.722-.162-.216-1.302-1.704-1.302-3.246 0-1.542.81-2.298 1.1-2.604.288-.306.636-.384.846-.384.21 0 .42.006.606.012.192.006.45-.072.702.528.258.618.882 2.112.96 2.268.078.156.132.336.024.546-.108.21-.162.342-.324.528-.162.186-.336.414-.48.558-.162.162-.33.336-.144.654.186.318.828 1.344 1.776 2.172.93 1.092 2.148 1.434 2.454 1.578.306.144.486.126.666-.078.18-.21.78-.906.99-1.218.21-.312.42-.258.702-.156.282.102 1.788.84 2.094.996.306.156.51.234.582.36.072.126.072.72-.186 1.44z"/>
                </svg>
            </div>
        </div>

        <!-- Stat Card: Page Visits -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 rounded-none flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-450 dark:text-slate-500">Visitas Totais</p>
                <h3 class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1">{{ $stats['visits_count'] }}</h3>
            </div>
            <div class="p-2.5 bg-slate-100 dark:bg-slate-800 text-slate-500 border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Content Split: Recent Articles & Comments -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Articles -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-none flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-4">
                <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white">Artigos Recentes</h3>
                <a href="{{ route('admin.articles.index') }}" class="text-xs font-bold text-primary hover:underline uppercase tracking-wider">Ver Todos</a>
            </div>
            <div class="flex-grow overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 dark:border-slate-800">
                            <th class="py-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Título</th>
                            <th class="py-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Categoria</th>
                            <th class="py-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Autor</th>
                            <th class="py-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                        @forelse($recentArticles as $article)
                            <tr>
                                <td class="py-3 pr-4 font-semibold text-slate-900 dark:text-white truncate max-w-[200px]" title="{{ $article->title }}">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="hover:text-primary transition-colors">
                                        {{ $article->title }}
                                    </a>
                                </td>
                                <td class="py-3 text-slate-500 dark:text-slate-400">
                                    {{ $article->category->name ?? 'N/A' }}
                                </td>
                                <td class="py-3 text-slate-500 dark:text-slate-400">
                                    {{ $article->author->name ?? 'N/A' }}
                                </td>
                                <td class="py-3">
                                    @if($article->status === 'published')
                                        <span class="inline-flex px-2 py-0.5 text-[10px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Publicado</span>
                                    @else
                                        <span class="inline-flex px-2 py-0.5 text-[10px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Rascunho</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-450 dark:text-slate-500 text-sm">
                                    Nenhum artigo registado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Moderation Panel: Pending Comments -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-none flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-4">
                <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white">Moderação Rápida de Comentários</h3>
                <a href="{{ route('admin.comments.index') }}" class="text-xs font-bold text-primary hover:underline uppercase tracking-wider">Ver Todos</a>
            </div>
            <div class="flex-grow space-y-4 overflow-y-auto max-h-[300px]">
                @forelse($pendingComments as $comment)
                    <div class="border border-slate-100 dark:border-slate-800 p-4 bg-slate-50 dark:bg-slate-850 flex flex-col justify-between gap-3">
                        <div>
                            <div class="flex items-center justify-between">
                                <h5 class="text-xs font-bold text-slate-900 dark:text-white">{{ $comment->author_name }}</h5>
                                <span class="text-[10px] text-slate-400 dark:text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-450 mt-1 italic">
                                "{{ Str::limit($comment->content, 120) }}"
                            </p>
                            <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-2">
                                Artigo: <span class="font-bold text-slate-500 dark:text-slate-400">{{ $comment->article->title ?? 'Sem Artigo' }}</span>
                            </p>
                        </div>
                        <div class="flex items-center gap-2 mt-1">
                            <!-- Approve Action -->
                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 bg-emerald-500 hover:bg-emerald-600 text-white text-[10px] font-extrabold uppercase tracking-wider hover:cursor-pointer transition-colors">
                                    Aprovar
                                </button>
                            </form>
                            <!-- Delete Action -->
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este comentário?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1 bg-primary hover:bg-primary/90 text-white text-[10px] font-extrabold uppercase tracking-wider hover:cursor-pointer transition-colors">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-slate-450 dark:text-slate-500 text-sm">
                        Não existem comentários pendentes de aprovação.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Top View Contents Grid -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-none">
        <div class="pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
            <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white">Conteúdos Mais Visualizados (Top Views)</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            
            <!-- Top Articles -->
            <div class="bg-slate-50 dark:bg-slate-850 p-5 border border-slate-100 dark:border-slate-800/80 rounded-2xl space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 flex items-center gap-1.5 border-b border-slate-200/50 dark:border-slate-800 pb-2">
                    <span class="w-1.5 h-1.5 bg-primary"></span> Artigos Populares
                </h4>
                <div class="divide-y divide-slate-200/60 dark:divide-slate-800 text-xs">
                    @forelse($topArticles as $art)
                        <div class="py-2.5 flex items-center justify-between gap-4">
                            <span class="font-medium text-slate-850 dark:text-slate-200 truncate" title="{{ $art->title }}">{{ $art->title }}</span>
                            <span class="font-bold text-slate-500 shrink-0">{{ $art->views_count }} views</span>
                        </div>
                    @empty
                        <span class="text-slate-400 block pt-2">Sem registo</span>
                    @endforelse
                </div>
            </div>

            <!-- Top Events -->
            <div class="bg-slate-50 dark:bg-slate-850 p-5 border border-slate-100 dark:border-slate-800/80 rounded-2xl space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 flex items-center gap-1.5 border-b border-slate-200/50 dark:border-slate-800 pb-2">
                    <span class="w-1.5 h-1.5 bg-primary"></span> Eventos Populares
                </h4>
                <div class="divide-y divide-slate-200/60 dark:divide-slate-800 text-xs">
                    @forelse($topEvents as $evt)
                        <div class="py-2.5 flex items-center justify-between gap-4">
                            <span class="font-medium text-slate-850 dark:text-slate-200 truncate" title="{{ $evt->title }}">{{ $evt->title }}</span>
                            <span class="font-bold text-slate-500 shrink-0">{{ $evt->views_count }} views</span>
                        </div>
                    @empty
                        <span class="text-slate-400 block pt-2">Sem registo</span>
                    @endforelse
                </div>
            </div>

            <!-- Top Trainings -->
            <div class="bg-slate-50 dark:bg-slate-850 p-5 border border-slate-100 dark:border-slate-800/80 rounded-2xl space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 flex items-center gap-1.5 border-b border-slate-200/50 dark:border-slate-800 pb-2">
                    <span class="w-1.5 h-1.5 bg-primary"></span> Formações Populares
                </h4>
                <div class="divide-y divide-slate-200/60 dark:divide-slate-800 text-xs">
                    @forelse($topTrainings as $tr)
                        <div class="py-2.5 flex items-center justify-between gap-4">
                            <span class="font-medium text-slate-850 dark:text-slate-200 truncate" title="{{ $tr->title }}">{{ $tr->title }}</span>
                            <span class="font-bold text-slate-500 shrink-0">{{ $tr->views_count }} views</span>
                        </div>
                    @empty
                        <span class="text-slate-400 block pt-2">Sem registo</span>
                    @endforelse
                </div>
            </div>

            <!-- Popular Searches -->
            <div class="bg-slate-50 dark:bg-slate-850 p-5 border border-slate-100 dark:border-slate-800/80 rounded-2xl space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 flex items-center gap-1.5 border-b border-slate-200/50 dark:border-slate-800 pb-2">
                    <span class="w-1.5 h-1.5 bg-emerald-500"></span> Pesquisas Frequentes
                </h4>
                <div class="divide-y divide-slate-200/60 dark:divide-slate-800 text-xs">
                    @forelse($popularSearches as $search)
                        <div class="py-2.5 flex items-center justify-between gap-4">
                            <span class="font-medium text-slate-850 dark:text-slate-200 truncate" title="{{ $search->query }}">"{{ $search->query }}"</span>
                            <span class="font-bold text-slate-500 shrink-0">{{ $search->hits }} buscas</span>
                        </div>
                    @empty
                        <span class="text-slate-400 block pt-2">Sem pesquisas registadas</span>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
