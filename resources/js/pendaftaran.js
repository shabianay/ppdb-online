// Pendaftaran Form JavaScript
window.pendaftaranForm = function(config = {}) {
    return {
        steps: [
            'Data Diri',
            'Data Orang Tua',
            'Jalur & Pilihan Sekolah',
            'Dokumen',
            'Konfirmasi'
        ],
        currentStep: 0,
        pendaftarId: config.pendaftarId || null,
        autosaveUrl: config.autosaveUrl || null,
        isSaving: false,
        lastSaved: null,
        saveInterval: null,

        init() {
            if (this.autosaveUrl && this.pendaftarId) {
                this.startAutoSave();
            }
        },

        startAutoSave() {
            this.saveInterval = setInterval(() => {
                this.saveData();
            }, 30000); // 30 seconds
        },

        saveData() {
            if (this.isSaving || !this.autosaveUrl || !this.pendaftarId) return;
            
            this.isSaving = true;
            const form = document.querySelector('form');
            if (!form) {
                this.isSaving = false;
                return;
            }

            const formData = new FormData(form);
            const fields = {};
            for (let [key, value] of formData.entries()) {
                if (key !== '_token' && key !== '_method' && value !== '') {
                    fields[key] = value;
                }
            }

            fetch(this.autosaveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    pendaftar_id: this.pendaftarId,
                    fields: fields
                })
            })
            .then(response => response.json())
            .then(data => {
                this.lastSaved = new Date().toLocaleTimeString();
                this.isSaving = false;
            })
            .catch(error => {
                console.error('Autosave failed:', error);
                this.isSaving = false;
            });
        },

        nextStep() {
            if (this.currentStep < this.steps.length - 1) {
                this.saveData();
                this.currentStep++;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },

        prevStep() {
            if (this.currentStep > 0) {
                this.saveData();
                this.currentStep--;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },

        destroy() {
            if (this.saveInterval) {
                clearInterval(this.saveInterval);
            }
        }
    };
};
