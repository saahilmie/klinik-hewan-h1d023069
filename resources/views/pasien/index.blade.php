<x-app-layout>
    <x-slot name="header">
        Data Pasien Klinik Hewan
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Alert Success -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-lg shadow-sm" role="alert">
                <p class="font-semibold">✓ {{ session('success') }}</p>
            </div>
        @endif

        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 px-6 py-4 flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Daftar Pasien</h3>
                <a href="{{ route('pasien.create') }}"
                   class="bg-white text-emerald-600 px-4 py-2 rounded-lg font-semibold hover:bg-emerald-50 transition duration-200 shadow-md hover:shadow-lg">
                    + Tambah Pasien
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-emerald-200">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Nama Hewan</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Pemilik</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Diagnosa</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Check-in</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-emerald-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-emerald-100">
                        @forelse($pasien as $index => $p)
                            <tr class="hover:bg-emerald-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $pasien->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">{{ $p->nama_hewan }}</div>
                                    <div class="text-xs text-gray-500">{{ $p->umur }} bulan</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    @if($p->jenis_hewan == 'Lainnya' && $p->jenis_hewan_lainnya)
                                        {{ $p->jenis_hewan_lainnya }}
                                    @else
                                        {{ $p->jenis_hewan }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $p->nama_pemilik }}</div>
                                    <div class="text-xs text-gray-500">{{ $p->no_telepon }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ Str::limit($p->diagnosa, 30) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $p->tanggal_check_in->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($p->status == 'Dirawat')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                            Dirawat
                                        </span>
                                    @elseif($p->status == 'Sembuh')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                            Sembuh
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Mati
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('pasien.edit', $p->id) }}"
                                        dusk="edit-{{ $p->id }}"
                                        class="text-cyan-600 hover:text-cyan-900 font-semibold">
                                            Edit
                                        </a>
                                        <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    dusk="delete-{{ $p->id }}"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="text-red-600 hover:text-red-900 font-semibold">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-8 text-center">
                                    <div class="text-gray-400 text-lg">
                                        <p class="mb-2">🐾</p>
                                        <p>Belum ada data pasien</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($pasien->hasPages())
                <div class="bg-emerald-50 px-6 py-4 border-t border-emerald-200">
                    {{ $pasien->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
