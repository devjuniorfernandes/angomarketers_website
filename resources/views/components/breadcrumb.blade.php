@props(['paths' => []])

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'flex py-3 text-slate-500 dark:text-slate-450 text-xs sm:text-sm font-semibold font-heading']) }}>
    <ol class="inline-flex items-center space-x-1.5 md:space-x-2">
        <!-- Root: Home -->
        <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-slate-400 hover:text-primary dark:text-slate-500 dark:hover:text-white transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 00-1-1h-3a1 1 0 00-1 1v4a1 1 0 001 1m6 0h-6" />
                </svg>
                Home
            </a>
        </li>

        <!-- Loop paths -->
        @foreach($paths as $index => $path)
            @php
            $isLast = $index === count($paths) - 1;
            @endphp
            <li class="flex items-center">
                <!-- Divider Arrow -->
                <svg class="w-4 h-4 text-slate-350 dark:text-slate-700 mx-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
                
                @if($isLast)
                    <span class="text-slate-800 dark:text-slate-300 font-bold max-w-[200px] truncate select-none" aria-current="page">
                        {{ $path['name'] }}
                    </span>
                @else
                    <a href="{{ $path['url'] }}" class="text-slate-400 hover:text-primary dark:text-slate-500 dark:hover:text-white transition-colors truncate max-w-[150px]">
                        {{ $path['name'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
