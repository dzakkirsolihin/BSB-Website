@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link fw-bold text-decoration-underline'
            : 'nav-link text-primary-custom text-decoration-none link-body-emphasis fw-bold';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
