@extends('layouts.app')

@section('title', $training->meta_title ?: $training->title . ' | AngoMarketers')
@section('meta_description', $training->meta_description ?: $training->excerpt)
@section('og_image', $training->cover_image)

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Breadcrumbs -->
    <nav class="flex text-xs font-semibold text-slate-400 dark:text-slate-500 gap-2 items-center mb-8">
        <a href="/" class="hover:text-primary transition-colors">Home</a>
        <span>/</span>
        <a href="{{ route('trainings.index') }}" class="hover:text-primary transition-colors">Formações</a>
        <span>/</span>
        <span class="text-slate-650 dark:text-slate-350 truncate max-w-[200px] sm:max-w-none">{{ $training->title }}</span>
    </nav>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Course Details -->
        <article class="lg:col-span-8">
            <header class="mb-8">
                <!-- Badges -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">
                        {{ ucfirst($training->mode) }}
                    </span>
                    @foreach($training->categories as $cat)
                        <span class="text-xs text-slate-400 font-semibold">
                            #{{ $cat->name }}
                        </span>
                    @endforeach
                </div>

                <h1 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-slate-900 dark:text-white tracking-tight leading-tight">
                    {{ $training->title }}
                </h1>
                
                <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg italic leading-relaxed">
                    {{ $training->excerpt }}
                </p>

                <!-- Fast Info Bar -->
                <div class="mt-6 flex flex-wrap gap-6 items-center text-sm font-semibold text-slate-500 dark:text-slate-400 py-4 border-y border-slate-200/60 dark:border-slate-800">
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Instituição:</span>
                        <span class="text-slate-800 dark:text-white">{{ $training->institution }}</span>
                    </div>
                    @if($training->instructor)
                        <div class="flex items-center gap-2">
                            <span class="text-slate-400">Instrutor:</span>
                            <span class="text-slate-800 dark:text-white">{{ $training->instructor }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Visualizações:</span>
                        <span class="text-slate-800 dark:text-white">{{ $training->views_count }}</span>
                    </div>
                </div>
            </header>

            <!-- Course Banner Image -->
            <div class="relative w-full aspect-video rounded-3xl overflow-hidden bg-slate-100 dark:bg-slate-800 shadow-sm mb-10">
                <img src="{{ $training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800' }}" 
                     alt="{{ $training->title }}" 
                     class="w-full h-full object-cover" />
            </div>

            <!-- Description Body -->
            <div class="prose prose-slate dark:prose-invert max-w-none text-slate-650 dark:text-slate-350 leading-relaxed space-y-6">
                {!! nl2br(e($training->description)) !!}
            </div>

            <!-- Poly tags if exist -->
            @if(count($training->tags) > 0)
                <div class="mt-12 pt-6 border-t border-slate-200/60 dark:border-slate-800 flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mr-2">Tags:</span>
                    @foreach($training->tags as $tag)
                        <a href="/search?q={{ urlencode($tag->name) }}" class="px-3 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white dark:hover:bg-primary transition-all text-xs font-semibold rounded-lg text-slate-600 dark:text-slate-400">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Related Courses / Trainings -->
            @if(count($relatedTrainings) > 0)
                <section class="mt-16 pt-10 border-t border-slate-200/60 dark:border-slate-800">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
                        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white uppercase tracking-tight">Formações Relacionadas</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($relatedTrainings as $related)
                            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden group">
                                <a href="{{ route('trainings.show', $related->slug) }}" class="block aspect-video bg-slate-100 overflow-hidden shrink-0">
                                    <img src="{{ $related->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400' }}" 
                                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" />
                                </a>
                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <h4 class="font-heading font-bold text-sm text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                        <a href="{{ route('trainings.show', $related->slug) }}">{{ $related->title }}</a>
                                    </h4>
                                    <span class="text-[10px] font-bold text-slate-450 mt-2 block">{{ $related->institution }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </article>

        <!-- Right: Action Panel Sidebar -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Glass Box for registration info -->
            <div class="bg-slate-50 dark:bg-slate-900/80 border border-slate-200/60 dark:border-slate-800 rounded-3xl p-6 shadow-sm sticky top-28">
                <div class="mb-6">
                    <span class="text-xs font-bold text-slate-450 block uppercase tracking-wide">Investimento</span>
                    <span class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1 block">
                        @if($training->price > 0)
                            {{ number_format($training->price, 2, ',', '.') }} AOA
                        @else
                            Gratuito
                        @endif
                    </span>
                </div>

                <!-- Registration action button -->
                @if($training->registration_link)
                    <a href="{{ $training->registration_link }}" target="_blank" class="w-full inline-flex items-center justify-center py-3 px-6 bg-primary hover:bg-primary/95 text-white text-sm font-bold uppercase tracking-wider rounded-2xl shadow-md transition-all hover:shadow-lg text-center mb-6">
                        Inscrever-se Agora
                    </a>
                @else
                    <button disabled class="w-full py-3 px-6 bg-slate-300 dark:bg-slate-800 text-slate-500 dark:text-slate-450 text-sm font-bold uppercase tracking-wider rounded-2xl cursor-not-allowed text-center mb-6">
                        Inscrições Fechadas
                    </button>
                @endif

                <!-- Course Meta List -->
                <ul class="space-y-4 text-xs font-semibold text-slate-500 dark:text-slate-400">
                    <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                        <span class="text-slate-400 font-bold uppercase">Duração</span>
                        <span>{{ $training->duration }}</span>
                    </li>
                    <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                        <span class="text-slate-400 font-bold uppercase">Modalidade</span>
                        <span>{{ ucfirst($training->mode) }}</span>
                    </li>
                    @if($training->location)
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Localização</span>
                            <span class="text-right max-w-[150px] truncate" title="{{ $training->location }}">{{ $training->location }}</span>
                        </li>
                    @endif
                    @if($training->start_date)
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Data de Início</span>
                            <span>{{ $training->start_date->format('d/m/Y') }}</span>
                        </li>
                    @endif
                    @if($training->end_date)
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Data de Fim</span>
                            <span>{{ $training->end_date->format('d/m/Y') }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </aside>

    </div>
</div>
@endsection
