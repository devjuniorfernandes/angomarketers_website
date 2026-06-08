@extends('layouts.admin')

@section('title', 'Comentários | AngoMarketers CMS')
@section('page_title', 'Moderação de Comentários')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Comentários</h2>
        <p class="text-xs text-slate-500 mt-1">Aprove ou elimine as contribuições dos leitores no portal</p>
    </div>

    <!-- Status Filters -->
    <div class="flex items-center gap-2 border-b border-slate-200 dark:border-slate-800 pb-px">
        <a href="{{ route('admin.comments.index', ['status' => 'all']) }}" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors {{ $status === 'all' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200' }}">
            Todos
        </a>
        <a href="{{ route('admin.comments.index', ['status' => 'pending']) }}" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors {{ $status === 'pending' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200' }}">
            Pendentes
        </a>
        <a href="{{ route('admin.comments.index', ['status' => 'approved']) }}" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors {{ $status === 'approved' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200' }}">
            Aprovados
        </a>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/5">Autor</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-2/5">Comentário</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/5">Artigo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-24">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    @forelse($comments as $comment)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Author info -->
                            <td class="p-4">
                                <div class="font-bold text-slate-900 dark:text-white">{{ $comment->author_name }}</div>
                                <div class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-semibold">{{ $comment->author_email }}</div>
                                <div class="text-[10px] text-slate-400 dark:text-slate-500 mt-1 font-semibold">{{ $comment->created_at->format('d M Y H:i') }}</div>
                            </td>
                            <!-- Content -->
                            <td class="p-4 text-slate-700 dark:text-slate-300 text-xs leading-relaxed max-w-sm italic">
                                "{{ $comment->content }}"
                            </td>
                            <!-- Article Title -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-medium max-w-[200px] truncate" title="{{ $comment->article->title ?? 'N/A' }}">
                                @if($comment->article)
                                    <a href="/article/{{ $comment->article->slug }}" target="_blank" class="hover:text-primary transition-colors">
                                        {{ $comment->article->title }}
                                    </a>
                                @else
                                    <span class="text-slate-400">Artigo não encontrado</span>
                                @endif
                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                @if($comment->is_approved)
                                    <span class="inline-flex px-2 py-0.5 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Aprovado</span>
                                @else
                                    <span class="inline-flex px-2 py-0.5 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Pendente</span>
                                @endif
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    @if(!$comment->is_approved)
                                        <!-- Approve form -->
                                        <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    class="px-2 py-1 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold uppercase tracking-wider hover:cursor-pointer transition-colors">
                                                Aprovar
                                            </button>
                                        </form>
                                    @endif
                                    <!-- Delete form -->
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Deseja realmente eliminar este comentário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-2 py-1 bg-slate-105 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-primary hover:cursor-pointer transition-colors">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum comentário encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($comments->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
