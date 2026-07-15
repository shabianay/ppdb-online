<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('pendaftaran.show', $pendaftar) }}" class="text-muted-foreground hover:text-foreground transition-colors">
                <svg aria-hidden="true"   class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Edit Pendaftaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8" x-data="pendaftaranForm({
        pendaftarId: {{ $pendaftar->id }},
        autosaveUrl: '{{ route('pendaftaran.autosave') }}'
    })">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Progress Bar --}}
            <div class="mb-10">
                <div class="mb-4 h-2 bg-muted rounded-full overflow-hidden">
                    <div class="h-full bg-primary transition-all duration-500 ease-out" 
                         :style="'width: ' + ((currentStep + 1) / steps.length * 100) + '%'"></div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <template x-for="(step, index) in steps" :key="index">
                        <div class="flex items-center">
                            <div class="flex items-center gap-2">
                                <div :class="{
                                    'w-10 h-10 rounded-xl flex items-center justify-center text-sm font-bold transition-all duration-300': true,
                                    'bg-primary text-white shadow-lg shadow-primary/25': currentStep >= index,
                                    'bg-muted text-muted-foreground': currentStep < index
                                }">
                                    <span x-text="index + 1"></span>
                                </div>
                                <span class="text-sm font-medium hidden sm:block" :class="{
                                    'text-primary': currentStep >= index,
                                    'text-muted-foreground': currentStep < index
                                }" x-text="step"></span>
                            </div>
                            <template x-if="index < steps.length - 1">
                                <div class="w-12 sm:w-20 h-0.5 mx-2" :class="{
                                    'bg-primary': currentStep > index,
                                    'bg-muted': currentStep <= index
                                }"></div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>

            <form action="{{ route('pendaftaran.update', $pendaftar) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Step 1: Data Diri --}}
                <div x-show="currentStep === 0" x-cloak class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Data Diri</h3>
                        <p class="text-sm text-muted-foreground mt-1">Edit identitas diri Anda</p>
                    </div>
                    <div class="px-8 py-6 space-y-6">
                        <div>
                            <x-input-label for="nama_lengkap" value="Nama Lengkap" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap', $pendaftar->nama_lengkap)" required aria-label="Nama Lengkap" />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nisn" value="NISN" />
                                <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn', $pendaftar->nisn)" required aria-label="NISN" />
                                <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="nik" value="NIK" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', $pendaftar->nik)" required aria-label="NIK" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="tempat_lahir" value="Tempat Lahir" />
                                <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', $pendaftar->tempat_lahir)" required aria-label="Tempat Lahir" />
                                <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_lahir" value="Tanggal Lahir" />
                                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', $pendaftar->tanggal_lahir->format('Y-m-d'))" required aria-label="Tanggal Lahir" />
                                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" aria-label="Jenis Kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="alamat" value="Alamat" />
                            <textarea id="alamat" name="alamat" rows="3" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" required aria-label="Alamat">{{ old('alamat', $pendaftar->alamat) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="asal_sekolah" value="Asal Sekolah" />
                                <x-text-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah" :value="old('asal_sekolah', $pendaftar->asal_sekolah)" required aria-label="Asal Sekolah" />
                                <x-input-error :messages="$errors->get('asal_sekolah')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="no_hp" value="No. HP" />
                                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp', $pendaftar->no_hp)" required aria-label="Nomor Handphone" />
                                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Step 2: Data Orang Tua --}}
                <div x-show="currentStep === 1" x-cloak class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Data Orang Tua</h3>
                        <p class="text-sm text-muted-foreground mt-1">Edit data orang tua/wali</p>
                    </div>
                    <div class="px-8 py-6 space-y-8">
                        {{-- Ayah --}}
                        <div>
                            <h4 class="text-md font-semibold text-foreground mb-4 flex items-center gap-2">
                                <svg aria-hidden="true"   class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                Data Ayah
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="ayah_nama" value="Nama Ayah" />
                                    <x-text-input id="ayah_nama" class="block mt-1 w-full" type="text" name="ayah_nama" :value="old('ayah_nama', $ayah->nama ?? '')" required aria-label="Nama Ayah" />
                                    <x-input-error :messages="$errors->get('ayah_nama')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="ayah_pekerjaan" value="Pekerjaan Ayah" />
                                    <x-text-input id="ayah_pekerjaan" class="block mt-1 w-full" type="text" name="ayah_pekerjaan" :value="old('ayah_pekerjaan', $ayah->pekerjaan ?? '')" required aria-label="Pekerjaan Ayah" />
                                    <x-input-error :messages="$errors->get('ayah_pekerjaan')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="ayah_penghasilan" value="Penghasilan Ayah" />
                                    <select id="ayah_penghasilan" name="ayah_penghasilan" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" required aria-label="Penghasilan Ayah">
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="< 1 Juta" {{ old('ayah_penghasilan', $ayah->penghasilan ?? '') === '< 1 Juta' ? 'selected' : '' }}>< Rp 1.000.000</option>
                                        <option value="1 - 2 Juta" {{ old('ayah_penghasilan', $ayah->penghasilan ?? '') === '1 - 2 Juta' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000</option>
                                        <option value="2 - 5 Juta" {{ old('ayah_penghasilan', $ayah->penghasilan ?? '') === '2 - 5 Juta' ? 'selected' : '' }}>Rp 2.000.000 - Rp 5.000.000</option>
                                        <option value="5 - 10 Juta" {{ old('ayah_penghasilan', $ayah->penghasilan ?? '') === '5 - 10 Juta' ? 'selected' : '' }}>Rp 5.000.000 - Rp 10.000.000</option>
                                        <option value="> 10 Juta" {{ old('ayah_penghasilan', $ayah->penghasilan ?? '') === '> 10 Juta' ? 'selected' : '' }}>> Rp 10.000.000</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="ayah_no_hp" value="No. HP Ayah" />
                                    <x-text-input id="ayah_no_hp" class="block mt-1 w-full" type="text" name="ayah_no_hp" :value="old('ayah_no_hp', $ayah->no_hp ?? '')" required aria-label="Nomor Handphone Ayah" />
                                    <x-input-error :messages="$errors->get('ayah_no_hp')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Ibu --}}
                        <div class="pt-6 border-t border-border">
                            <h4 class="text-md font-semibold text-foreground mb-4 flex items-center gap-2">
                                <svg aria-hidden="true"   class="w-5 h-5 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                Data Ibu
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="ibu_nama" value="Nama Ibu" />
                                    <x-text-input id="ibu_nama" class="block mt-1 w-full" type="text" name="ibu_nama" :value="old('ibu_nama', $ibu->nama ?? '')" required aria-label="Nama Ibu" />
                                    <x-input-error :messages="$errors->get('ibu_nama')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="ibu_pekerjaan" value="Pekerjaan Ibu" />
                                    <x-text-input id="ibu_pekerjaan" class="block mt-1 w-full" type="text" name="ibu_pekerjaan" :value="old('ibu_pekerjaan', $ibu->pekerjaan ?? '')" required aria-label="Pekerjaan Ibu" />
                                    <x-input-error :messages="$errors->get('ibu_pekerjaan')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="ibu_penghasilan" value="Penghasilan Ibu" />
                                    <select id="ibu_penghasilan" name="ibu_penghasilan" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" required aria-label="Penghasilan Ibu">
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="< 1 Juta" {{ old('ibu_penghasilan', $ibu->penghasilan ?? '') === '< 1 Juta' ? 'selected' : '' }}>< Rp 1.000.000</option>
                                        <option value="1 - 2 Juta" {{ old('ibu_penghasilan', $ibu->penghasilan ?? '') === '1 - 2 Juta' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000</option>
                                        <option value="2 - 5 Juta" {{ old('ibu_penghasilan', $ibu->penghasilan ?? '') === '2 - 5 Juta' ? 'selected' : '' }}>Rp 2.000.000 - Rp 5.000.000</option>
                                        <option value="5 - 10 Juta" {{ old('ibu_penghasilan', $ibu->penghasilan ?? '') === '5 - 10 Juta' ? 'selected' : '' }}>Rp 5.000.000 - Rp 10.000.000</option>
                                        <option value="> 10 Juta" {{ old('ibu_penghasilan', $ibu->penghasilan ?? '') === '> 10 Juta' ? 'selected' : '' }}>> Rp 10.000.000</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="ibu_no_hp" value="No. HP Ibu" />
                                    <x-text-input id="ibu_no_hp" class="block mt-1 w-full" type="text" name="ibu_no_hp" :value="old('ibu_no_hp', $ibu->no_hp ?? '')" required aria-label="Nomor Handphone Ibu" />
                                    <x-input-error :messages="$errors->get('ibu_no_hp')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Step 3: Jalur & Gelombang --}}
                <div x-show="currentStep === 2" x-cloak class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Jalur & Gelombang</h3>
                        <p class="text-sm text-muted-foreground mt-1">Ubah jalur pendaftaran dan gelombang</p>
                    </div>
                    <div class="px-8 py-6 space-y-6">
                        <div>
                            <x-input-label for="jalur_pendaftaran_id" value="Jalur Pendaftaran" />
                            <select id="jalur_pendaftaran_id" name="jalur_pendaftaran_id" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" required aria-label="Jalur Pendaftaran">
                                <option value="">Pilih Jalur Pendaftaran</option>
                                @foreach ($jalurPendaftaran as $jalur)
                                    <option value="{{ $jalur->id }}" {{ old('jalur_pendaftaran_id', $pendaftar->jalur_pendaftaran_id) == $jalur->id ? 'selected' : '' }}>
                                        {{ $jalur->nama }} {{ $jalur->kuota ? '(Kuota: ' . $jalur->kuota . ')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="gelombang_id" value="Gelombang" />
                            <select id="gelombang_id" name="gelombang_id" class="block mt-1 w-full border-input bg-background text-foreground focus:border-ring focus:ring-ring rounded-xl shadow-sm" required aria-label="Gelombang Pendaftaran">
                                <option value="">Pilih Gelombang</option>
                                @foreach ($gelombang as $g)
                                    <option value="{{ $g->id }}" {{ old('gelombang_id', $pendaftar->gelombang_id) == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama }} ({{ \Carbon\Carbon::parse($g->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($g->tanggal_selesai)->format('d/m/Y') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Step 4: Konfirmasi & Submit --}}
                <div x-show="currentStep === 3" x-cloak class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Konfirmasi Data</h3>
                        <p class="text-sm text-muted-foreground mt-1">Periksa kembali data Anda sebelum menyimpan</p>
                    </div>
                    <div class="px-8 py-6 space-y-8">
                        {{-- Data Diri Review --}}
                        <div>
                            <h4 class="text-md font-semibold text-foreground mb-4">Data Diri</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div><span class="block text-muted-foreground">Nama Lengkap</span><span class="block font-medium text-foreground" x-text="formData.nama_lengkap"></span></div>
                                <div><span class="block text-muted-foreground">NISN</span><span class="block font-medium text-foreground" x-text="formData.nisn"></span></div>
                                <div><span class="block text-muted-foreground">NIK</span><span class="block font-medium text-foreground" x-text="formData.nik"></span></div>
                                <div><span class="block text-muted-foreground">Tempat, Tanggal Lahir</span><span class="block font-medium text-foreground" x-text="formData.tempat_lahir + ', ' + formData.tanggal_lahir"></span></div>
                                <div><span class="block text-muted-foreground">Jenis Kelamin</span><span class="block font-medium text-foreground" x-text="formData.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'"></span></div>
                                <div><span class="block text-muted-foreground">Asal Sekolah</span><span class="block font-medium text-foreground" x-text="formData.asal_sekolah"></span></div>
                                <div class="col-span-2"><span class="block text-muted-foreground">Alamat</span><span class="block font-medium text-foreground" x-text="formData.alamat"></span></div>
                                <div><span class="block text-muted-foreground">No. HP</span><span class="block font-medium text-foreground" x-text="formData.no_hp"></span></div>
                            </div>
                        </div>

                        {{-- Orang Tua Review --}}
                        <div class="pt-6 border-t border-border">
                            <h4 class="text-md font-semibold text-foreground mb-4">Data Orang Tua</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <h5 class="text-sm font-semibold text-primary mb-3">Ayah</h5>
                                    <div class="space-y-2 text-sm">
                                        <div><span class="text-muted-foreground">Nama: </span><span class="font-medium" x-text="formData.ayah_nama"></span></div>
                                        <div><span class="text-muted-foreground">Pekerjaan: </span><span class="font-medium" x-text="formData.ayah_pekerjaan"></span></div>
                                        <div><span class="text-muted-foreground">Penghasilan: </span><span class="font-medium" x-text="formData.ayah_penghasilan"></span></div>
                                        <div><span class="text-muted-foreground">No. HP: </span><span class="font-medium" x-text="formData.ayah_no_hp"></span></div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-sm font-semibold text-pink-600 dark:text-pink-400 mb-3">Ibu</h5>
                                    <div class="space-y-2 text-sm">
                                        <div><span class="text-muted-foreground">Nama: </span><span class="font-medium" x-text="formData.ibu_nama"></span></div>
                                        <div><span class="text-muted-foreground">Pekerjaan: </span><span class="font-medium" x-text="formData.ibu_pekerjaan"></span></div>
                                        <div><span class="text-muted-foreground">Penghasilan: </span><span class="font-medium" x-text="formData.ibu_penghasilan"></span></div>
                                        <div><span class="text-muted-foreground">No. HP: </span><span class="font-medium" x-text="formData.ibu_no_hp"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Jalur & Gelombang Review --}}
                        <div class="pt-6 border-t border-border">
                            <h4 class="text-md font-semibold text-foreground mb-4">Jalur & Gelombang</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div><span class="block text-muted-foreground">Jalur Pendaftaran</span><span class="block font-medium" x-text="selectedJalurName"></span></div>
                                <div><span class="block text-muted-foreground">Gelombang</span><span class="block font-medium" x-text="selectedGelombangName"></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex items-center justify-between mt-8">
                    <div>
                        <button type="button" x-show="currentStep > 0" @click="prevStep()" class="px-6 py-2.5 bg-muted text-foreground font-medium rounded-xl hover:bg-accent transition-all text-sm">
                            <span class="flex items-center gap-2">
                                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                Sebelumnya
                            </span>
                        </button>
                    </div>
                    <div>
                        <button type="button" x-show="currentStep < steps.length - 1" @click="nextStep()" class="px-6 py-2.5 bg-primary text-white font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">
                            <span class="flex items-center gap-2">Selanjutnya <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                        </button>
                        <button type="submit" x-show="currentStep === steps.length - 1" class="px-8 py-2.5 bg-gradient-to-r from-green-600 to-emerald-700 text-white font-semibold rounded-xl hover:from-green-700 hover:to-emerald-800 transition-all text-sm shadow-lg shadow-green-600/25">
                            <span class="flex items-center gap-2"><svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function pendaftaranForm() {
            return {
                currentStep: 0,
                steps: ['Data Diri', 'Data Orang Tua', 'Jalur & Gelombang', 'Konfirmasi'],
                get formData() {
                    const form = document.querySelector('form');
                    if (!form) return {};
                    const fd = new FormData(form);
                    return Object.fromEntries(fd.entries());
                },
                get selectedJalurName() {
                    const select = document.getElementById('jalur_pendaftaran_id');
                    return select ? select.options[select.selectedIndex]?.text || '-' : '-';
                },
                get selectedGelombangName() {
                    const select = document.getElementById('gelombang_id');
                    return select ? select.options[select.selectedIndex]?.text || '-' : '-';
                },
                nextStep() {
                    if (this.currentStep < this.steps.length - 1) this.currentStep++;
                },
                prevStep() {
                    if (this.currentStep > 0) this.currentStep--;
                }
            }
        }
    </script>
    @endpush
</x-app-layout>
