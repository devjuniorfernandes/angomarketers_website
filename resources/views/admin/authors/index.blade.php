@extends('layouts.admin')

@section('title', 'Autores | AngoMarketers CMS')
@section('page_title', 'Gestão de Autores')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Autores</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir os autores de artigos e colunistas do portal</p>
        </div>
        <div>
            <a href="{{ route('admin.authors.create') }}" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Autor
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4">
        <form action="{{ route('admin.authors.index') }}" method="GET" class="flex items-center gap-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Pesquisar por nome ou cargo..."
                   class="w-full sm:w-80 px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm focus:outline-none focus:border-primary">
            <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-wider transition-colors hover:cursor-pointer">Filtrar</button>
            @if($search)
                <a href="{{ route('admin.authors.index') }}" class="text-xs text-slate-400 hover:text-slate-200 underline">Limpar</a>
            @endif
        </form>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Foto</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Nome</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Cargo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Bio</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($authors as $author)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Avatar -->
                            <td class="p-4">
                                <img src="{{ $author->avatar_path ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=150' }}" 
                                     alt="{{ $author->name }}" class="w-10 h-10 object-cover border border-slate-200 dark:border-slate-700">
                            </td>
                            <!-- Name -->
                            <td class="p-4 font-bold text-slate-900 dark:text-white">
                                {{ $author->name }}
                            </td>
                            <!-- Role -->
                            <td class="p-4 text-slate-655 dark:text-slate-400 font-semibold text-xs">
                                {{ $author->role }}
                            </td>
                            <!-- Bio -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 text-xs leading-relaxed max-w-[200px] truncate" title="{{ $author->bio }}">
                                {{ $author->bio ?? 'Nenhuma biografia.' }}
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.authors.edit', $author) }}" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este autor?')">
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
                            <td colspan="5" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum autor registado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($authors->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                {{ $authors->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
