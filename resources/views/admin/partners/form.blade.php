@extends('layouts.admin')

@section('title', isset($partner) ? 'Editar Parceiro | AngoMarketers CMS' : 'Novo Parceiro | AngoMarketers CMS')
@section('page_title', isset($partner) ? 'Editar Parceiro' : 'Novo Parceiro')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($partner) ? 'Editar Parceiro: ' . $partner->name : 'Criar Novo Parceiro' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Configure o logotipo e redirecionamento do parceiro corporativo</p>
        </div>
        <div>
            <a href="{{ route('admin.partners.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @isset($partner)
                @method('PUT')
            @endisset

            <!-- Name -->
            <div class="space-y-1">
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Nome da Organização <span class="text-primary">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $partner->name ?? '') }}" required autofocus
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Unitel SA, Banco Fomento Angola">
                @error('name')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Website URL -->
            <div class="space-y-1">
                <label for="url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Website URL
                    <span class="text-[10px] text-slate-500 lowercase">(Ex: https://www.exemplo.ao)</span>
                </label>
                <input type="url" name="url" id="url" value="{{ old('url', $partner->url ?? '') }}"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="https://exemplo.ao">
                @error('url')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div class="space-y-1">
                <label for="order" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Ordem de Exibição <span class="text-primary">*</span>
                </label>
                <input type="number" name="order" id="order" value="{{ old('order', $partner->order ?? '0') }}" required min="0"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                       placeholder="Ex: 0, 1, 2">
                @error('order')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo -->
            <div class="space-y-2">
                <label for="logo" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Logótipo {{ isset($partner) ? '(Opcional)' : '*' }}
                </label>
                @isset($partner->logo_path)
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ $partner->logo_path }}" alt="Logo Atual" class="h-10 max-w-[120px] object-contain bg-slate-100 dark:bg-slate-800 p-2 border border-slate-200 dark:border-slate-700">
                        <span class="text-xs text-slate-500">Logótipo atual. Envie outro para substituir.</span>
                    </div>
                @endisset
                <input type="file" name="logo" id="logo" {{ isset($partner) ? '' : 'required' }}
                       class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-none file:border file:border-slate-200 dark:file:border-slate-700 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-slate-50 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 hover:file:bg-slate-100 dark:hover:file:bg-slate-700 transition-colors">
                @error('logo')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.partners.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($partner) ? 'Guardar Alterações' : 'Criar Parceiro' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
