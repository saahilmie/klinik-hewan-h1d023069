<x-app-layout>
    <x-slot name="header">
        Dashboard Klinik Hewan
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total  Hewan -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-semibold uppercase">Total Pasien Hewan</p>
                        <p class="text-4xl font-bold mt-2">{{ $totalPasien }}</p>
                    </div>
                    <div class="bg-blue-400 bg-opacity-30 rounded-full p-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-blue-100 text-xs mt-3">Semua pasien hewan yang terdaftar</p>
            </div>

            <!-- Sedang Dirawat -->
            <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-100 text-sm font-semibold uppercase">Sedang Dirawat</p>
                        <p class="text-4xl font-bold mt-2">{{ $dirawat }}</p>
                    </div>
                    <div class="bg-amber-400 bg-opacity-30 rounded-full p-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-amber-100 text-xs mt-3"> Pasien hewan dalam perawatan</p>
            </div>

            <!-- Sembuh -->
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-emerald-100 text-sm font-semibold uppercase">Sembuh</p>
                        <p class="text-4xl font-bold mt-2">{{ $sembuh }}</p>
                    </div>
                    <div class="bg-emerald-400 bg-opacity-30 rounded-full p-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-emerald-100 text-xs mt-3">Pasien hewan yang sudah pulih</p>
            </div>

            <!-- Mati -->
            <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-semibold uppercase">Mati</p>
                        <p class="text-4xl font-bold mt-2">{{ $mati }}</p>
                    </div>
                    <div class="bg-red-400 bg-opacity-30 rounded-full p-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-red-100 text-xs mt-3">Pasien hewan yang mati</p>
            </div>
        </div>

        <!-- Chart & Recent Patients -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Chart Pasien Hewan Masuk -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-emerald-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Pasien Hewan Masuk (7 Hari Terakhir)</h3>
                    <span class="text-sm text-gray-500">Sabtu - Jumat</span>
                </div>

                <div class="flex items-end justify-between gap-2 h-48">
                    @foreach($chartData as $index => $count)
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-emerald-400 to-emerald-500 rounded-t-lg hover:from-emerald-500 hover:to-emerald-600 transition duration-200 shadow-md relative group"
                                 style="height: {{ $count > 0 ? ($count / max($chartData) * 100) : 5 }}%">
                                <!-- Tooltip -->
                                <div class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                    {{ $count }} pasien
                                </div>
                            </div>
                            <span class="text-xs font-semibold text-gray-600">{{ $labels[$index] }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Legend -->
                <div class="mt-6 flex items-center gap-4 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-gradient-to-t from-emerald-400 to-emerald-500 rounded"></div>
                        <span class="text-gray-600">Jumlah Pasien</span>
                    </div>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-600 font-semibold">Total: {{ array_sum($chartData) }} pasien</span>
                </div>
            </div>

            <!-- Distribusi Jenis Hewan -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-emerald-100">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Jenis Hewan</h3>
                <div class="space-y-4">
                    @foreach($jenisHewan as $jenis)
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-700">{{ $jenis->jenis_hewan }}</span>
                                <span class="text-sm font-bold text-emerald-600">{{ $jenis->total }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-emerald-400 to-cyan-500 h-2.5 rounded-full transition-all duration-500"
                                     style="width: {{ ($jenis->total / $totalPasien) * 100 }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Pendapatan & Recent Patients -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Total Pendapatan -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-emerald-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Pendapatan</h3>
                <div class="space-y-4">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-xl border border-green-200">
                        <p class="text-xs font-semibold text-green-700 uppercase mb-1">Total Keseluruhan</p>
                        <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-200">
                        <p class="text-xs font-semibold text-blue-700 uppercase mb-1">Bulan Ini</p>
                        <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Pasien Terbaru -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-emerald-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Pasien Terbaru</h3>
                    <a href="{{ route('pasien.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-semibold">
                        Lihat Semua →
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($recentPasien as $p)
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-emerald-50 to-cyan-50 rounded-xl hover:shadow-md transition duration-200 border border-emerald-100">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                                    {{ substr($p->nama_hewan, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">{{ $p->nama_hewan }}</p>
                                    <p class="text-xs text-gray-600">{{ $p->jenis_hewan }} • {{ $p->nama_pemilik }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                @if($p->status == 'Dirawat')
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">Dirawat</span>
                                @elseif($p->status == 'Sembuh')
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Sembuh</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Mati</span>
                                @endif
                                <p class="text-xs text-gray-500 mt-1">{{ $p->tanggal_check_in->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-400">
                            <p class="text-4xl mb-2">🐾</p>
                            <p>Belum ada data pasien</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
