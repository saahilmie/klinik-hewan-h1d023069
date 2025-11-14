<x-app-layout>
    <x-slot name="header">
        Detail Pasien
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 px-6 py-4 flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Detail Pasien</h3>
                <a href="{{ route('pasien.index') }}"
                   class="bg-white text-emerald-600 px-4 py-2 rounded-lg font-semibold hover:bg-emerald-50 transition duration-200 text-sm">
                    ← Kembali
                </a>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Hewan -->
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-emerald-700 uppercase mb-1">Nama Hewan</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->nama_hewan }}</p>
                    </div>

                    <!-- Jenis Hewan -->
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-emerald-700 uppercase mb-1">Jenis Hewan</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->jenis_hewan }}</p>
                    </div>

                    <!-- Umur -->
                    <div class="bg-cyan-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-cyan-700 uppercase mb-1">Umur</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->umur }} bulan</p>
                    </div>

                    <!-- Status -->
                    <div class="bg-cyan-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-cyan-700 uppercase mb-1">Status</p>
                        @if($pasien->status == 'Dirawat')
                            <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-amber-100 text-amber-800">
                                Dirawat
                            </span>
                        @elseif($pasien->status == 'Sembuh')
                            <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                Sembuh
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                Mati
                            </span>
                        @endif
                    </div>

                    <!-- Nama Pemilik -->
                    <div class="bg-amber-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-amber-700 uppercase mb-1">Nama Pemilik</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->nama_pemilik }}</p>
                    </div>

                    <!-- No Telepon -->
                    <div class="bg-amber-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-amber-700 uppercase mb-1">No. Telepon</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->no_telepon }}</p>
                    </div>

                    <!-- Tanggal Check-in -->
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-blue-700 uppercase mb-1">Tanggal Check-in</p>
                        <p class="text-lg font-bold text-gray-900">{{ $pasien->tanggal_check_in->format('d/m/Y') }}</p>
                    </div>

                    <!-- Tanggal Check-out -->
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-xs font-semibold text-blue-700 uppercase mb-1">Tanggal Check-out</p>
                        <p class="text-lg font-bold text-gray-900">
                            {{ $pasien->tanggal_check_out ? $pasien->tanggal_check_out->format('d/m/Y') : '-' }}
                        </p>
                    </div>

                    <!-- Tanggal Kematian -->
                    @if($pasien->status == 'Mati')
                        <div class="bg-red-50 p-4 rounded-lg md:col-span-2">
                            <p class="text-xs font-semibold text-red-700 uppercase mb-1">Tanggal Kematian</p>
                            <p class="text-lg font-bold text-gray-900">
                                {{ $pasien->tanggal_kematian ? $pasien->tanggal_kematian->format('d/m/Y') : '-' }}
                            </p>
                        </div>
                    @endif

                    <!-- Biaya Perawatan -->
                    <div class="bg-green-50 p-4 rounded-lg {{ $pasien->status == 'Mati' ? '' : 'md:col-span-2' }}">
                        <p class="text-xs font-semibold text-green-700 uppercase mb-1">Biaya Perawatan</p>
                        <p class="text-2xl font-bold text-emerald-600">Rp {{ number_format($pasien->biaya_perawatan, 0, ',', '.') }}</p>
                    </div>

                    <!-- Diagnosa -->
                    <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                        <p class="text-xs font-semibold text-gray-700 uppercase mb-2">Diagnosa / Keluhan</p>
                        <p class="text-sm text-gray-900 leading-relaxed">{{ $pasien->diagnosa }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 mt-6 pt-6 border-t border-emerald-100">
                    <a href="{{ route('pasien.edit', $pasien->id) }}"
                       class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition duration-200 text-center">
                        Edit Data
                    </a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition duration-200">
                            Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
