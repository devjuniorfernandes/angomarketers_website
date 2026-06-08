@extends('layouts.admin')

@section('title', isset($event) ? 'Editar Evento | AngoMarketers CMS' : 'Novo Evento | AngoMarketers CMS')
@section('page_title', isset($event) ? 'Editar Evento' : 'Novo Evento')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header info -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">
                {{ isset($event) ? 'Editar Evento: ' . Str::limit($event->title, 40) : 'Criar Novo Evento' }}
            </h2>
            <p class="text-xs text-slate-500 mt-1">Preencha os campos abaixo para {{ isset($event) ? 'atualizar' : 'publicar' }} o evento na comunidade</p>
        </div>
        <div>
            <a href="{{ route('admin.events.index') }}" 
               class="px-3.5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-200 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                Voltar
            </a>
        </div>
    </div>

    <!-- Form container -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none">
        <form action="{{ isset($event) ? route('admin.events.update', $event) : route('admin.events.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-6"
              x-data="{ status: '{{ old('status', $event->status ?? 'published') }}' }">
            @csrf
            @isset($event)
                @method('PUT')
            @endisset

            <!-- Title -->
            <div class="space-y-1">
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Título do Evento <span class="text-primary">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" required
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                       placeholder="Ex: Fórum de Marketing Digital Angolano 2026">
                @error('title')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="space-y-1">
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Breve Descrição / Slogan
                </label>
                <textarea name="description" id="description" rows="2"
                          class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-850 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors resize-none"
                          placeholder="Subtítulo descritivo do evento... Ex: O maior encontro de comunicadores e influenciadores digitais do país.">{{ old('description', $event->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location, Organizer & Date Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Location -->
                <div class="space-y-1">
                    <label for="location" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Localização <span class="text-primary">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: Hotel Epic Sana, Luanda (ou Virtual)">
                    @error('location')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Organizer -->
                <div class="space-y-1">
                    <label for="organizer" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Organizador / Entidade
                    </label>
                    <input type="text" name="organizer" id="organizer" value="{{ old('organizer', $event->organizer ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: AngoMarketers">
                    @error('organizer')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Date (Start) -->
                <div class="space-y-1">
                    <label for="event_date" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Data e Hora de Início <span class="text-primary">*</span>
                    </label>
                    <input type="datetime-local" name="event_date" id="event_date" 
                           value="{{ old('event_date', isset($event) ? $event->event_date->format('Y-m-d\TH:i') : '') }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    @error('event_date')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Date (End) -->
                <div class="space-y-1">
                    <label for="event_end_date" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Data e Hora de Fim
                    </label>
                    <input type="datetime-local" name="event_end_date" id="event_end_date" 
                           value="{{ old('event_end_date', isset($event) && $event->event_end_date ? $event->event_end_date->format('Y-m-d\TH:i') : '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    @error('event_end_date')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ticket Price -->
                <div class="space-y-1">
                    <label for="ticket_price" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Preço do Bilhete (AOA)
                    </label>
                    <input type="number" step="0.01" name="ticket_price" id="ticket_price" value="{{ old('ticket_price', $event->ticket_price ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: 15000 (0 ou vazio se gratuito)">
                    @error('ticket_price')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Capacity -->
                <div class="space-y-1">
                    <label for="capacity" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Capacidade máxima
                    </label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $event->capacity ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: 150">
                    @error('capacity')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Links Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Registration Link -->
                <div class="space-y-1">
                    <label for="registration_link" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Link de Inscrição (Opção Futuros)
                    </label>
                    <input type="url" name="registration_link" id="registration_link" value="{{ old('registration_link', $event->registration_link ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: https://ingresso-evento.com/comprar">
                    @error('registration_link')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Video Link -->
                <div class="space-y-1">
                    <label for="video_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Vídeo de Cobertura (Opção Passados)
                    </label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $event->video_url ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                           placeholder="Ex: https://youtube.com/watch?v=id_video">
                    @error('video_url')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status & Scheduled Date Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Status select -->
                <div class="space-y-1">
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Estado da Publicação <span class="text-primary">*</span>
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

                <!-- Published At (for scheduled status) -->
                <div class="space-y-1" x-show="status === 'scheduled'">
                    <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Data de Publicação Agendada <span class="text-primary">*</span>
                    </label>
                    <input type="datetime-local" name="published_at" id="published_at" 
                           value="{{ old('published_at', isset($event) && $event->published_at ? $event->published_at->format('Y-m-d\TH:i') : '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    @error('published_at')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Banner Cover -->
            <div class="space-y-2">
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Imagem de Destaque / Banner (16:9) {{ !isset($event) ? '*' : '' }}
                </label>
                @isset($event->image_path)
                    <div class="mb-3 w-full max-w-sm border border-slate-200 dark:border-slate-800 overflow-hidden bg-slate-900 aspect-video">
                        <img src="{{ $event->image_path }}" alt="Banner atual" class="w-full h-full object-cover">
                    </div>
                @endisset
                <input type="file" name="image" id="image" {{ !isset($event) ? 'required' : '' }}
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
                           placeholder="Ex: Luanda, Tecnologia, Branding">
                </div>

                <!-- Featured -->
                <div class="flex items-center pt-6">
                    <label class="flex items-center text-sm text-slate-700 dark:text-slate-355 hover:cursor-pointer">
                        <input type="checkbox" name="featured" value="1"
                               {{ old('featured', $event->featured ?? false) ? 'checked' : '' }}
                               class="mr-2 rounded-none border-slate-300 dark:border-slate-700 text-primary focus:ring-primary">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Destacar Evento</span>
                    </label>
                </div>
            </div>

            <!-- SEO Meta Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-slate-100 dark:border-slate-800 pt-6">
                <div class="space-y-1">
                    <label for="meta_title" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Meta Title
                    </label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $event->meta_title ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                </div>
                <div class="space-y-1">
                    <label for="meta_description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Meta Description
                    </label>
                    <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $event->meta_description ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-850 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                </div>
            </div>

            <!-- Storytelling Review / Body -->
            <div class="space-y-1">
                <label for="body" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    Descrição Detalhada / Crónica Resumo <span class="text-primary">*</span>
                </label>
                <textarea name="body" id="body" rows="10" required
                          class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm leading-relaxed transition-colors font-sans"
                          placeholder="Insira os detalhes do evento ou o resumo (crónica storytelling com fotos/vídeos)...">{{ old('body', $event->body ?? '') }}</textarea>
                @error('body')
                    <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gallery Uploads (Optional, for past events) -->
            <div class="space-y-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Galeria de Imagens do Evento (Opcional)</h3>
                
                @if(isset($event) && count($event->photos) > 0)
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-4 mb-4">
                        @foreach($event->photos as $photo)
                            <div class="relative aspect-square border border-slate-200 dark:border-slate-850 rounded-lg overflow-hidden group">
                                <img src="{{ $photo->image_path }}" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <label class="flex items-center gap-1.5 cursor-pointer text-white font-bold text-xs">
                                        <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}" class="accent-primary rounded">
                                        <span>Apagar</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-[10px] text-slate-450 dark:text-slate-500 mb-2">Marque a caixa "Apagar" acima nas fotos que pretende excluir do evento.</p>
                @endif

                <div class="space-y-1">
                    <label for="gallery" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Carregar Novas Fotos da Galeria (Múltiplas)
                    </label>
                    <input type="file" name="gallery[]" id="gallery" multiple
                           class="w-full file:bg-slate-900 file:hover:bg-slate-850 file:dark:bg-slate-800 file:dark:hover:bg-slate-700 file:text-white file:font-heading file:font-bold file:text-xs file:py-2.5 file:px-4 file:border-none file:rounded-none file:hover:cursor-pointer file:uppercase file:tracking-wider file:mr-4 border border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-450 text-sm">
                    @error('gallery.*')
                        <p class="text-xs text-primary font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-150 dark:border-slate-850">
                <a href="{{ route('admin.events.index') }}" 
                   class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-350 rounded-none border border-slate-200 dark:border-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                    {{ isset($event) ? 'Guardar Alterações' : 'Criar Evento' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
