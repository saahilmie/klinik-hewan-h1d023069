<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Card
        $totalPasien = Pasien::count();
        $dirawat = Pasien::where('status', 'Dirawat')->count();
        $sembuh = Pasien::where('status', 'Sembuh')->count();
        $mati = Pasien::where('status', 'Mati')->count();

        // Data untuk chart per minggu (7 hari terakhir)
        $chartData = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('D'); // Mon, Tue, Wed, etc.

            $count = Pasien::whereDate('tanggal_check_in', $date->format('Y-m-d'))->count();
            $chartData[] = $count;
        }

        // Pasien terbaru (5 data terakhir)
        $recentPasien = Pasien::latest()->take(5)->get();

        // Distribusi Jenis Hewan
        $jenisHewan = Pasien::selectRaw('
                CASE
                    WHEN jenis_hewan = "Lainnya" AND jenis_hewan_lainnya IS NOT NULL
                    THEN jenis_hewan_lainnya
                    ELSE jenis_hewan
                END as jenis_display,
                COUNT(*) as total
            ')
            ->groupBy('jenis_display')
            ->orderBy('total', 'desc')
            ->get();

        // Total Pendapatan
        $totalPendapatan = Pasien::sum('biaya_perawatan');
        $pendapatanBulanIni = Pasien::whereMonth('tanggal_check_in', Carbon::now()->month)
                                    ->sum('biaya_perawatan');

        return view('dashboard.index', compact(
            'totalPasien',
            'dirawat',
            'sembuh',
            'mati',
            'chartData',
            'labels',
            'recentPasien',
            'jenisHewan',
            'totalPendapatan',
            'pendapatanBulanIni'
        ));
    }
}
