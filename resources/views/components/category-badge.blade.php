@props(['category'])

@php
$category = trim($category);
// Quick conversion helper to handle common slugs
$slug = strtolower(str_replace([' ', 'í', 'â'], ['-', 'i', 'a'], $category));
$slug = preg_replace('/[^a-z0-9\-]/', '', $slug);

$colors = [
    'marketing' => 'bg-red-50 text-red-600 border-red-100 dark:bg-red-950/30 dark:text-red-400 dark:border-red-900/40',
    'tecnologia' => 'bg-blue-50 text-blue-600 border-blue-100 dark:bg-blue-950/30 dark:text-blue-400 dark:border-blue-900/40',
    'ia' => 'bg-indigo-50 text-indigo-600 border-indigo-100 dark:bg-indigo-950/30 dark:text-indigo-400 dark:border-indigo-900/40',
    'inteligencia-artificial' => 'bg-indigo-50 text-indigo-600 border-indigo-100 dark:bg-indigo-950/30 dark:text-indigo-400 dark:border-indigo-900/40',
    'negocios' => 'bg-emerald-50 text-emerald-600 border-emerald-100 dark:bg-emerald-950/30 dark:text-emerald-400 dark:border-emerald-900/40',
    'startups' => 'bg-amber-50 text-amber-600 border-amber-100 dark:bg-amber-950/30 dark:text-amber-400 dark:border-amber-900/40',
    'eventos' => 'bg-pink-50 text-pink-600 border-pink-100 dark:bg-pink-950/30 dark:text-pink-400 dark:border-pink-900/40',
    'carreiras' => 'bg-teal-50 text-teal-600 border-teal-100 dark:bg-teal-950/30 dark:text-teal-400 dark:border-teal-900/40',
    'podcast' => 'bg-violet-50 text-violet-600 border-violet-100 dark:bg-violet-950/30 dark:text-violet-400 dark:border-violet-900/40',
];

$colorClass = $colors[$slug] ?? 'bg-slate-50 text-slate-600 border-slate-100 dark:bg-slate-900 dark:text-slate-400 dark:border-slate-800';
$url = "/category/" . $slug;
@endphp

<a href="{{ $url }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-1 text-[10px] font-bold uppercase tracking-widest border rounded-full transition-all duration-300 hover:scale-105 ' . $colorClass]) }}>
    {{ $category }}
</a>
