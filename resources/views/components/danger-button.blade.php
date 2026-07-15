<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-destructive text-destructive-foreground font-semibold text-sm rounded-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-destructive focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-all duration-200 shadow-sm']) }}>
    {{ $slot }}
</button>
