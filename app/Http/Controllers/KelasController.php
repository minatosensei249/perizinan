<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan semua data kelas
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    // Menampilkan form untuk membuat kelas baru
    public function create()
    {
        return view('kelas.create');
    }

    // Menyimpan kelas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas',
            'wali_kelas' => 'nullable|string|max:255',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Menampilkan detail kelas
    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    // Menampilkan form untuk edit kelas
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    // Mengupdate data kelas
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $kelas->id,
            'wali_kelas' => 'nullable|string|max:255',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diupdate.');
    }

    // Menghapus kelas
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
