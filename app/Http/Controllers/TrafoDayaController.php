<?php

namespace App\Http\Controllers;

use App\Models\GarduInduk;
use App\Models\TrafoDaya;
use Illuminate\Http\Request;

class TrafoDayaController extends Controller
{
    public function index()
    {
        $trafodayas = TrafoDaya::latest()->paginate(10);
        return view('trafo_dayas.index', compact('trafodayas'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $gardu_induk = GarduInduk::all();
        return view('trafo_dayas.create', compact('gardu_induk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_gardu_induk' => 'required',
            'nama' => 'required',
            'kap' => 'required',
            'setting_rele' => 'required',
        ]);

        TrafoDaya::create($request->all());

        return redirect()->route('trafo_dayas.index')->with('success', 'Trafo Daya berhasil ditambahkan.');
    }

    public function show(TrafoDaya $trafo_daya)
    {
        return view('trafo_dayas.show', compact('trafo_daya'));
    }

    public function edit(TrafoDaya $trafo_daya)
    {
        $gardu_induks = GarduInduk::all();
        return view('trafo_dayas.edit', compact('trafo_daya', 'gardu_induk'));
    }

    public function update(Request $request, TrafoDaya $trafo_daya)
    {
        $request->validate([
            'id_gardu_induk' => 'required',
            'nama' => 'required',
            'kap' => 'required',
            'setting_rele' => 'required',
        ]);

        $trafo_daya->update($request->all());

        return redirect()->route('trafo_dayas.index')->with('success', 'Trafo Daya berhasil diperbarui.');
    }

    public function destroy(TrafoDaya $trafo_daya)
    {
        $trafo_daya->delete();

        return redirect()->route('trafo_dayas.index')->with('success', 'Trafo Daya berhasil dihapus.');
    }
}
