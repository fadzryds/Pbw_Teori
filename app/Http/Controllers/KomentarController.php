<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar; // <--- penting! import model Komentar

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'nama' => 'required|string|max:100',
            'isi' => 'required|string',
        ]);

        // Simpan komentar ke database
        Komentar::create([
            'news_id' => $request->news_id,
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        // Redirect kembali ke halaman detail berita
        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}
