<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'judul', 'isi', 'tanggalterbit')->get();

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

        Article::create([
            'judul'         => $request->input('judul'),
            'isi'           => $request->input('isi'),
            'tanggalterbit' => now()->toDateString(),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $art = Article::findOrFail($id);

        return view('admin.edit_artikel', compact('art'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $art = Article::findOrFail($id);
        $art->update([
            'judul' => $request->input('judul'),
            'isi'   => $request->input('isi'),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
