@extends('layouts.admin')

@section('title', 'Subscritores | AngoMarketers CMS')
@section('page_title', 'Lista de Subscritores')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div>
        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Subscritores do WhatsApp</h2>
        <p class="text-xs text-slate-500 mt-1">Lista de números de WhatsApp inscritos no portal AngoMarketers</p>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-12 text-center">#</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Número de WhatsApp</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Data de Subscrição</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($subscribers as $index => $subscriber)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Index -->
                            <td class="p-4 text-center text-slate-400 font-semibold font-mono text-xs">
                                {{ ($subscribers->currentPage() - 1) * $subscribers->perPage() + $index + 1 }}
                            </td>
                            <!-- WhatsApp -->
                            <td class="p-4 font-bold text-slate-900 dark:text-white">
                                {{ $subscriber->whatsapp }}
                            </td>
                            <!-- Created At -->
                            <td class="p-4 text-slate-550 dark:text-slate-400 text-xs">
                                {{ $subscriber->created_at->format('d \d\e F \d\e Y \à\s H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum contacto de WhatsApp registado atualmente.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($subscribers->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                {{ $subscribers->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
