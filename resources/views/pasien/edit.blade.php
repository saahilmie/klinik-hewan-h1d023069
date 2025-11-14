<x-app-layout>
    <x-slot name="header">
        Edit Data Pasien
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 px-6 py-4">
                <h3 class="text-xl font-bold text-white">Form Edit Pasien</h3>
            </div>

            <!-- Form -->
            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Hewan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Hewan *</label>
                        <input type="text" name="nama_hewan" value="{{ old('nama_hewan', $pasien->nama_hewan) }}"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('nama_hewan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Hewan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Hewan *</label>
                        <select name="jenis_hewan" id="jenis_hewan"
                                class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Kucing" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                            <option value="Anjing" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                            <option value="Kelinci" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Kelinci' ? 'selected' : '' }}>Kelinci</option>
                            <option value="Burung" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Burung' ? 'selected' : '' }}>Burung</option>
                            <option value="Hamster" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Hamster' ? 'selected' : '' }}>Hamster</option>
                            <option value="Lainnya" {{ old('jenis_hewan', $pasien->jenis_hewan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_hewan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Hewan Lainnya (Hidden by default) -->
                    <div id="jenis_lainnya_container" style="display: none;">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sebutkan Jenis Hewan *</label>
                        <input type="text" name="jenis_hewan_lainnya" id="jenis_hewan_lainnya" value="{{ old('jenis_hewan_lainnya', $pasien->jenis_hewan_lainnya) }}"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               placeholder="Contoh: Iguana, Ular, Sugar Glider">
                        @error('jenis_hewan_lainnya')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Umur -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Umur (bulan) *</label>
                        <input type="number" name="umur" value="{{ old('umur', $pasien->umur) }}" min="0"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('umur')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Pemilik -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemilik *</label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', $pasien->nama_pemilik) }}"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('nama_pemilik')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No Telepon -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. Telepon *</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon', $pasien->no_telepon) }}"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('no_telepon')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Check-in -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Check-in *</label>
                        <input type="date" name="tanggal_check_in" value="{{ old('tanggal_check_in', $pasien->tanggal_check_in->format('Y-m-d')) }}"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('tanggal_check_in')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status"
                                class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Dirawat" {{ old('status', $pasien->status) == 'Dirawat' ? 'selected' : '' }}>Dirawat</option>
                            <option value="Sembuh" {{ old('status', $pasien->status) == 'Sembuh' ? 'selected' : '' }}>Sembuh</option>
                            <option value="Mati" {{ old('status', $pasien->status) == 'Mati' ? 'selected' : '' }}>Mati</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Check-out -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Check-out</label>
                        <input type="date" name="tanggal_check_out" id="tanggal_check_out"
                               value="{{ old('tanggal_check_out', $pasien->tanggal_check_out?->format('Y-m-d')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed"
                               disabled>
                        <p class="text-xs text-gray-500 mt-1">* Hanya diisi jika status Sembuh</p>
                        @error('tanggal_check_out')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Kematian -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Kematian</label>
                        <input type="date" name="tanggal_kematian" id="tanggal_kematian"
                               value="{{ old('tanggal_kematian', $pasien->tanggal_kematian?->format('Y-m-d')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed"
                               disabled>
                        <p class="text-xs text-gray-500 mt-1">* Hanya diisi jika status Mati</p>
                        @error('tanggal_kematian')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Biaya Perawatan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Biaya Perawatan (Rp) *</label>
                        <input type="number" name="biaya_perawatan" value="{{ old('biaya_perawatan', $pasien->biaya_perawatan) }}"
                               min="0" step="0.01"
                               class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                               required>
                        @error('biaya_perawatan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Diagnosa -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Diagnosa / Keluhan *</label>
                        <textarea name="diagnosa" rows="4"
                                  class="w-full px-4 py-2 border border-emerald-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                  required>{{ old('diagnosa', $pasien->diagnosa) }}</textarea>
                        @error('diagnosa')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 mt-8 pt-6 border-t border-emerald-100">
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-emerald-500 to-cyan-500 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition duration-200">
                        Update Data
                    </button>
                    <a href="{{ route('pasien.index') }}"
                       class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition duration-200 text-center">
                        ← Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Logic untuk enable/disable field berdasarkan status
        document.getElementById('status').addEventListener('change', function() {
            const status = this.value;
            const checkOut = document.getElementById('tanggal_check_out');
            const kematian = document.getElementById('tanggal_kematian');

            // Reset semua field
            checkOut.disabled = true;
            checkOut.classList.add('bg-gray-100', 'cursor-not-allowed');
            checkOut.classList.remove('border-emerald-300', 'focus:ring-emerald-500');
            if (status !== 'Sembuh') checkOut.value = '';

            kematian.disabled = true;
            kematian.classList.add('bg-gray-100', 'cursor-not-allowed');
            kematian.classList.remove('border-emerald-300', 'focus:ring-emerald-500');
            if (status !== 'Mati') kematian.value = '';

            // Enable field sesuai status
            if (status === 'Sembuh') {
                checkOut.disabled = false;
                checkOut.classList.remove('bg-gray-100', 'cursor-not-allowed');
                checkOut.classList.add('border-emerald-300', 'focus:ring-emerald-500');
            } else if (status === 'Mati') {
                kematian.disabled = false;
                kematian.classList.remove('bg-gray-100', 'cursor-not-allowed');
                kematian.classList.add('border-emerald-300', 'focus:ring-emerald-500');
            }
        });

        // Trigger saat halaman load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('status').dispatchEvent(new Event('change'));
        });
    </script>
</x-app-layout>
