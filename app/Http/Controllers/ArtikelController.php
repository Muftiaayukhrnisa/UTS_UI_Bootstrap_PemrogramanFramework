<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    // 🔹 HALAMAN PUBLIK (LIST) dengan filter kategori
    public function index(Request $request)
    {
        $query = Artikel::where('status', 'publish');
        
        // Filter berdasarkan kategori jika ada
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }
        
        $artikels = $query->orderBy('created_at', 'desc')->paginate(6);
        
        // Ambil daftar kategori unik dari artikel yang publish
        $kategoriList = Artikel::where('status', 'publish')
                               ->select('kategori')
                               ->distinct()
                               ->pluck('kategori');
        
        return view('articles', compact('artikels', 'kategoriList'));
    }

    // 🔹 HALAMAN DAFTAR KATEGORI (pilihan kategori)
    public function kategoriList()
    {
        // Ambil daftar kategori unik dari artikel yang publish
        $kategoriList = Artikel::where('status', 'publish')
                               ->select('kategori')
                               ->distinct()
                               ->pluck('kategori');
        
        // Jika ingin dari tabel categories (opsional, bisa juga hardcoded)
        // $kategoriList = Category::pluck('name');
        
        return view('kategori_list', compact('kategoriList'));
    }

    // 🔹 HALAMAN ARTIKEL BERDASARKAN KATEGORI
    public function byKategori($kategori)
    {
        // Ambil artikel yang status publish dan sesuai kategori
        $artikels = Artikel::where('status', 'publish')
                           ->where('kategori', $kategori)
                           ->orderBy('created_at', 'desc')
                           ->paginate(6);
        
        // Kirim data ke view khusus kategori
        return view('kategori_artikel', compact('artikels', 'kategori'));
    }

    // 🔹 HALAMAN DETAIL ARTIKEL
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        $artikel->increment('views');
        return view('article-detail', compact('artikel'));
    }

    // ================= ADMIN =================

    public function adminIndex()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $categories = Category::all(); // untuk dropdown kategori admin
        return view('admin.artikel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5|max:200',
            'isi' => 'required|min:20|max:500',
            'kategori' => 'required|string|max:50',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'views' => 0,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $categories = Category::all();
        return view('admin.artikel.edit', compact('artikel', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required|min:5|max:200',
            'isi' => 'required|min:20|max:1000',
            'kategori' => 'required|string|max:50',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ];

        if ($artikel->judul != $request->judul) {
            $data['slug'] = Str::slug($request->judul);
        }

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
                unlink(storage_path('app/public/' . $artikel->gambar));
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
            unlink(storage_path('app/public/' . $artikel->gambar));
        }
        
        $artikel->delete();

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil dihapus!');
    }
}