<?php

namespace App\Http\Controllers;

use App\Models\Penyulang;
use App\Models\TrafoDaya;
use Illuminate\Http\Request;

class PenyulangController extends Controller
{
    public function index()
    {
        $penyulangs = Penyulang::latest()->paginate(5);
        return view('penyulangs.index', compact('penyulangs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $trafos = TrafoDaya::all();
        return view('penyulangs.create',compact('trafos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_trafo_daya' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'setting_rele' => 'required|integer',
        ]);

        Penyulang::create($request->all());

        return redirect()->route('penyulangs.index')->with('success', 'Penyulang created successfully.');
    }

    public function show(Penyulang $penyulang)
    {
        return view('penyulangs.show', compact('penyulang'));
    }

    public function edit(Penyulang $penyulang)
    {
        return view('penyulangs.edit', compact('penyulang'));
    }

    public function update(Request $request, Penyulang $penyulang)
    {
        $request->validate([
            'id_trafo_daya' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'setting_rele' => 'required|integer',
        ]);

        $penyulang->update($request->all());

        return redirect()->route('penyulangs.index')->with('success', 'Penyulang updated successfully.');
    }

    public function destroy(Penyulang $penyulang)
    {
        $penyulang->delete();
        return redirect()->route('penyulangs.index')->with('success', 'Penyulang deleted successfully.');
    }
}
