@props(['articles'])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <!-- Header -->
    <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
        <span class="w-2.5 h-2.5 bg-primary rounded-none"></span>
        <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Mais Lidos</h3>
    </div>

    <!-- Ranked List -->
    <div class="space-y-5">
        @foreach($articles as $index => $item)
            @php
            $rankNum = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $slug = $item->slug ?? 'slug-default';
            $title = $item->title ?? 'Título';
            $category = $item->category->name ?? 'Geral';
            @endphp
            <article class="flex items-start gap-4 group">
                <!-- Large Ranking Number -->
                <span class="font-heading font-black text-3xl sm:text-4xl text-slate-200 dark:text-slate-800/80 group-hover:text-primary transition-colors shrink-0 select-none">
                    {{ $rankNum }}
                </span>
                
                <!-- Headline Details -->
                <div>
                    <!-- Mini category link -->
                    <span class="text-[9px] font-extrabold uppercase tracking-widest text-primary mb-1 block">{{ $category }}</span>
                    <!-- Title -->
                    <h4 class="text-sm font-bold text-slate-850 dark:text-slate-200 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                        <a href="/article/{{ $slug }}">
                            {{ $title }}
                        </a>
                    </h4>
                </div>
            </article>
        @endforeach
    </div>
</div>
