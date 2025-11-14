<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User admin untuk login
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            'password' => Hash::make('password123'),
        ]);

        // Data pasien hewan
        Pasien::create([
            'nama_hewan' => 'Milo',
            'jenis_hewan' => 'Kucing',
            'umur' => 12,
            'nama_pemilik' => 'Adit',
            'no_telepon' => '081234567890',
            'diagnosa' => 'Flu kucing, bersin-bersin dan mata berair',
            'tanggal_check_in' => now()->subDays(6)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 150000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Luna',
            'jenis_hewan' => 'Anjing',
            'umur' => 24,
            'nama_pemilik' => 'Denis',
            'no_telepon' => '082345678901',
            'diagnosa' => 'Patah tulang kaki kiri, perlu operasi',
            'tanggal_check_in' => now()->subDays(5)->format('Y-m-d'),
            'tanggal_check_out' => now()->format('Y-m-d'),
            'status' => 'Sembuh',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 500000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Coco',
            'jenis_hewan' => 'Kelinci',
            'umur' => 6,
            'nama_pemilik' => 'Sopo',
            'no_telepon' => '083456789012',
            'diagnosa' => 'Diare kronis, dehidrasi parah',
            'tanggal_check_in' => now()->subDays(5)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Mati',
            'tanggal_kematian' => now()->subDays(3)->format('Y-m-d'),
            'biaya_perawatan' => 200000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Kubis',
            'jenis_hewan' => 'Hamster',
            'umur' => 8,
            'nama_pemilik' => 'Jarwo',
            'no_telepon' => '084567890123',
            'diagnosa' => 'Mata merah dan bengkak',
            'tanggal_check_in' => now()->subDays(4)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 75000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Bella',
            'jenis_hewan' => 'Kucing',
            'umur' => 18,
            'nama_pemilik' => 'Sarah',
            'no_telepon' => '085678901234',
            'diagnosa' => 'Cacingan dan kurang gizi',
            'tanggal_check_in' => now()->subDays(3)->format('Y-m-d'),
            'tanggal_check_out' => now()->subDay()->format('Y-m-d'),
            'status' => 'Sembuh',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 120000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Rocky',
            'jenis_hewan' => 'Anjing',
            'umur' => 36,
            'nama_pemilik' => 'Abby',
            'no_telepon' => '086789012345',
            'diagnosa' => 'Luka gigitan anjing lain',
            'tanggal_check_in' => now()->subDays(3)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 300000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Tweety',
            'jenis_hewan' => 'Burung',
            'umur' => 4,
            'nama_pemilik' => 'Yanto',
            'no_telepon' => '087890123456',
            'diagnosa' => 'Bulu rontok, tidak bisa terbang',
            'tanggal_check_in' => now()->subDays(2)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 90000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Max',
            'jenis_hewan' => 'Anjing',
            'umur' => 48,
            'nama_pemilik' => 'Upin',
            'no_telepon' => '088901234567',
            'diagnosa' => 'Kanker stadium akhir',
            'tanggal_check_in' => now()->subDays(1)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Mati',
            'tanggal_kematian' => now()->format('Y-m-d'),
            'biaya_perawatan' => 400000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Snowy',
            'jenis_hewan' => 'Kelinci',
            'umur' => 10,
            'nama_pemilik' => 'Mei-Mei',
            'no_telepon' => '089012345678',
            'diagnosa' => 'Infeksi telinga',
            'tanggal_check_in' => now()->subDays(1)->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 110000,
        ]);

        Pasien::create([
            'nama_hewan' => 'Whiskers',
            'jenis_hewan' => 'Kucing',
            'umur' => 15,
            'nama_pemilik' => 'Bowo',
            'no_telepon' => '081123456789',
            'diagnosa' => 'Alergi makanan',
            'tanggal_check_in' => now()->format('Y-m-d'),
            'tanggal_check_out' => null,
            'status' => 'Dirawat',
            'tanggal_kematian' => null,
            'biaya_perawatan' => 130000,
        ]);
    }
}
