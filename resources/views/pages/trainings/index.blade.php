@extends('layouts.app')

@section('title', 'Formações e Cursos de Marketing e Negócios em Angola | AngoMarketers')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Page Header -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">Capacitação & Desenvolvimento</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl text-slate-900 dark:text-white mt-4 tracking-tight leading-tight">
            Impulsione a sua Carreira com Formações de Excelência
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg">
            Encontre os melhores cursos, workshops e especializações ministrados por instituições e instrutores de referência.
        </p>
    </div>

    <!-- Filters Section -->
    <div class="bg-slate-50 dark:bg-slate-900/60 border border-slate-200/60 dark:border-slate-800 rounded-3xl p-6 mb-12 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="{{ route('trainings.index') }}" method="GET" class="w-full flex flex-wrap gap-4 items-center">
            <!-- Category Filter -->
            <div class="flex flex-col min-w-[200px] flex-grow md:flex-grow-0">
                <label for="category" class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Categoria</label>
                <select name="category" id="category" onchange="this.form.submit()" class="px-4 py-2.5 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-1 focus:ring-primary w-full">
                    <option value="">Todas as Categorias</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" {{ $selectedCategory == $cat->slug ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Mode Filter -->
            <div class="flex flex-col min-w-[150px] flex-grow md:flex-grow-0">
                <label for="mode" class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Modalidade</label>
                <select name="mode" id="mode" onchange="this.form.submit()" class="px-4 py-2.5 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-1 focus:ring-primary w-full">
                    <option value="">Todas</option>
                    <option value="online" {{ $selectedMode == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="presencial" {{ $selectedMode == 'presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="híbrido" {{ $selectedMode == 'híbrido' ? 'selected' : '' }}>Híbrido</option>
                </select>
            </div>

            @if($selectedCategory || $selectedMode)
                <div class="self-end pb-1.5 flex-grow md:flex-grow-0">
                    <a href="{{ route('trainings.index') }}" class="text-xs font-extrabold uppercase text-primary hover:underline flex items-center gap-1">
                        Limpar Filtros &times;
                    </a>
                </div>
            @endif
        </form>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Trainings Grid -->
        <div class="lg:col-span-8 space-y-8">
            @if(count($trainings) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($trainings as $training)
                        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col h-full overflow-hidden group">
                            <!-- Cover Image -->
                            <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden shrink-0">
                                <img src="{{ $training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600' }}" 
                                     alt="{{ $training->title }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                                <div class="absolute top-4 left-4 bg-slate-900/80 backdrop-blur-xs text-white text-[10px] font-black uppercase tracking-wider px-3 py-1.5 rounded-lg">
                                    {{ ucfirst($training->mode) }}
                                </div>
                                @if($training->featured)
                                    <div class="absolute top-4 right-4 bg-primary text-white text-[10px] font-black uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-sm">
                                        Destaque
                                    </div>
                                @endif
                            </div>

                            <!-- Content Details -->
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <!-- Institution name -->
                                    <div class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">
                                        {{ $training->institution }}
                                    </div>

                                    <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                        <a href="{{ route('trainings.show', $training->slug) }}">{{ $training->title }}</a>
                                    </h3>

                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-3 line-clamp-3 leading-relaxed">
                                        {{ $training->excerpt }}
                                    </p>

                                    <!-- Price / Date Info -->
                                    <div class="mt-4 flex flex-wrap gap-4 text-xs font-semibold text-slate-400 dark:text-slate-500">
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $training->duration }}
                                        </span>
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 16v1" /></svg>
                                            @if($training->price > 0)
                                                {{ number_format($training->price, 2, ',', '.') }} AOA
                                            @else
                                                Gratuito
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                    <a href="{{ route('trainings.show', $training->slug) }}" class="text-xs font-extrabold uppercase text-slate-900 dark:text-white hover:text-primary transition-colors flex items-center gap-1">
                                        Ver Detalhes &rarr;
                                    </a>
                                    @if($training->registration_link)
                                        <a href="{{ $training->registration_link }}" target="_blank" class="px-4 py-2 bg-primary hover:bg-primary/95 text-white text-xs font-bold rounded-xl shadow-md transition-all">
                                            Inscrição
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="mt-12">
                    {{ $trainings->links() }}
                </div>
            @else
                <div class="bg-slate-50 dark:bg-slate-900/40 rounded-3xl p-12 text-center border border-dashed border-slate-200 dark:border-slate-800">
                    <p class="text-slate-400 dark:text-slate-500">De momento não temos formações registadas com os filtros selecionados.</p>
                </div>
            @endif
        </div>

        <!-- Sidebar Layout -->
        <aside class="lg:col-span-4 space-y-10">
            <!-- Newsletter Widget -->
            <x-newsletter-box />

            <!-- Trending Articles Component -->
            <x-trending :articles="$trendingArticles" />
        </aside>
    </div>
</div>
@endsection
