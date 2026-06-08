@extends('layouts.admin')

@section('title', isset($sliderItem) ? 'Editar Slide | AngoMarketers CMS' : 'Novo Slide | AngoMarketers CMS')
@section('page_title', isset($sliderItem) ? 'Editar Slide' : 'Novo Slide')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($sliderItem) ? 'Editar Slide: ' . $sliderItem->title : 'Criar Novo Slide' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Configure o título, legenda, imagem e link de destino do slide</p>
        </div>
        <div>
            <a href="{{ route('admin.slider_items.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($sliderItem) ? route('admin.slider_items.update', $sliderItem) : route('admin.slider_items.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @isset($sliderItem)
                @method('PUT')
            @endisset

            <!-- Title -->
            <div class="space-y-1">
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Título do Slide <span class="text-primary">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $sliderItem->title ?? '') }}" required autofocus
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Liderando o Futuro Digital em Angola">
                @error('title')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div class="space-y-1">
                <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Subtítulo / Legenda
                </label>
                <textarea name="subtitle" id="subtitle" rows="3"
                          class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors resize-none"
                          placeholder="Ex: Descubra as principais tendências de Marketing, Tecnologia, IA & Negócios.">{{ old('subtitle', $sliderItem->subtitle ?? '') }}</textarea>
                @error('subtitle')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Redirect URL -->
            <div class="space-y-1">
                <label for="url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Link de Destino / URL <span class="text-primary">*</span>
                </label>
                <input type="text" name="url" id="url" value="{{ old('url', $sliderItem->url ?? '') }}" required
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                       placeholder="Ex: /noticias ou https://link-externo.com">
                @error('url')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Badge -->
                <div class="space-y-1 md:col-span-2">
                    <label for="badge" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Etiqueta / Badge <span class="text-[10px] text-slate-500 lowercase">(Opcional)</span>
                    </label>
                    <input type="text" name="badge" id="badge" value="{{ old('badge', $sliderItem->badge ?? '') }}"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                           placeholder="Ex: EVENTO, NOVO, IA">
                    @error('badge')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Badge Color -->
                <div class="space-y-1">
                    <label for="badge_color" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Cor da Etiqueta <span class="text-primary">*</span>
                    </label>
                    <select name="badge_color" id="badge_color" required
                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                        <option value="bg-primary" {{ old('badge_color', $sliderItem->badge_color ?? '') === 'bg-primary' ? 'selected' : '' }}>Vermelho (Principal)</option>
                        <option value="bg-slate-900" {{ old('badge_color', $sliderItem->badge_color ?? '') === 'bg-slate-900' ? 'selected' : '' }}>Preto/Slate</option>
                        <option value="bg-emerald-600" {{ old('badge_color', $sliderItem->badge_color ?? '') === 'bg-emerald-600' ? 'selected' : '' }}>Verde</option>
                        <option value="bg-blue-600" {{ old('badge_color', $sliderItem->badge_color ?? '') === 'bg-blue-600' ? 'selected' : '' }}>Azul</option>
                        <option value="bg-amber-500" {{ old('badge_color', $sliderItem->badge_color ?? '') === 'bg-amber-500' ? 'selected' : '' }}>Laranja</option>
                    </select>
                    @error('badge_color')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Order -->
            <div class="space-y-1">
                <label for="order" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Ordem de Exibição <span class="text-primary">*</span>
                </label>
                <input type="number" name="order" id="order" value="{{ old('order', $sliderItem->order ?? '0') }}" required min="0"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors"
                       placeholder="Ex: 0, 1, 2">
                @error('order')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slide Image -->
            <div class="space-y-2">
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Imagem de Fundo do Slide {{ isset($sliderItem) ? '(Opcional)' : '*' }}
                </label>
                @isset($sliderItem->image_path)
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ $sliderItem->image_path }}" alt="Slide Atual" class="w-24 h-14 object-cover border border-slate-200 dark:border-slate-700">
                        <span class="text-xs text-slate-500">Imagem atual. Envie outra para substituir.</span>
                    </div>
                @endisset
                <input type="file" name="image" id="image" {{ isset($sliderItem) ? '' : 'required' }}
                       class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-none file:border file:border-slate-200 dark:file:border-slate-700 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-slate-50 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 hover:file:bg-slate-100 dark:hover:file:bg-slate-700 transition-colors">
                @error('image')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.slider_items.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($sliderItem) ? 'Guardar Alterações' : 'Criar Slide' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
