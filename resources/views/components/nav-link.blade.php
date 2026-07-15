@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-foreground border-b-2 border-primary focus:outline-none focus:border-primary transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-muted-foreground border-b-2 border-transparent hover:text-foreground hover:border-border focus:outline-none focus:text-foreground focus:border-border transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} @if(($active ?? false)) aria-current="page" @endif>
    {{ $slot }}
</a>
