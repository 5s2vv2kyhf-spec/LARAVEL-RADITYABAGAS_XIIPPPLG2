<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = DB::table('article')
            ->select('id', 'judul', 'isi', 'tanggalterbit')
            ->get();

        return view('admin.artikel', compact('articles'));
    }

    public function create()
    {
        return view('admin.tambah_artikel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        DB::table('article')->insert([
            'judul'          => $request->input('judul'),
            'isi'            => $request->input('isi'),
            'tanggalterbit'  => now()->toDateString(),
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $art = DB::table('article')->where('id', $id)->first();

        abort_if(is_null($art), 404);

        return view('admin.edit_artikel', compact('art'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        DB::table('article')->where('id', $id)->update([
            'judul'      => $request->input('judul'),
            'isi'        => $request->input('isi'),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        DB::table('article')->where('id', $id)->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
