<?php

namespace App\Http\Controllers;

use App\Models\GarduInduk;
use Illuminate\Http\Request;

class GarduIndukController extends Controller
{
    public function index()
    {
        $gardu_induks = GarduInduk::all();
        return view('gardu_induks.index', compact('gardu_induks'));
    }

    public function create()
    {
        return view('gardu_induks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        GarduInduk::create($request->all());

        return redirect()->route('gardu_induks.index')
                         ->with('success', 'Gardu Induk berhasil ditambahkan.');
    }

    public function show(GarduInduk $gardu_induk)
    {
        return view('gardu_induks.show', compact('gardu_induk'));
    }

    public function edit(GarduInduk $gardu_induk)
    {
        return view('gardu_induks.edit', compact('gardu_induk'));
    }

    public function update(Request $request, GarduInduk $gardu_induk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $gardu_induk->update($request->all());

        return redirect()->route('gardu_induks.index')
                         ->with('success', 'Gardu Induk berhasil diperbarui.');
    }

    public function destroy(GarduInduk $gardu_induk)
    {
        $gardu_induk->delete();

        return redirect()->route('gardu_induks.index')
                         ->with('success', 'Gardu Induk berhasil dihapus.');
    }
}
