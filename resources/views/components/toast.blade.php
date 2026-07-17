<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toast', () => ({
            toasts: [],
            show(message, type = 'success', duration = 4000) {
                const id = Date.now() + Math.random();
                this.toasts.push({ id, message, type, visible: true });
                if (duration > 0) {
                    setTimeout(() => {
                        const idx = this.toasts.findIndex(t => t.id === id);
                        if (idx !== -1) this.dismiss(idx);
                    }, duration);
                }
            },
            dismiss(index) {
                if (this.toasts[index]) {
                    this.toasts[index].visible = false;
                    setTimeout(() => { this.toasts.splice(index, 1); }, 300);
                }
            }
        }));
    });

    window.showToast = function(message, type = 'success', duration = 4000) {
        window.dispatchEvent(new CustomEvent('toast', { detail: { message, type, duration } }));
    };

    @if(session('success'))
        document.addEventListener('DOMContentLoaded', () => window.showToast("{{ session('success') }}", 'success'));
    @endif
    @if(session('error'))
        document.addEventListener('DOMContentLoaded', () => window.showToast("{{ session('error') }}", 'error'));
    @endif
</script>

<div
    x-data="toast"
    x-on:toast.window="show($event.detail.message, $event.detail.type, $event.detail.duration)"
    class="fixed top-4 right-4 z-50 flex flex-col gap-2 pointer-events-none"
>
    <template x-for="(toast, index) in toasts" :key="toast.id">
        <div
            x-show="toast.visible"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-full opacity-0"
            class="pointer-events-auto max-w-sm w-full bg-card border border-border rounded-xl shadow-lg p-4 flex items-start gap-3"
            role="alert"
        >
            <svg aria-hidden="true" x-show="toast.type === 'success'" class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <svg aria-hidden="true" x-show="toast.type === 'error'" class="w-5 h-5 text-destructive shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <svg aria-hidden="true" x-show="toast.type === 'info'" class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>

            <div class="flex-1 min-w-0" role="status">
                <p class="text-sm font-medium text-foreground" x-text="toast.message"></p>
            </div>
            <button x-on:click="dismiss(index)" class="shrink-0 text-muted-foreground hover:text-foreground transition-colors" aria-label="Tutup notifikasi">
                <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </template>
</div>