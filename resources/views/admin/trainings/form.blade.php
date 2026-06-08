@extends('layouts.admin')

@section('title', isset($training) ? 'Editar Formação | AngoMarketers CMS' : 'Nova Formação | AngoMarketers CMS')
@section('page_title', isset($training) ? 'Editar Formação' : 'Criar Nova Formação')

@section('content')
<div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-none">
    <div class="mb-6">
        <h2 class="font-heading font-black text-lg text-slate-900 dark:text-white uppercase tracking-tight">
            {{ isset($training) ? 'Editar dados da Formação' : 'Preencher dados da nova Formação' }}
        </h2>
    </div>

    <form action="{{ isset($training) ? route('admin.trainings.update', $training) : route('admin.trainings.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6">
        @csrf
        @if(isset($training))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Left Side: Main Fields -->
            <div class="md:col-span-8 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Título da Formação</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $training->title ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                    @error('title')
                        <span class="text-xs text-primary mt-1 block font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Breve Resumo (Excerpt)</label>
                    <textarea name="excerpt" id="excerpt" rows="2"
                              class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">{{ old('excerpt', $training->excerpt ?? '') }}</textarea>
                    @error('excerpt')
                        <span class="text-xs text-primary mt-1 block font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Descrição Completa</label>
                    <textarea name="description" id="description" rows="10" required
                              class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">{{ old('description', $training->description ?? '') }}</textarea>
                    @error('description')
                        <span class="text-xs text-primary mt-1 block font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- SEO Section -->
                <div class="border-t border-slate-200 dark:border-slate-800 pt-6 space-y-6">
                    <h3 class="font-heading font-bold text-sm text-slate-900 dark:text-white uppercase tracking-wider">SEO Profissional (Opcional)</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="meta_title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $training->meta_title ?? '') }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                        </div>
                        <div>
                            <label for="meta_description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Meta Description</label>
                            <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $training->meta_description ?? '') }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Sidebar Fields -->
            <div class="md:col-span-4 space-y-6">
                <!-- Cover Image -->
                <div>
                    <label for="cover_image" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Imagem de Capa</label>
                    @if(isset($training) && $training->cover_image)
                        <div class="mb-3 w-full h-32 bg-slate-150 border border-slate-200 dark:border-slate-800 overflow-hidden">
                            <img src="{{ $training->cover_image }}" class="w-full h-full object-cover" />
                        </div>
                    @endif
                    <input type="file" name="cover_image" id="cover_image"
                           class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-none file:border-0 file:text-xs file:font-bold file:uppercase file:bg-slate-100 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 hover:file:bg-primary hover:file:text-white file:transition-colors file:cursor-pointer">
                    @error('cover_image')
                        <span class="text-xs text-primary mt-1 block font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Institution -->
                <div>
                    <label for="institution" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Instituição / Escola</label>
                    <input type="text" name="institution" id="institution" value="{{ old('institution', $training->institution ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                    @error('institution')
                        <span class="text-xs text-primary mt-1 block font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Instructor -->
                <div>
                    <label for="instructor" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Instrutor / Professor</label>
                    <input type="text" name="instructor" id="instructor" value="{{ old('instructor', $training->instructor ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                </div>

                <!-- Duration -->
                <div>
                    <label for="duration" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Duração (Ex: 30 horas)</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration', $training->duration ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Preço em Kwanza (0 se gratuito)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $training->price ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                </div>

                <!-- Mode & Location -->
                <div x-data="{ mode: '{{ old('mode', $training->mode ?? 'online') }}' }">
                    <div class="mb-4">
                        <label for="mode" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Modalidade</label>
                        <select name="mode" id="mode" x-model="mode"
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                            <option value="online">Online</option>
                            <option value="presencial">Presencial</option>
                            <option value="híbrido">Híbrido</option>
                        </select>
                    </div>

                    <div x-show="mode !== 'online'">
                        <label for="location" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Localização / Morada</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $training->location ?? '') }}"
                               class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                    </div>
                </div>

                <!-- Registration Link -->
                <div>
                    <label for="registration_link" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Link de Inscrição / Compra</label>
                    <input type="url" name="registration_link" id="registration_link" value="{{ old('registration_link', $training->registration_link ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                </div>

                <!-- Start Date & End Date -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Data de Início</label>
                        <input type="datetime-local" name="start_date" id="start_date" 
                               value="{{ old('start_date', isset($training) && $training->start_date ? $training->start_date->format('Y-m-d\TH:i') : '') }}"
                               class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                    </div>
                    <div>
                        <label for="end_date" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Data de Fim</label>
                        <input type="datetime-local" name="end_date" id="end_date" 
                               value="{{ old('end_date', isset($training) && $training->end_date ? $training->end_date->format('Y-m-d\TH:i') : '') }}"
                               class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                    </div>
                </div>

                <!-- Categories -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Categorias da Formação</label>
                    <div class="space-y-2 max-h-48 overflow-y-auto border border-slate-200 dark:border-slate-850 p-3 bg-slate-50 dark:bg-slate-800/50">
                        @foreach($categories as $category)
                            <label class="flex items-center text-sm text-slate-700 dark:text-slate-350 hover:cursor-pointer">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                       @if(isset($training) && $training->categories->contains($category->id)) checked @endif
                                       class="mr-2 rounded-none border-slate-300 dark:border-slate-700 text-primary focus:ring-primary">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div>
                    <label for="tags" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Tags (Separadas por vírgulas)</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', $tags ?? '') }}" placeholder="Ex: Marketing Digital, SEO, IA, Luanda"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Estado de Publicação</label>
                    <select name="status" id="status"
                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-850 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm">
                        <option value="published" {{ old('status', $training->status ?? '') === 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="draft" {{ old('status', $training->status ?? '') === 'draft' ? 'selected' : '' }}>Rascunho</option>
                        <option value="scheduled" {{ old('status', $training->status ?? '') === 'scheduled' ? 'selected' : '' }}>Agendado</option>
                    </select>
                </div>

                <!-- Featured -->
                <div class="flex items-center">
                    <label class="flex items-center text-sm text-slate-700 dark:text-slate-350 hover:cursor-pointer">
                        <input type="checkbox" name="featured" value="1"
                               {{ old('featured', $training->featured ?? false) ? 'checked' : '' }}
                               class="mr-2 rounded-none border-slate-300 dark:border-slate-700 text-primary focus:ring-primary">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Destacar no Portal</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-3 pt-6 border-t border-slate-200 dark:border-slate-800">
            <a href="{{ route('admin.trainings.index') }}" 
               class="px-5 py-3 border border-slate-200 dark:border-slate-800 font-heading font-extrabold text-xs uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-850 rounded-none transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                    class="px-5 py-3 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs uppercase tracking-wider rounded-none transition-colors hover:cursor-pointer">
                {{ isset($training) ? 'Atualizar Formação' : 'Criar Formação' }}
            </button>
        </div>
    </form>
</div>
@endsection
