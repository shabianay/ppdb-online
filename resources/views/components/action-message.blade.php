@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="() => { if ({{ session($on) ? 'true' : 'false' }}) { shown = true; timeout = setTimeout(() => { shown = false }, 2000); } }"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-muted-foreground']) }}>
    {{ $slot->isEmpty() ? __('Saved.') : $slot }}
</div>
