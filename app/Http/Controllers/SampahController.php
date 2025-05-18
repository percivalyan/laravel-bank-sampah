<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::paginate(5);
        return view('features.sampah.index', compact('sampahs'));
    }

    public function indexPublic()
    {
        $sampahs = Sampah::paginate(5);
        return view('features.sampah.index_public', compact('sampahs'));
    }

    public function create()
    {

        return view('features.sampah.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Sampah::create($validatedData);

        return redirect()->route('sampah.index')->with('success', 'Sampah created successfully.');
    }

    public function show($id)
    {

        $sampah = Sampah::findOrFail($id);
        return view('features.sampah.show', compact('sampah'));
    }

    public function edit($id)
    {

        $sampah = Sampah::findOrFail($id);
        return view('features.sampah.edit', compact('sampah'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $sampah = Sampah::findOrFail($id);
        $sampah->update($validatedData);

        return redirect()->route('sampah.index')->with('success', 'Sampah updated successfully.');
    }

    public function destroy($id)
    {

        $sampah = Sampah::findOrFail($id);
        $sampah->delete();

        return redirect()->route('sampah.index')->with('success', 'Sampah deleted successfully.');
    }
}
