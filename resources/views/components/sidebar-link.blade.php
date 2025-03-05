@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-4 py-2 bg-neutral-200 dark:bg-neutral-800 rounded text-black dark:text-neutral-200'
            : 'block px-4 py-2 hover:bg-neutral-200 dark:hover:bg-neutral-800 rounded text-black dark:text-neutral-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>