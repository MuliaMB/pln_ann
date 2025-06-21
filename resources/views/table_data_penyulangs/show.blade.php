@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Data Penyulang</h2>

    <div class="card mb-3">
        <div class="card-header">
            Penyulang: {{ $table_data_penyulang->penyulang->nama ?? 'N/A' }}
        </div>
    </div>
    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $table_data_penyulang->id }}</td></tr>
        <tr><th>Penyulang</th><td>{{ $table_data_penyulang->penyulang->nama ?? 'N/A' }}</td></tr>
        <tr><th>Bulan</th><td>{{ $table_data_penyulang->bulan }}</td></tr>
        <tr><th>Tahun</th><td>{{ $table_data_penyulang->tahun }}</td></tr>
        <tr><th>Amp Siang</th><td>{{ $table_data_penyulang->amp_siang }}</td></tr>
        <tr><th>Tegangan Siang</th><td>{{ $table_data_penyulang->teg_siang }}</td></tr>
        <tr><th>MW Siang</th><td>{{ $table_data_penyulang->mw_siang }}</td></tr>
        <tr><th>% Siang</th><td>{{ $table_data_penyulang->persen_siang }}</td></tr>
        <tr><th>Amp Malam</th><td>{{ $table_data_penyulang->amp_malam }}</td></tr>
        <tr><th>Tegangan Malam</th><td>{{ $table_data_penyulang->teg_malam }}</td></tr>
        <tr><th>MW Malam</th><td>{{ $table_data_penyulang->mw_malam }}</td></tr>
        <tr><th>% Malam</th><td>{{ $table_data_penyulang->persen_malam }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $table_data_penyulang->created_at }}</td></tr>
        <tr><th>Diubah</th><td>{{ $table_data_penyulang->updated_at }}</td></tr>
    </table>

    <a href="{{ route('table_data_penyulangs.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('table_data_penyulangs.edit', $table_data_penyulang->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
