// Pendaftaran Form JavaScript
window.pendaftaranForm = function() {
    return {
        steps: [
            'Data Diri',
            'Data Orang Tua',
            'Jalur & Pilihan Sekolah',
            'Dokumen',
            'Konfirmasi'
        ],
        currentStep: 0,
        formData: {},
        lastSaved: null,
        isSaving: false,
        saveInterval: null,
        startAutoSave() {
            this.saveData();n            this.saveInterval = setInterval(() => {
                this.saveData();
            }, 30000); // 30 seconds
        },
        saveData() {
            if (this.isSaving) return;
            
            this.isSaving = true;
            const stepData = {};
            
            // Ambil data dari setiap step berdasarkan elemen dengan nama
            const form = document.querySelector('#pendaftaran-form');
            if (form) {
                const formData = new FormData(form);
                // Simpan hanya field yang tidak null/undefined
                for (let [key, value] of formData.entries()) {
                    if (value !== '') {
                        stepData[key] = value;
                    }
                }
            }
            
            // Update current step data
            this.formData[this.currentStep] = stepData;
            
            // Kirim ke server via AJAX
            fetch('{{ route('pendaftaran.autosave') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-HTTP-METHOD-OVERRIDE': 'POST'
                },
                body: JSON.stringify({
                    step: this.currentStep,
                    data: stepData
                })
            })
            .then(response => response.json())
            .then(data => {
                this.lastSaved = new Date();
                this.isSaving = false;
                console.log('Data tersimpan');
            })
            .catch(error => {
                console.error('Gagal menyimpan:', error);
                this.isSaving = false;
            });
        },
        nextStep() {
            if (this.currentStep < this.steps.length - 1) {
                this.saveData();
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 0) {
                this.saveData();
                this.currentStep--;
            }
        },
        goToStep(step) {
            if (step >= 0 && step < this.steps.length) {
                this.saveData();
                this.currentStep = step;
            }
        },
        destroy() {
            if (this.saveInterval) {
                clearInterval(this.saveInterval);
            }
        }
    };
};