<?php

namespace App\Http\Controllers;

use App\Models\TableDataPenyulang;
use App\Models\Penyulang;
use Illuminate\Http\Request;

class TableDataPenyulangController extends Controller
{
    // Tampilkan list data
    public function index()
    {
        $data = TableDataPenyulang::with('penyulang')->paginate(15);
        return view('table_data_penyulangs.index', compact('data'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $penyulangs = Penyulang::all();
        return view('table_data_penyulangs.create', compact('penyulangs'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id_penyulang' => 'required|exists:penyulangs,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2100',
            'amp_siang' => 'required|numeric',
            'teg_siang' => 'required|numeric',
            'mw_siang' => 'required|numeric',
            'persen_siang' => 'required|string',
            'amp_malam' => 'required|numeric',
            'teg_malam' => 'required|numeric',
            'mw_malam' => 'required|numeric',
            'persen_malam' => 'required|string',
        ]);

        TableDataPenyulang::create($validated);

        return redirect()->route('table_data_penyulangs.index')->with('success', 'Data berhasil disimpan');
    }

    // Tampilkan detail data
    public function show($id)
    {
        $table_data_penyulang = TableDataPenyulang::with('penyulang')->findOrFail($id);
        return view('table_data_penyulangs.show', compact('table_data_penyulang'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $table_data_penyulang = TableDataPenyulang::findOrFail($id);
        $penyulangs = Penyulang::all();
        return view('table_data_penyulangs.edit', compact('table_data_penyulang', 'penyulangs'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_penyulang' => 'required|exists:penyulangs,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2100',
            'amp_siang' => 'required|numeric',
            'teg_siang' => 'required|numeric',
            'mw_siang' => 'required|numeric',
            'persen_siang' => 'required|string',
            'amp_malam' => 'required|numeric',
            'teg_malam' => 'required|numeric',
            'mw_malam' => 'required|numeric',
            'persen_malam' => 'required|string',
        ]);

        $table_data_penyulang = TableDataPenyulang::findOrFail($id);
        $table_data_penyulang->update($validated);

        return redirect()->route('table_data_penyulangs.index')->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        $table_data_penyulang = TableDataPenyulang::findOrFail($id);
        $table_data_penyulang->delete();

        return redirect()->route('table_data_penyulangs.index')->with('success', 'Data berhasil dihapus');
    }
}
