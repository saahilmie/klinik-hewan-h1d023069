<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::latest()->paginate(10);
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'jenis_hewan' => 'required|in:Kucing,Anjing,Kelinci,Burung,Hamster,Lainnya',
            'jenis_hewan_lainnya' => 'nullable|required_if:jenis_hewan,Lainnya|string|max:255',
            'umur' => 'required|integer|min:0',
            'nama_pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'diagnosa' => 'required|string',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'nullable|date|after_or_equal:tanggal_check_in',
            'status' => 'required|in:Dirawat,Sembuh,Mati',
            'tanggal_kematian' => 'nullable|required_if:status,Mati|date',
            'biaya_perawatan' => 'required|numeric|min:0',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'jenis_hewan' => 'required|in:Kucing,Anjing,Kelinci,Burung,Hamster,Lainnya',
            'umur' => 'required|integer|min:0',
            'nama_pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'diagnosa' => 'required|string',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'nullable|date|after_or_equal:tanggal_check_in',
            'status' => 'required|in:Dirawat,Sembuh,Mati',
            'tanggal_kematian' => 'nullable|required_if:status,Mati|date',
            'biaya_perawatan' => 'required|numeric|min:0',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
