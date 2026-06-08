@extends('layouts.admin')

@section('title', 'Slider Principal | AngoMarketers CMS')
@section('page_title', 'Gestão de Slides da Homepage')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Slides do Carrossel</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir os banners dinâmicos em destaque na página inicial</p>
        </div>
        <div>
            <a href="{{ route('admin.slider_items.create') }}" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Slide
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4">
        <form action="{{ route('admin.slider_items.index') }}" method="GET" class="flex items-center gap-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Pesquisar por título de slide..."
                   class="w-full sm:w-80 px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm focus:outline-none focus:border-primary">
            <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-wider transition-colors hover:cursor-pointer">Filtrar</button>
            @if($search)
                <a href="{{ route('admin.slider_items.index') }}" class="text-xs text-slate-400 hover:text-slate-200 underline">Limpar</a>
            @endif
        </form>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-24">Imagem</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Título</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Subtítulo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 text-center w-24">Ordem</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($sliderItems as $item)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Image -->
                            <td class="p-4">
                                <img src="{{ $item->image_path }}" 
                                     alt="{{ $item->title }}" class="w-16 h-10 object-cover border border-slate-200 dark:border-slate-700">
                            </td>
                            <!-- Title -->
                            <td class="p-4 font-bold text-slate-900 dark:text-white">
                                <div class="flex flex-col">
                                    <span>{{ $item->title }}</span>
                                    @if($item->badge)
                                        <span class="inline-flex max-w-max mt-1 px-1.5 py-0.5 text-[9px] font-bold text-white {{ $item->badge_color ?? 'bg-primary' }}">
                                            {{ $item->badge }}
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <!-- Subtitle -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 text-xs">
                                {{ Str::limit($item->subtitle, 60) }}
                            </td>
                            <!-- Order -->
                            <td class="p-4 text-center font-bold text-slate-800 dark:text-slate-200">
                                {{ $item->order }}
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.slider_items.edit', $item) }}" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-655 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.slider_items.destroy', $item) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este slide?')">
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
                                Nenhum slide registado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($sliderItems->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                {{ $sliderItems->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
