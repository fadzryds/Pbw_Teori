<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // 📰 Menampilkan semua berita di halaman index
    public function index()
    {
        $news = News::with('wartawan', 'komentar')
            ->latest()
            ->get();

        return view('news.index', compact('news'));
    }

    // 🔍 Menampilkan detail berita (halaman show)
    public function show($id)
    {
        $news = News::with(['wartawan', 'komentar'])->findOrFail($id);
        return view('news.show', compact('news'));
    }

    // ➕ Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;
        if ($request->hasFile('gambar')) {
            $namaFile = $request->file('gambar')->store('news', 'public');
        }

        News::create([
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'gambar' => $namaFile,
        ]);

        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }
}