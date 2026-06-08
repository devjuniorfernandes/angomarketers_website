@extends('layouts.admin')

@section('title', isset($menu) ? 'Editar Item de Menu | AngoMarketers CMS' : 'Novo Item de Menu | AngoMarketers CMS')
@section('page_title', isset($menu) ? 'Editar Item de Menu' : 'Novo Item de Menu')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($menu) ? 'Editar Item: ' . $menu->title : 'Criar Novo Item de Menu' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Defina o nome, link, ordem de exibição e se pertence a algum menu pai (submenu)</p>
        </div>
        <div>
            <a href="{{ route('admin.menus.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($menu) ? route('admin.menus.update', $menu) : route('admin.menus.store') }}" 
              method="POST" 
              class="space-y-6">
            @csrf
            @isset($menu)
                @method('PUT')
            @endisset

            <!-- Title -->
            <div class="space-y-1">
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Título do Item <span class="text-primary">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $menu->title ?? '') }}" required autofocus
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: IA & Tecnologia, Sobre Nós, Contactos">
                @error('title')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- URL -->
            <div class="space-y-1">
                <label for="url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    URL / Caminho de Destino <span class="text-primary">*</span>
                </label>
                <input type="text" name="url" id="url" value="{{ old('url', $menu->url ?? '') }}" required
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: /noticias, /eventos ou /noticias?categoria=ia">
                @error('url')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Parent Item / Menu Pai -->
            <div class="space-y-1">
                <label for="parent_id" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Item Pai (Transformar em Submenu)
                </label>
                <select name="parent_id" id="parent_id"
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    <option value="">-- Menu Principal (Sem Pai) --</option>
                    @foreach($parentMenus as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $menu->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->title }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div class="space-y-1">
                <label for="order" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Ordem de Exibição <span class="text-primary">*</span>
                </label>
                <input type="number" name="order" id="order" value="{{ old('order', $menu->order ?? '0') }}" required min="0"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                       placeholder="Ex: 0, 1, 2">
                @error('order')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.menus.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($menu) ? 'Guardar Alterações' : 'Criar Item de Menu' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
