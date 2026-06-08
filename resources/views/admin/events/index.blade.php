@extends('layouts.admin')

@section('title', 'Eventos | AngoMarketers CMS')
@section('page_title', 'Gestão de Eventos')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Eventos</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir todos os eventos futuros e passados do portal</p>
        </div>
        <div>
            <a href="{{ route('admin.events.create') }}" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Evento
            </a>
        </div>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Capa</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Título</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Data</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Localização</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($events as $event)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Image Cover -->
                            <td class="p-4">
                                <div class="w-12 h-8 bg-slate-900 border border-slate-200 dark:border-slate-700 overflow-hidden shrink-0">
                                    <img src="{{ $event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=150' }}" 
                                         alt="{{ $event->title }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </td>
                            <!-- Title -->
                            <td class="p-4 max-w-[300px]">
                                <div class="font-bold text-slate-900 dark:text-white truncate" title="{{ $event->title }}">
                                    {{ $event->title }}
                                </div>
                                <div class="text-xs text-slate-450 dark:text-slate-500 mt-0.5 truncate" title="{{ $event->description }}">
                                    {{ $event->description }}
                                </div>
                            </td>
                            <!-- Event Date -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-semibold text-xs">
                                {{ $event->event_date->format('d/m/Y H:i') }}
                                @if($event->isPast())
                                    <span class="block text-[10px] text-slate-400 mt-0.5">Terminado</span>
                                @else
                                    <span class="block text-[10px] text-emerald-500 mt-0.5">Brevemente</span>
                                @endif
                            </td>
                            <!-- Location -->
                            <td class="p-4 text-slate-650 dark:text-slate-400">
                                {{ $event->location }}
                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                @if($event->status === 'published')
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Publicado</span>
                                @elseif($event->status === 'scheduled')
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-sky-500/10 text-sky-500">Agendado</span>
                                @else
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Rascunho</span>
                                @endif
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este evento?')">
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
                            <td colspan="6" class="p-8 text-center text-slate-450 dark:text-slate-500">
                                Nenhum evento cadastrado no sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
