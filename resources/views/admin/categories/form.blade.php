@extends('layouts.admin')

@section('title', isset($category) ? 'Editar Categoria | AngoMarketers CMS' : 'Nova Categoria | AngoMarketers CMS')
@section('page_title', isset($category) ? 'Editar Categoria' : 'Nova Categoria')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($category) ? 'Editar Categoria: ' . $category->name : 'Criar Nova Categoria' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Preencha os dados abaixo para estruturar a categoria de conteúdo</p>
        </div>
        <div>
            <a href="{{ route('admin.categories.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" 
              method="POST" 
              class="space-y-6">
            @csrf
            @isset($category)
                @method('PUT')
            @endisset

            <!-- Name -->
            <div class="space-y-1">
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Nome da Categoria <span class="text-primary">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" required autofocus
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Inteligência Artificial, Finanças, Retalho">
                @error('name')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="space-y-1">
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Descrição
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors resize-none"
                          placeholder="Escreva um breve resumo explicativo sobre o que este bloco editorial aborda (opcional)...">{{ old('description', $category->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.categories.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($category) ? 'Guardar Alterações' : 'Criar Categoria' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
