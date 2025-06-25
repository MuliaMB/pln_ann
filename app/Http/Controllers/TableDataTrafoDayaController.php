<?php

namespace App\Http\Controllers;

use App\Models\TableDataTrafoDaya;
use App\Models\TrafoDaya;
use Illuminate\Http\Request;

class TableDataTrafoDayaController extends Controller
{
    public function index()
    {
        $data = TableDataTrafoDaya::with('trafoDaya')->get();
        return view('table_data_trafo_dayas.index', compact('data'));
    }

    public function create()
    {
        $trafo_dayas = TrafoDaya::all();
        return view('table_data_trafo_dayas.create', compact('trafo_dayas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_trafo_daya' => 'required|exists:trafo_dayas,id',
            'bulan' => 'required',
            'tahun' => 'required',
            'amp_siang' => 'required',
            'teg_siang' => 'required',
            'mw_siang' => 'required',
            'persen_siang' => 'required',
            'amp_malam' => 'required',
            'teg_malam' => 'required',
            'mw_malam' => 'required',
            'persen_malam' => 'required',
        ]);

        TableDataTrafoDaya::create($request->all());

        return redirect()->route('table_data_trafo_dayas.index')
                         ->with('success', 'Data trafo daya berhasil ditambahkan.');
    }

    public function show(TableDataTrafoDaya $table_data_trafo_daya)
    {
        return view('table_data_trafo_dayas.show', compact('table_data_trafo_daya'));
    }

    public function edit(TableDataTrafoDaya $table_data_trafo_daya)
    {
        $trafo_dayas = TrafoDaya::all();
        return view('table_data_trafo_dayas.edit', compact('table_data_trafo_daya', 'trafo_dayas'));
    }

    public function update(Request $request, TableDataTrafoDaya $table_data_trafo_daya)
    {
        $request->validate([
            'id_trafo_daya' => 'required|exists:trafo_dayas,id',
            'bulan' => 'required|integer',
            'tahun' => 'required|integer',
            'amp_siang' => 'required|integer',
            'teg_siang' => 'required|integer',
            'mw_siang' => 'required|integer',
            'persen_siang' => 'required|numeric',
            'amp_malam' => 'required|integer',
            'teg_malam' => 'required|integer',
            'mw_malam' => 'required|integer',
            'persen_malam' => 'required|numeric',
        ]);

        $table_data_trafo_daya->update($request->all());

        return redirect()->route('table_data_trafo_dayas.index')
                         ->with('success', 'Data trafo daya berhasil diperbarui.');
    }

    public function destroy(TableDataTrafoDaya $table_data_trafo_daya)
    {
        $table_data_trafo_daya->delete();

        return redirect()->route('table_data_trafo_dayas.index')
                         ->with('success', 'Data trafo daya berhasil dihapus.');
    }
}
