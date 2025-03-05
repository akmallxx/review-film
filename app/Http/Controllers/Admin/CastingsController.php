<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Casting;
use App\Models\Film;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CastingsController extends Controller
{
    public function index()
    {
        $castings = Casting::all();
        return view('admin.castings.index', compact( 'castings'));
    }

    public function create($id = null)
    {
        $films = Film::all();
        $castings = null;

        return view('admin.castings.create', get_defined_vars());
    }

    public function edit($id)
    {
        $films = Film::all();
        $castings = Casting::findOrFail($id);

        return view('admin.castings.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_asli' => 'required|string|max:255',
            'nama_panggung' => 'required|string|max:255',
        ]);

        Casting::create([
            'nama_asli' => $request->nama_asli,
            'nama_panggung' => $request->nama_panggung,
            'id_film' => $request->id_film,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.castings')->with('success', 'Data Berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_asli' => 'required|string|max:255',
            'nama_panggung' => 'required|string|max:255',
        ]);

        $casting = Casting::findOrFail($id);
        $casting->update([
            'nama_asli' => $request->nama_asli,
            'nama_panggung' => $request->nama_panggung,
            'id_film' => $request->id_film,
        ]);

        return redirect()->route('admin.castings')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            Casting::findOrFail($id)->delete();

            return redirect()->route('admin.castings')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.castings')->with('error', 'Data tidak ditemukan atau terjadi kesalahan.');
        }
    }
}
