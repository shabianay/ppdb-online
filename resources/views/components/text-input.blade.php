@props([
    'disabled' => false,
    'leadingIcon' => null,
    'trailingIcon' => null,
])

<div class="relative">
    @if ($leadingIcon)
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <x-icon name="{{ $leadingIcon }}" class="h-4 w-4 text-muted-foreground" />
        </div>
    @endif

    <input @disabled($disabled) {{ $attributes->merge([
        'class' => (
            'block w-full rounded-lg border border-input bg-background px-3 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:border-input disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 ' . 
            ($leadingIcon ? 'pl-10' : ''). 
            ($trailingIcon ? 'pr-10' : '')
        )
    ]) }}>

    @if ($trailingIcon)
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <x-icon name="{{ $trailingIcon }}" class="h-4 w-4 text-muted-foreground" />
        </div>
    @endif
</div>

