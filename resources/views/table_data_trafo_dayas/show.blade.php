@extends('table_data_trafo_dayas.layout')

@section('content')
<div class="container">
    <h2>Detail Data Trafo Daya</h2>

    <div class="card mb-3">
        <div class="card-header">
            Trafo Daya: {{ $table_data_trafo_daya->trafoDaya->nama ?? 'N/A' }}
        </div>
    </div>
    <table class="table table-bordered">
        <tr><th>Bulan</th><td>{{ $table_data_trafo_daya->bulan }}</td></tr>
        <tr><th>Tahun</th><td>{{ $table_data_trafo_daya->tahun }}</td></tr>
        <tr><th>Amp Siang</th><td>{{ $table_data_trafo_daya->amp_siang }}</td></tr>
        <tr><th>Tegangan Siang</th><td>{{ $table_data_trafo_daya->teg_siang }}</td></tr>
        <tr><th>MW Siang</th><td>{{ $table_data_trafo_daya->mw_siang }}</td></tr>
        <tr><th>% Siang</th><td>{{ $table_data_trafo_daya->persen_siang }}</td></tr>
        <tr><th>Amp Malam</th><td>{{ $table_data_trafo_daya->amp_malam }}</td></tr>
        <tr><th>Tegangan Malam</th><td>{{ $table_data_trafo_daya->teg_malam }}</td></tr>
        <tr><th>MW Malam</th><td>{{ $table_data_trafo_daya->mw_malam }}</td></tr>
        <tr><th>% Malam</th><td>{{ $table_data_trafo_daya->persen_malam }}</td></tr>
    </table>

    <a href="{{ route('table_data_trafo_dayas.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('table_data_trafo_dayas.edit', $table_data_trafo_daya->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
