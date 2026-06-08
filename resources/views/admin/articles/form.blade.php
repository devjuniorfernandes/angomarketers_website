@extends('layouts.admin')

@section('title', isset($article) ? 'Editar Artigo | AngoMarketers CMS' : 'Novo Artigo | AngoMarketers CMS')
@section('page_title', isset($article) ? 'Editar Artigo' : 'Novo Artigo')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($article) ? 'Editar Artigo: ' . Str::limit($article->title, 40) : 'Criar Novo Artigo' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Preencha os campos abaixo para {{ isset($article) ? 'atualizar' : 'publicar' }} o artigo editorial</p>
        </div>
        <div>
            <a href="{{ route('admin.articles.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($article) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-6"
              x-data="{ status: '{{ old('status', $article->status ?? 'published') }}' }">
            @csrf
            @isset($article)
                @method('PUT')
            @endisset

            <!-- Title -->
            <div class="space-y-1">
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Título do Artigo <span class="text-primary">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" required
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Startups Angolanas Captam Volume Recorde no Primeiro Semestre de 2026">
                @error('title')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div class="space-y-1">
                <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Subtítulo / Resumo
                </label>
                <textarea name="subtitle" id="subtitle" rows="2"
                          class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors resize-none"
                          placeholder="Breve descrição resumida que aparece logo após o título principal (opcional)...">{{ old('subtitle', $article->subtitle ?? '') }}</textarea>
                @error('subtitle')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author & Category Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category select -->
                <div class="space-y-1">
                    <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Categoria <span class="text-primary">*</span>
                    </label>
                    <select name="category_id" id="category_id" required
                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                        <option value="">Selecione uma Categoria</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $article->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author select -->
                <div class="space-y-1">
                    <label for="author_id" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Autor <span class="text-primary">*</span>
                    </label>
                    <select name="author_id" id="author_id" required
                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                        <option value="">Selecione um Autor</option>
                        @foreach($authors as $auth)
                            <option value="{{ $auth->id }}" {{ old('author_id', $article->author_id ?? '') == $auth->id ? 'selected' : '' }}>
                                {{ $auth->name }} ({{ $auth->role }})
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Reading Time & Status Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Reading time -->
                <div class="space-y-1">
                    <label for="reading_time" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Tempo de Leitura <span class="text-primary">*</span>
                    </label>
                    <input type="text" name="reading_time" id="reading_time" value="{{ old('reading_time', $article->reading_time ?? '5 min') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: 5 min, 10 min">
                    @error('reading_time')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status select -->
                <div class="space-y-1">
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Estado do Artigo <span class="text-primary">*</span>
                    </label>
                    <select name="status" id="status" x-model="status" required
                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                        <option value="draft">Rascunho</option>
                        <option value="published">Publicado</option>
                        <option value="scheduled">Agendado</option>
                    </select>
                    @error('status')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published At (scheduled date) -->
                <div class="space-y-1" x-show="status === 'scheduled'">
                    <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Data de Publicação Agendada <span class="text-primary">*</span>
                    </label>
                    <input type="datetime-local" name="published_at" id="published_at" 
                           value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    @error('published_at')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image Cover Upload -->
            <div class="space-y-2">
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Imagem de Capa (Proporção Recomendada: 16:9 ou 21:9) {{ !isset($article) ? '*' : '' }}
                </label>
                
                @isset($article->image_path)
                    <div class="mb-3 w-full max-w-sm border border-slate-200 dark:border-slate-800 overflow-hidden bg-slate-900 aspect-video rounded-none">
                        <img src="{{ $article->image_path }}" alt="Capa atual" class="w-full h-full object-cover">
                    </div>
                    <p class="text-[10px] text-slate-450 dark:text-slate-500 mb-2">Para alterar a imagem de capa, selecione um novo ficheiro abaixo:</p>
                @endisset

                <input type="file" name="image" id="image" {{ !isset($article) ? 'required' : '' }}
                       class="w-full file:bg-slate-900 file:hover:bg-slate-850 file:dark:bg-slate-800 file:dark:hover:bg-slate-700 file:text-white file:font-heading file:font-bold file:text-xs file:py-2.5 file:px-4 file:border-none file:rounded-none file:hover:cursor-pointer file:uppercase file:tracking-wider file:mr-4 border border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-450 text-sm">
                @error('image')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tags & Featured -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tags -->
                <div class="space-y-1">
                    <label for="tags" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Tags (Separadas por vírgulas)
                    </label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', $tags ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: Marketing Digital, Luanda, SEO">
                </div>

                <!-- Featured -->
                <div class="flex items-center pt-6">
                    <label class="flex items-center text-sm text-slate-700 dark:text-slate-355 hover:cursor-pointer">
                        <input type="checkbox" name="featured" value="1"
                               {{ old('featured', $article->featured ?? false) ? 'checked' : '' }}
                               class="mr-2 rounded-none border-slate-300 dark:border-slate-700 text-primary focus:ring-primary">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Destacar Artigo</span>
                    </label>
                </div>
            </div>

            <!-- SEO Meta Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-slate-100 dark:border-slate-800 pt-6">
                <div class="space-y-1">
                    <label for="meta_title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Meta Title
                    </label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $article->meta_title ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                </div>
                <div class="space-y-1">
                    <label for="meta_description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Meta Description
                    </label>
                    <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $article->meta_description ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-850 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                </div>
            </div>

            <!-- Editorial Body -->
            <div class="space-y-1">
                <label for="body" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Conteúdo do Artigo <span class="text-primary">*</span>
                </label>
                <textarea name="body" id="body" rows="12" required
                          class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-base leading-relaxed transition-colors font-sans"
                          placeholder="Escreva ou cole aqui todo o conteúdo editorial do artigo... Use quebras de linha normais para parágrafos.">{{ old('body', $article->body ?? '') }}</textarea>
                @error('body')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.articles.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($article) ? 'Guardar Alterações' : 'Publicar Artigo' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
