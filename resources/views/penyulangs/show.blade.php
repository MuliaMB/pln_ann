@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Penyulang</h2>

    <div class="card mb-3">
        <div class="card-header">
            ID Trafo Daya: {{ $penyulang->id_trafo_daya ?? 'N/A' }}
        </div>
    </div>

    <table class="table table-bordered">
        <tr><th>Nama</th><td>{{ $penyulang->nama }}</td></tr>
        <tr><th>Setting Rele</th><td>{{ $penyulang->setting_rele }}</td></tr>
    </table>

    <a href="{{ route('penyulangs.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('penyulangs.edit', $penyulang->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection

