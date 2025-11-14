<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8" style="background-color: #E8F5E9;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- WELCOME CARD --}}
            <div class="p-6 rounded-lg shadow mb-6" style="background-color: #4CAF50;">
                <h1 class="text-white text-2xl font-semibold">Halo ma pren!</h1>
                <p class="text-white/90 mt-1">Klinik Hewan Blater</p>
            </div>

            {{-- STAT CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- TOTAL PASIEN --}}
                <div class="p-6 bg-white rounded-lg shadow border-l-8" style="border-color: #4CAF50;">
                    <h3 class="text-gray-700 font-semibold text-lg">Total Pasien</h3>
                    <p class="text-3xl font-bold mt-3" style="color:#2E7D32;">
                        {{ $totalPatients ?? 0 }}
                    </p>
                </div>

                {{-- PASIEN AKTIF --}}
                <div class="p-6 bg-white rounded-lg shadow border-l-8" style="border-color: #2E7D32;">
                    <h3 class="text-gray-700 font-semibold text-lg">Pasien Aktif</h3>
                    <p class="text-3xl font-bold mt-3" style="color:#2E7D32;">
                        {{ $activePatients ?? 0 }}
                    </p>
                </div>

                {{-- PASIEN SEMBUH --}}
                <div class="p-6 bg-white rounded-lg shadow border-l-8" style="border-color:#4CAF50;">
                    <h3 class="text-gray-700 font-semibold text-lg">Pasien Sembuh</h3>
                    <p class="text-3xl font-bold mt-3" style="color:#2E7D32;">
                        {{ $recoveredPatients ?? 0 }}
                    </p>
                </div>
            </div>

            {{-- CTA --}}
            <div class="mt-8 text-center">
                <a href="{{ route('patients.index') }}"
                   class="px-6 py-3 rounded-lg text-white shadow font-semibold"
                   style="background-color:#2E7D32;">
                    Kelola Data Pasien
                </a>
            </div>

            <div class="bg-purple-600 text-white p-4 rounded-lg">
                TEST WARNA FIX
            </div>


        </div>
    </div>
</x-app-layout>
