@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Trafo Daya</h2>

    <div class="card mb-3">
        <div class="card-header">
            ID Gardu Induk: {{ $trafo_daya->id_gardu_induk ?? 'N/A' }}
        </div>
    </div>

    <table class="table table-bordered">
        <tr><th>Nama</th><td>{{ $trafo_daya->nama }}</td></tr>
        <tr><th>Kapasitas</th><td>{{ $trafo_daya->kap }}</td></tr>
        <tr><th>Setting Rele</th><td>{{ $trafo_daya->setting_rele }}</td></tr>
    </table>

    <a href="{{ route('trafo_dayas.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('trafo_dayas.edit', $trafo_daya->id) }}" class="btn btn-warning">Edit</a>

</div>
@endsection
