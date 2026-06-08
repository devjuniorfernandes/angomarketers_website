@props(['articles' => []])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8']) }}>
    @foreach($articles as $article)
        <x-article-card :article="$article" />
    @endforeach
</div>
