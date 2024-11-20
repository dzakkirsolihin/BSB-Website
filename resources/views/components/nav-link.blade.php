@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link fw-bold text-decoration-underline'
            : 'nav-link text-white link-body-emphasis';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
