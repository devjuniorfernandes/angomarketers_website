@extends('layouts.admin')

@section('title', isset($author) ? 'Editar Autor | AngoMarketers CMS' : 'Novo Autor | AngoMarketers CMS')
@section('page_title', isset($author) ? 'Editar Autor' : 'Novo Autor')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($author) ? 'Editar Autor: ' . $author->name : 'Criar Novo Autor' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Preencha os dados biográficos e redes sociais do autor</p>
        </div>
        <div>
            <a href="{{ route('admin.authors.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($author) ? route('admin.authors.update', $author) : route('admin.authors.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @isset($author)
                @method('PUT')
            @endisset

            <!-- Name -->
            <div class="space-y-1">
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Nome Completo <span class="text-primary">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $author->name ?? '') }}" required autofocus
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Sandra Neto">
                @error('name')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role / Cargo -->
            <div class="space-y-1">
                <label for="role" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Cargo / Função <span class="text-primary">*</span>
                </label>
                <input type="text" name="role" id="role" value="{{ old('role', $author->role ?? '') }}" required
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Editora Executiva & IA Lead">
                @error('role')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bio -->
            <div class="space-y-1">
                <label for="bio" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Biografia
                </label>
                <textarea name="bio" id="bio" rows="4"
                          class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors resize-none"
                          placeholder="Fale um pouco sobre a carreira editorial do autor... (opcional)">{{ old('bio', $author->bio ?? '') }}</textarea>
                @error('bio')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div class="space-y-2">
                <label for="avatar" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Avatar / Foto de Perfil {{ isset($author) ? '(Opcional)' : '*' }}
                </label>
                @isset($author->avatar_path)
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ $author->avatar_path }}" alt="Avatar Atual" class="w-16 h-16 object-cover border border-slate-200 dark:border-slate-700">
                        <span class="text-xs text-slate-500">Foto atual. Envie outra para substituir.</span>
                    </div>
                @endisset
                <input type="file" name="avatar" id="avatar" {{ isset($author) ? '' : 'required' }}
                       class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-none file:border file:border-slate-200 dark:file:border-slate-700 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-slate-50 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 hover:file:bg-slate-100 dark:hover:file:bg-slate-700 transition-colors">
                @error('avatar')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Social Links Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-slate-150 dark:border-slate-850">
                <!-- Facebook -->
                <div class="space-y-1">
                    <label for="facebook_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Facebook URL
                    </label>
                    <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $author->facebook_url ?? '') }}"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                           placeholder="https://facebook.com/username">
                    @error('facebook_url')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Twitter / X -->
                <div class="space-y-1">
                    <label for="twitter_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Twitter / X URL
                    </label>
                    <input type="text" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $author->twitter_url ?? '') }}"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                           placeholder="https://x.com/username">
                    @error('twitter_url')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- LinkedIn -->
                <div class="space-y-1">
                    <label for="linkedin_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        LinkedIn URL
                    </label>
                    <input type="text" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $author->linkedin_url ?? '') }}"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                           placeholder="https://linkedin.com/in/username">
                    @error('linkedin_url')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.authors.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($author) ? 'Guardar Alterações' : 'Criar Autor' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
