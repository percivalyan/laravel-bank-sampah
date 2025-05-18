<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('published_date', 'desc')->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    public function pageBeritaAll()
    {
        $beritas = Berita::orderBy('published_date', 'desc')->paginate(12);
        return view('berita.all', compact('beritas'));
    }

    public function pageBerita()
    {
        $beritas = Berita::orderBy('published_date', 'desc')->paginate(6);
        return view('welcome', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('berita_photos', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published_date'] = now()->toDateString();

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file baru diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($berita->photo) {
                Storage::disk('public')->delete($berita->photo);
            }

            // Simpan foto baru
            $validated['photo'] = $request->file('photo')->store('berita_photos', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published_date'] = now()->toDateString();

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->photo) {
            Storage::disk('public')->delete($berita->photo);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
