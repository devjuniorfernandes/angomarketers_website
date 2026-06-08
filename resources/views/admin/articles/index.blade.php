@extends('layouts.admin')

@section('title', 'Artigos | AngoMarketers CMS')
@section('page_title', 'Gestão de Artigos')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Artigos</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir todos os artigos publicados e rascunhos do portal</p>
        </div>
        <div>
            <a href="{{ route('admin.articles.create') }}" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Artigo
            </a>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-none">
        <form action="{{ route('admin.articles.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-4">
            <!-- Search field -->
            <div class="sm:col-span-6 relative">
                <input type="text" name="search" value="{{ $search }}" placeholder="Pesquisar por título ou conteúdo..."
                       class="w-full pl-4 pr-10 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                @if($search)
                    <a href="{{ route('admin.articles.index', ['category_id' => $categoryId]) }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>

            <!-- Category filter -->
            <div class="sm:col-span-4">
                <select name="category_id" 
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    <option value="">Todas as Categorias</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter actions -->
            <div class="sm:col-span-2 flex gap-2">
                <button type="submit" 
                        class="w-full bg-slate-900 dark:bg-slate-800 text-white hover:bg-slate-850 dark:hover:bg-slate-700 font-heading font-bold text-xs py-2.5 px-4 rounded-none hover:cursor-pointer transition-colors uppercase tracking-wider text-center">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Capa</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Artigo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Categoria</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Autor</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Leitura</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Image Cover -->
                            <td class="p-4">
                                <div class="w-12 h-8 bg-slate-900 border border-slate-200 dark:border-slate-700 overflow-hidden shrink-0">
                                    <img src="{{ $article->image_path }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <!-- Title & Subtitle -->
                            <td class="p-4 max-w-[300px]">
                                <div class="font-bold text-slate-900 dark:text-white truncate" title="{{ $article->title }}">
                                    {{ $article->title }}
                                </div>
                                <div class="text-xs text-slate-450 dark:text-slate-500 mt-0.5 truncate" title="{{ $article->subtitle }}">
                                    {{ $article->subtitle }}
                                </div>
                            </td>
                            <!-- Category -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-medium">
                                {{ $article->category->name ?? 'Sem categoria' }}
                            </td>
                            <!-- Author -->
                            <td class="p-4 text-slate-600 dark:text-slate-400">
                                {{ $article->author->name ?? 'Sem autor' }}
                            </td>
                            <!-- Reading Time -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 text-xs font-semibold">
                                {{ $article->reading_time }}
                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                @if($article->status === 'published')
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Publicado</span>
                                @else
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Rascunho</span>
                                @endif
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <!-- Edit Link -->
                                    <a href="{{ route('admin.articles.edit', $article) }}" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este artigo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-2 py-1 bg-slate-105 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-primary hover:cursor-pointer transition-colors">
                                            Apagar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-450 dark:text-slate-500">
                                Nenhum artigo encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
