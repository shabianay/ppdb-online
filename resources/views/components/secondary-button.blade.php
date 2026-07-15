<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-secondary text-secondary-foreground font-semibold text-sm rounded-lg hover:bg-accent focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:opacity-50 transition-all duration-200']) }}>
    {{ $slot }}
</button>
