@extends('layouts.app')

@section('title', 'Contacto | AngoMarketers')

@section('content')

@php
$paths = [
    ['name' => 'Contacto', 'url' => '/contact']
];
@endphp

<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <x-breadcrumb :paths="$paths" />

    <!-- Header Section -->
    <div class="mt-4 max-w-3xl mb-12">
        <span class="text-xs font-extrabold uppercase tracking-widest text-primary">Fale Connosco</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-white mt-2 leading-tight">
            Estamos Sempre Próximos de Si
        </h1>
        <p class="mt-4 text-slate-650 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
            Deseja enviar um comunicado de imprensa, propor uma reportagem, sugerir um convidado para o podcast ou discutir oportunidades de publicidade e parcerias corporativas? Preencha o formulário ou contacte a nossa redação em Luanda.
        </p>
    </div>

    <!-- Contact Grid layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
        
        <!-- Left Side: Interactive Contact Form (7 Cols) -->
        <div class="lg:col-span-7 bg-slate-50 dark:bg-slate-900/60 border border-slate-200/65 dark:border-slate-800 rounded-3xl p-6 sm:p-8 lg:p-10 shadow-xs">
            <h3 class="font-heading font-extrabold text-xl text-slate-900 dark:text-white mb-6">Envie uma Mensagem</h3>
            
            <form class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Nome Completo</label>
                        <input type="text" placeholder="Ex: António Cambundo" required
                               class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm focus:ring-1 focus:ring-primary focus:outline-none dark:text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Endereço de Email</label>
                        <input type="email" placeholder="Ex: nome@empresa.ao" required
                               class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm focus:ring-1 focus:ring-primary focus:outline-none dark:text-white">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Assunto</label>
                    <input type="text" placeholder="Ex: Oportunidades de Anúncio / Press Release" required
                           class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm focus:ring-1 focus:ring-primary focus:outline-none dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">Mensagem</label>
                    <textarea placeholder="Escreva a sua mensagem em detalhe..." rows="5" required
                              class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm focus:ring-1 focus:ring-primary focus:outline-none dark:text-white"></textarea>
                </div>

                <button type="submit" 
                        class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primary/95 text-white font-bold text-xs uppercase tracking-wider rounded-2xl transition-all duration-300 shadow-sm hover:shadow-lg">
                    Enviar Mensagem
                </button>
            </form>
        </div>

        <!-- Right Side: Details and Map Placeholder (5 Cols) -->
        <div class="lg:col-span-5 flex flex-col justify-between gap-6">
            
            <!-- Address details -->
            <div class="bg-white dark:bg-slate-900 border border-slate-150 dark:border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-xs flex-grow flex flex-col justify-between">
                <div class="space-y-6">
                    <h3 class="font-heading font-extrabold text-xl text-slate-900 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800">Redação AngoMarketers</h3>
                    
                    <div class="space-y-4 text-sm text-slate-650 dark:text-slate-400">
                        <p class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary shrink-0 mt-1.5"></span>
                            <span>
                                <strong>Morada:</strong><br>
                                Via S10, Edifício Luanda Corporate, 4º Andar, Talatona, Luanda, Angola.
                            </span>
                        </p>

                        <p class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary shrink-0 mt-1.5"></span>
                            <span>
                                <strong>Contactos Telefónicos:</strong><br>
                                +244 923 000 000 • +244 222 000 000
                            </span>
                        </p>

                        <p class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary shrink-0 mt-1.5"></span>
                            <span>
                                <strong>Emails de Contacto:</strong><br>
                                geral@angomarketers.ao <br>
                                redacao@angomarketers.ao
                            </span>
                        </p>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 dark:border-slate-850 mt-6 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-slate-450 dark:text-slate-500 block">Horário de Funcionamento</span>
                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-350">Segunda a Sexta: 08:30 - 17:30</span>
                    </div>
                </div>
            </div>

            <!-- Stylized Map card placeholder -->
            <div class="relative bg-slate-900 rounded-3xl overflow-hidden aspect-[16/9] lg:aspect-auto lg:h-48 border border-slate-800 shadow-md group">
                <!-- Map Graphic background -->
                <div class="absolute inset-0 bg-cover bg-center opacity-40 select-none" style="background-image: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=400');"></div>
                <!-- Radial shade overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                
                <!-- Floating Pin Marker details -->
                <div class="absolute inset-0 flex flex-col items-center justify-center p-4">
                    <span class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center animate-bounce shadow-lg">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </span>
                    <span class="bg-slate-950/90 text-white border border-slate-800 text-[10px] font-bold px-3 py-1.5 rounded-lg mt-2.5 shadow-md">
                        Edifício Luanda Corporate, Talatona
                    </span>
                </div>
            </div>

        </div>

    </div>
</div>

<x-newsletter />

@endsection
